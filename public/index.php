<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AuthController;
use App\Controllers\UserController;
use App\Controllers\AnnonceController;
use App\Controllers\MessageController; // Ajout du nouveau contrôleur
use App\Database\Database;
use App\Models\AnnonceModel;

// Activer l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Routage minimaliste
switch ($uri) {
    case '/':
    case '/accueil':
        $controller = new AnnonceController();
        $controller->index();
        break;

    case '/connexion':
        $controller = new AuthController();
        $controller->connexion();
        break;

    case '/inscription':
        $controller = new AuthController();
        $controller->inscription();
        break;

    case '/profil':
        $controller = new UserController();
        $controller->afficherProfil();
        break;

    case '/modifier-compte':
        if (isset($_SESSION['user_id'])) {
            $controller = new UserController();
            $controller->modifierCompte();
        } else {
            header('Location: /connexion');
        }
        break;

    case '/deconnexion':
        $controller = new AuthController();
        $controller->deconnexion();
        break;

    // Nouvelles routes pour le système de messagerie
    case '/messages':
        if (isset($_SESSION['user_id'])) {
            $controller = new MessageController();
            $controller->inbox();
        } else {
            header('Location: /connexion');
        }
        break;

    case '/messages/conversation':
        if (isset($_SESSION['user_id'])) {
            $controller = new MessageController();
            $controller->conversation();
        } else {
            header('Location: /connexion');
        }
        break;

    case '/messages/envoyer':
        if (isset($_SESSION['user_id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new MessageController();
            $controller->send();
        } else {
            header('Location: /connexion');
        }
        break;

    case '/messages/nouveau':
        if (isset($_SESSION['user_id'])) {
            $controller = new MessageController();
            $controller->newMessage();
        } else {
            header('Location: /connexion');
        }
        break;

    default:
        // 404 - Page introuvable
        http_response_code(404);
        echo "Oups ! Page introuvable.";
        break;
}
