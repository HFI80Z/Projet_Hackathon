<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AuthController;
use App\Controllers\UserController;
use App\Controllers\AnnonceController;
use App\Controllers\MessageController;
use App\Database\Database;
use App\Models\AnnonceModel;
use App\Controllers\OtherController;

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

    case '/creer-annonce': 
        $controller = new OtherController();
        $controller->creerAnnonce();
        break;
    
    case '/reservation': 
        $controller = new OtherController();
        $controller->reservation();
        break;

    case '/ajouter-annonce': 
        $controller = new AnnonceController();
        $controller->ajouterAnnonce();
        break;
    
    case '/modifier-annonce': 
        $controller = new AnnonceController();
        $controller->modifierAnnonce();
        break;
    
    case '/supprimer-annonce':
        $controller = new AnnonceController();
        $controller->supprimerAnnonce();
        break;
    
    case '/reserver-annonce': 
        $controller = new AnnonceController();
        $controller->reserverAnnonce();
        break;
    
    case '/supprimer-reservation': 
        $controller = new AnnonceController();
        $controller->supprimerReservation();
        break;
    
    case '/deconnexion':
        $controller = new AuthController();
        $controller->deconnexion();
        break;
    case '/modifier-compte':
        if (isset($_SESSION['user_id'])) {
            $controller = new UserController();
            $controller->modifierCompte();
        } else {
            header('Location: /connexion');
        }
        break;
    case '/contact': 
        $controller = new OtherController();
        $controller->contact();
        break;
    

    // Routes pour les messages
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


    case '/messages/supprimer-conversation':
        if (isset($_SESSION['user_id'])) {
            $controller = new MessageController();
        // Assurez-vous que la méthode est bien 'supprimerConversation'
            $controller->supprimerConversation();
        } else {
            header('Location: /connexion');
        }
        break;



    // Route pour envoyer un message à l'annonceur
    case '/sendMessageToAdvertiser':
        if (isset($_SESSION['user_id'])) {
            $controller = new AnnonceController();
            $controller->sendMessageToAdvertiser();
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
?>
