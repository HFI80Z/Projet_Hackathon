<?php
namespace App\Controllers;

class OtherController
{
    // Fonctionnalité pour créer une annonce
    public function creerAnnonce()
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
                // Mettre à jour le chemin vers le répertoire public/images
                $uploadDir = __DIR__ . '/../../public/images/';
                // Assurez-vous que ce dossier existe
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true); // Créer le répertoire si nécessaire
                }
                $tmpFile = $_FILES['image']['tmp_name'];
                $originalName = $_FILES['image']['name'];
                $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                $imageName = uniqid('img_', true) . '.' . $extension;

                // Déplacer l'image téléchargée dans le répertoire public/images/
                if (!move_uploaded_file($tmpFile, $uploadDir . $imageName)) {
                    // Afficher un message d'erreur si l'image ne peut pas être déplacée
                    echo "Erreur lors du téléchargement de l'image.";
                    exit;
                }
            }

            if (!empty($titre) && !empty($description)) {
                // Appeler la méthode pour enregistrer l'annonce avec l'image
                \App\Models\AnnonceModel::createAnnonce($titre, $description, $prix, $user_id, $imageName);
            }

            // Rediriger vers la page d'accueil après l'ajout
            header('Location: /accueil');
            exit;
        }

        // Charger la vue de création d'annonce
        require __DIR__ . '/../../templates/creer-annonce.php';
    }

    // Page de réservation
    public function reservation()
    {
        require __DIR__ . '/../../templates/reservation.php';
    }

    // Page de contact
    public function contact()
    {
        require __DIR__ . '/../../templates/contact.php';
    }

    // Ancienne fonctionnalité pour la catégorie (si toujours utilisée)
    public function creerAnnonces()
    {
        // Charger une vue si nécessaire ou rediriger ailleurs
        require __DIR__ . '/../../templates/creer-annonce.php';
    }
}
