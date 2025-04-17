<?php

namespace App\Controllers;

use App\Models\MessageModel;
use App\Models\AnnonceModel;
use App\Database\Database;

class AnnonceController
{
    public function index() {
        // Récupérer le terme de recherche s'il existe
        $searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';
        
        // Récupérer les annonces (filtrées si un terme de recherche est présent)
        if (!empty($searchTerm)) {
            $annonces = \App\Models\AnnonceModel::searchAnnonces($searchTerm);
        } else {
            $annonces = \App\Models\AnnonceModel::getAllAnnonces();
        }
        
        // Afficher la vue avec les annonces
        require __DIR__ . '/../../templates/accueil.php';
    }

    // Envoie un message automatiquement à l'utilisateur ayant posté l'annonce
    public function sendMessageToAdvertiser()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /connexion');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $annonceId = $_POST['annonce_id'] ?? null;

        if (!$annonceId) {
            header('Location: /accueil');
            exit;
        }

        // Récupérer l'utilisateur qui a posté l'annonce
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT user_id FROM annonces WHERE id = :annonceId");
        $stmt->execute([':annonceId' => $annonceId]);
        $advertiser = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$advertiser) {
            header('Location: /accueil');
            exit;
        }

        $receiverId = $advertiser['user_id'];
        $message = "Je suis intéressé par ton annonce";

        // Envoi du message via MessageModel
        MessageModel::sendMessage($userId, $receiverId, $message);

        // Rediriger vers la conversation avec l'utilisateur qui a posté l'annonce
        header('Location: /messages/conversation?id=' . $receiverId);
        exit;
    }

    // Ajoute une annonce
    public function ajouterAnnonce()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /connexion');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'] ?? '';
            $description = $_POST['description'] ?? '';
            $prix = $_POST['prix'] ?? 0;
            $user_id = $_SESSION['user_id'];

            // Gestion de l'image
            $imageName = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../../public/images/';  // Modifié pour le répertoire 'images'
                $tmpFile = $_FILES['image']['tmp_name'];
                $originalName = $_FILES['image']['name'];
                $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                $imageName = uniqid('img_', true) . '.' . $extension;
                move_uploaded_file($tmpFile, $uploadDir . $imageName);
            }

            if (!empty($titre) && !empty($description)) {
                AnnonceModel::createAnnonce($titre, $description, $prix, $user_id, $imageName);
            }

            // Rediriger vers la page d'accueil après l'ajout
            header('Location: /');
            exit;
        }

        header('Location: /');
    }

    // Modifie une annonce
    public function modifierAnnonce()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /connexion');
            exit;
        }

        // Récupérer l'ID de l'annonce à modifier
        $annonceId = $_GET['id'] ?? null;

        if ($annonceId) {
            // Récupérer l'annonce par ID
            $annonce = AnnonceModel::getAnnonceById($annonceId);

            // Vérifier que l'annonce existe et que l'utilisateur connecté est le créateur
            if ($annonce && $annonce['user_id'] == $_SESSION['user_id']) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $titre = $_POST['titre'] ?? '';
                    $description = $_POST['description'] ?? '';
                    $prix = $_POST['prix'] ?? 0;

                    // Gestion de l'image
                    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                        $uploadDir = __DIR__ . '/../../public/images/';  // Modifié pour le répertoire 'images'
                        $tmpFile = $_FILES['image']['tmp_name'];
                        $originalName = $_FILES['image']['name'];
                        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                        $imageName = uniqid('img_', true) . '.' . $extension;

                        // Vérification de l'extension de l'image
                        $allowedExtensions = ['jpg', 'jpeg', 'png'];
                        if (!in_array($extension, $allowedExtensions)) {
                            echo "Extension non autorisée.";
                            exit;
                        }

                        // Vérification de la taille (max 10MB)
                        if ($_FILES['image']['size'] > 10 * 1024 * 1024) {
                            echo "Le fichier est trop volumineux.";
                            exit;
                        }

                        // Déplacer le fichier
                        $destination = $uploadDir . $imageName;
                        if (!move_uploaded_file($tmpFile, $destination)) {
                            echo "Erreur lors de l'upload de l'image.";
                            exit;
                        }
                    } else {
                        $imageName = $_POST['current_image'] ?? $annonce['image'];
                    }

                    // Mise à jour de l'annonce
                    AnnonceModel::updateAnnonce($annonceId, $titre, $description, $prix, $imageName);
                    header('Location: /accueil');
                    exit;
                }

                // Charger la vue avec les données de l'annonce
                require __DIR__ . '/../../templates/modifier-annonce.php';
                return;
            } else {
                // Rediriger si l'annonce n'existe pas ou si l'utilisateur n'est pas le créateur
                header('Location: /accueil');
                exit;
            }
        }

        // Rediriger en cas d'ID manquant
        header('Location: /accueil');
        exit;
    }

    // Supprime une annonce
    public function supprimerAnnonce()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /connexion');
            exit;
        }

        $annonceId = $_GET['id'] ?? null;
        if ($annonceId) {
            $annonce = AnnonceModel::getAnnonceById($annonceId);

            // Vérifier que l'utilisateur connecté est le créateur de l'annonce
            if ($annonce && $annonce['user_id'] == $_SESSION['user_id']) {
                AnnonceModel::deleteAnnonce($annonceId);
            }
        }

        header('Location: /accueil');
    }

    // Réserve une annonce
    public function reserverAnnonce()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /connexion');
            exit;
        }

        $annonceId = $_POST['annonce_id'] ?? null;
        $userId = $_SESSION['user_id'];

        if ($annonceId) {
            AnnonceModel::reserverAnnonce($annonceId, $userId);
            // Rediriger vers la page des réservations
            header('Location: /reservation');
            exit;
        }

        header('Location: /accueil');
    }

    // Supprime une réservation
    public function supprimerReservation()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /connexion');
            exit;
        }

        $reservationId = $_GET['id'] ?? null;
        $userId = $_SESSION['user_id'];

        if ($reservationId) {
            AnnonceModel::deleteReservation($reservationId, $userId);
        }

        header('Location: /reservation');
        exit;
    }
}
