<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController
{
    public function connexion()
    {
        $error = null; // Pour stocker le message d'erreur

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Récupérer l'utilisateur par email
            $user = UserModel::getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_prenom'] = $user['prenom'];
                $_SESSION['role'] = $user['role']; // 👈 Ajoute cette ligne
                header('Location: /');
                exit;
            } else {
                $error = "Adresse e-mail ou mot de passe incorrect.";
            }
        }

        // Afficher le formulaire de connexion avec potentiellement une erreur
        require __DIR__ . '/../../templates/connexion.php';
    }

    public function inscription()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $nom = $_POST['nom'] ?? '';
            $prenom = $_POST['prenom'] ?? '';
            $region = $_POST['region'] ?? '';

            if (!empty($email) && !empty($password)) {
                UserModel::createUser($email, $password, $nom, $prenom, $region);
                header('Location: /connexion');
                exit;
            }
        }

        // Afficher le formulaire d'inscription
        require __DIR__ . '/../../templates/inscription.php';
    }

    public function deconnexion()
    {
        session_destroy();
        header('Location: /');
        exit;
    }
}
