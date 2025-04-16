<?php

namespace App\Models;

use App\Database\Database;
use PDO;

class MessageModel
{
   public static function sendMessage($senderId, $receiverId, $content)
   {
      $db = Database::getConnection();
      $sql = "INSERT INTO messages (sender_id, receiver_id, content) 
                VALUES (:sender_id, :receiver_id, :content)
                RETURNING id";
      $stmt = $db->prepare($sql);
      $stmt->execute([
         ':sender_id' => $senderId,
         ':receiver_id' => $receiverId,
         ':content' => $content
      ]);
      return $stmt->fetchColumn();
   }

   public static function getConversation($user1Id, $user2Id)
   {
      $db = Database::getConnection();
      $sql = "SELECT m.*, 
                s.nom as sender_nom, s.prenom as sender_prenom,
                r.nom as receiver_nom, r.prenom as receiver_prenom
                FROM messages m
                JOIN users s ON m.sender_id = s.id
                JOIN users r ON m.receiver_id = r.id
                WHERE (m.sender_id = :user1 AND m.receiver_id = :user2)
                OR (m.sender_id = :user2 AND m.receiver_id = :user1)
                ORDER BY m.created_at ASC";
      $stmt = $db->prepare($sql);
      $stmt->execute([
         ':user1' => $user1Id,
         ':user2' => $user2Id
      ]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public static function getInbox($userId)
   {
      $db = Database::getConnection();
      $sql = "SELECT 
                DISTINCT 
                CASE 
                    WHEN m.sender_id = :userId THEN m.receiver_id 
                    ELSE m.sender_id 
                END as contact_id,
                u.nom, u.prenom,
                (SELECT COUNT(*) FROM messages 
                 WHERE receiver_id = :userId 
                 AND sender_id = CASE 
                                    WHEN m.sender_id = :userId THEN m.receiver_id 
                                    ELSE m.sender_id 
                                  END 
                 AND is_read = false) as unread_count,
                (SELECT created_at FROM messages 
                 WHERE (sender_id = :userId AND receiver_id = CASE 
                                                                WHEN m.sender_id = :userId THEN m.receiver_id 
                                                                ELSE m.sender_id 
                                                              END)
                 OR (sender_id = CASE 
                                    WHEN m.sender_id = :userId THEN m.receiver_id 
                                    ELSE m.sender_id 
                                  END AND receiver_id = :userId)
                 ORDER BY created_at DESC LIMIT 1) as last_message_date
            FROM messages m
            JOIN users u ON u.id = CASE 
                                        WHEN m.sender_id = :userId THEN m.receiver_id 
                                        ELSE m.sender_id 
                                    END
            WHERE m.sender_id = :userId OR m.receiver_id = :userId
            ORDER BY last_message_date DESC";
      $stmt = $db->prepare($sql);
      $stmt->execute([':userId' => $userId]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public static function markAsRead($senderId, $receiverId)
   {
      $db = Database::getConnection();
      $sql = "UPDATE messages 
                SET is_read = TRUE 
                WHERE sender_id = :sender_id 
                AND receiver_id = :receiver_id
                AND is_read = FALSE";
      $stmt = $db->prepare($sql);
      $stmt->execute([
         ':sender_id' => $senderId,
         ':receiver_id' => $receiverId
      ]);
   }

   public static function getUnreadCount($userId)
   {
      $db = Database::getConnection();
      $sql = "SELECT COUNT(*) as count FROM messages 
                WHERE receiver_id = :user_id AND is_read = FALSE";
      $stmt = $db->prepare($sql);
      $stmt->execute([':user_id' => $userId]);
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result['count'];
   }

   public static function getUsersWithMessages($userId)
   {
      $db = Database::getConnection();
      $sql = "SELECT DISTINCT 
                    u.id, u.nom, u.prenom, u.email,
                    (SELECT COUNT(*) FROM messages 
                     WHERE receiver_id = :userId 
                     AND sender_id = u.id 
                     AND is_read = false) as unread_count
                FROM users u
                JOIN messages m ON (m.sender_id = u.id OR m.receiver_id = u.id)
                WHERE (m.sender_id = :userId OR m.receiver_id = :userId)
                AND u.id != :userId
                ORDER BY u.nom, u.prenom";
      $stmt = $db->prepare($sql);
      $stmt->execute([':userId' => $userId]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
}
