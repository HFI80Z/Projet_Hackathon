<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';


use App\Controllers\AuthController;
use App\Controllers\UserController;
use App\Controllers\AnnonceController;
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

        default:
        // 404 - Page introuvable
        http_response_code(404);
        echo "Oups ! Page introuvable.";
        break;



    }