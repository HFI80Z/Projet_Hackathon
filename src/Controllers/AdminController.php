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
    if (!isset($_SESSION['user_id'])) {
        header('Location: /connexion');
        exit;
    }
    
    $currentUser = UserModel::getUserById($_SESSION['user_id']);
    if (!$currentUser || $currentUser['role'] !== 'admin') {
        header('Location: /');
        exit;
    }
    
    $userId = $_GET['id'] ?? null;
    if (!$userId) {
        header('Location: /admin?section=utilisateurs');
        exit;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $role = $_POST['role'] ?? 'user';
    
        UserModel::updateUserByAdmin($userId, $nom, $prenom, $email, $role);
        header('Location: /admin?section=utilisateurs');
        exit;
    } else {
        $user = UserModel::getUserById($userId);
        
        require __DIR__ . '/../../templates/admin-modifier-user.php';
    }
    }
    public function modifierAnnonce()
{
    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['user_id'])) {
        header('Location: /connexion');
        exit;
    }
    
    // Récupérer l'utilisateur pour vérifier son rôle
    $currentUser = UserModel::getUserById($_SESSION['user_id']);
    
    // Vérifier si l'utilisateur est un administrateur
    if (!$currentUser || $currentUser['role'] !== 'admin') {
        header('Location: /');
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
        
        // Gérer l'image si elle est présente
        $imageName = $annonce['image'] ?? null; // Conserver l'image existante par défaut
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../public/uploads/';
            $tmpFile = $_FILES['image']['tmp_name'];
            $originalName = $_FILES['image']['name'];
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            $imageName = uniqid('img_', true) . '.' . $extension;
            move_uploaded_file($tmpFile, $uploadDir . $imageName);
        }
        
        AnnonceModel::updateAnnonce($annonceId, $titre, $description, $prix, $imageName);
        header('Location: /admin?section=annonces');
        exit;
    } else {
        $annonce = AnnonceModel::getAnnonceById($annonceId);
        if (!$annonce) {
            header('Location: /admin?section=annonces');
            exit;
        }
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

}