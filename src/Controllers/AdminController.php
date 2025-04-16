<?php

namespace App\Controllers;
use App\Database\Database;


use App\Models\UserModel;

class AdminController
{
    public function index()
    {
        require __DIR__ . '/../../templates/admin.php';
}
    // Nouvelle méthode pour afficher la liste des utilisateurs (accessible uniquement aux administrateurs)
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
        
        // Vérifier que l'utilisateur est connecté
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
        public static function deleteUser($userId)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare('DELETE FROM users WHERE id = :id');
        $stmt->bindParam(':id', $userId, \PDO::PARAM_INT);
        $stmt->execute();
    }
    public static function getAllUsers()
    {
        $db = Database::getConnection();
        $sql = "SELECT id, email, nom, prenom, role FROM users ORDER BY id";
        $stmt = $db->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function supprimerAnnonce()
{
    header('Content-Type: application/json');
    // Optionnel : vérifier que l'utilisateur est connecté et qu'il a un rôle spécifique
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
