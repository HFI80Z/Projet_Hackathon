<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MessageModel;

class MessageController
{
   // Affiche la boîte de réception de l'utilisateur connecté
   public function inbox()
   {
      if (!isset($_SESSION['user_id'])) {
         header('Location: /connexion');
         exit;
      }

      $userId = $_SESSION['user_id'];
      $conversations = MessageModel::getInbox($userId);

      require __DIR__ . '/../../templates/messages/inbox.php';
   }

   // Affiche la conversation avec un utilisateur spécifique
   public function conversation()
   {
      if (!isset($_SESSION['user_id'])) {
         header('Location: /connexion');
         exit;
      }

      $userId = $_SESSION['user_id'];
      $contactId = $_GET['id'] ?? null;

      if (!$contactId) {
         header('Location: /messages');
         exit;
      }

      // Marquer les messages de ce contact comme lus
      MessageModel::markAsRead($contactId, $userId);

      // Récupérer les détails du contact
      $contact = UserModel::getUserById($contactId);

      if (!$contact) {
         header('Location: /messages');
         exit;
      }

      // Récupérer la conversation
      $messages = MessageModel::getConversation($userId, $contactId);

      require __DIR__ . '/../../templates/messages/conversation.php';
   }

   // Envoyer un message
   public function send()
   {
      if (!isset($_SESSION['user_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
         header('Location: /connexion');
         exit;
      }

      $senderId = $_SESSION['user_id'];
      $receiverId = $_POST['receiver_id'] ?? null;
      $content = $_POST['content'] ?? '';

      if ($receiverId && !empty($content)) {
         MessageModel::sendMessage($senderId, $receiverId, $content);
      }

      // Rediriger vers la conversation
      header('Location: /messages/conversation?id=' . $receiverId);
      exit;
   }

   // Liste des utilisateurs pour démarrer une nouvelle conversation
   public function newMessage()
   {
      if (!isset($_SESSION['user_id'])) {
         header('Location: /connexion');
         exit;
      }

      $userId = $_SESSION['user_id'];

      // Si le formulaire est soumis pour rechercher un utilisateur
      $searchTerm = $_GET['search'] ?? '';
      if (!empty($searchTerm)) {
         $users = UserModel::searchUsers($searchTerm, $userId);
      } else {
         // Obtenir tous les utilisateurs avec qui on a déjà des messages
         $users = MessageModel::getUsersWithMessages($userId);
      }

      require __DIR__ . '/../../templates/messages/new.php';
   }
}
