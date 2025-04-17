<?php

namespace App\Controllers;

use App\Database\Database;
use App\Models\UserModel;
use App\Models\AnnonceModel;

class AdminController
{
    public function index()
    {
        require __DIR__ . '/../../templates/admin.php';
    }
    public function modifierUtilisateur()
{
    // Vérifier seulement si l'utilisateur est connecté
    if (!isset($_SESSION['user_id'])) {
        header('Location: /connexion');
        exit;
    }
    
    // Vérifier le rôle directement dans la base de données
    $currentUser = UserModel::getUserById($_SESSION['user_id']);
    if (!$currentUser || $currentUser['role'] !== 'admin') {
        // L'utilisateur n'est pas admin
        header('Location: /');
        exit;
    }
    
    // Récupérer l'ID de l'utilisateur à modifier depuis l'URL
    $userId = $_GET['id'] ?? null;
    if (!$userId) {
        header('Location: /admin?section=utilisateurs');
        exit;
    }
    
    // Traiter la soumission du formulaire si c'est une requête POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $role = $_POST['role'] ?? 'user';
        
        // Utiliser la nouvelle méthode spécifique à l'admin
        UserModel::updateUserByAdmin($userId, $nom, $prenom, $email, $role);
        header('Location: /admin?section=utilisateurs');
        exit;
    } else {
        // Récupérer les données de l'utilisateur à modifier
        $user = UserModel::getUserById($userId);
        
        // Afficher le template avec les données de l'utilisateur
        require __DIR__ . '/../../templates/admin-modifier-user.php';
    }
    }
    // Pour afficher le formulaire de modification d'une annonce et traiter la soumission
    public function modifierAnnonce()
    {
        if (!isset($_SESSION['user_id']) || (($_SESSION['user_role'] ?? '') !== 'admin')) {
            header('Location: /connexion');
            exit;
        }

        $annonceId = $_GET['id'] ?? null;
        if (!$annonceId) {
            header('Location: /admin?section=annonces');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'] ?? '';
            $description = $_POST['description'] ?? '';
            $prix = $_POST['prix'] ?? '';

            AnnonceModel::updateAnnonce($annonceId, $titre, $description, $prix);
            header('Location: /admin?section=annonces');
            exit;
        } else {
            $annonce = AnnonceModel::getAnnonceById($annonceId);
            require __DIR__ . '/../../templates/admin-modifier-annonce.php';
        }
    }

    public function listeUtilisateurs()
    {
        if (!isset($_SESSION['user_id']) || (($_SESSION['user_role'] ?? '') !== 'admin')) {
            header('Location: /connexion');
            exit;
        }

        $users = UserModel::getAllUsers();
        require __DIR__ . '/../../templates/admin-users.php';
    }

    public function supprimerUtilisateur()
    {
        header('Content-Type: application/json');

        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['status' => 'error', 'message' => 'Accès non autorisé']);
            exit;
        }

        $userId = $_GET['id'] ?? null;

        if ($userId) {
            UserModel::deleteUser($userId);
            echo json_encode(['status' => 'success', 'message' => 'Utilisateur supprimé']);
            exit;
        }

        echo json_encode(['status' => 'error', 'message' => "ID de l'utilisateur non spécifié"]);
        exit;
    }

    public function supprimerAnnonce()
    {
        header('Content-Type: application/json');

        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['status' => 'error', 'message' => 'Accès non autorisé']);
            exit;
        }

        $annonceId = $_GET['id'] ?? null;
        if ($annonceId) {
            \App\Models\AnnonceModel::deleteAnnonce($annonceId);
            echo json_encode(['status' => 'success', 'message' => 'Annonce supprimée']);
            exit;
        }
        echo json_encode(['status' => 'error', 'message' => "ID de l'annonce non spécifié"]);
        exit;
    }

    // ...autres méthodes existantes...
}