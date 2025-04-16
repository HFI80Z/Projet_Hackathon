<?php ob_start(); ?>
<h1>Conversation avec <?= htmlspecialchars($contact['prenom'] . ' ' . $contact['nom']) ?></h1>

<div class="conversation-actions">
   <a href="/messages" class="btn btn-secondary">Retour</a>
</div>

<div class="messages-container">
   <?php foreach ($messages as $message): ?>
      <?php 
         // Vérifie si le message est envoyé par l'utilisateur actuel
         $isCurrentUser = $message['sender_id'] == $_SESSION['user_id']; 
         // Si l'utilisateur est l'expéditeur, on affiche 'Vous', sinon le prénom et nom du message
         $senderFirstName = $isCurrentUser ? 'Vous' : htmlspecialchars($message['sender_prenom']);
         $senderLastName = $isCurrentUser ? '' : htmlspecialchars($message['sender_nom']);
      ?>
      <div class="message <?= $isCurrentUser ? 'sent' : 'received' ?>">
         <div class="message-header">
            <strong><?= $senderFirstName ?> <?= $senderLastName ?></strong>
            <small><?= date('d/m/Y H:i', strtotime($message['created_at'])) ?></small>
         </div>
         <div class="message-content">
            <!-- Affichage du contenu du message ou texte par défaut si vide -->
            <?= nl2br(htmlspecialchars($message['content'] ?? 'Message par défaut')) ?>
         </div>
      </div>
   <?php endforeach; ?>
</div>

<form action="/messages/envoyer" method="post" class="message-form">
   <input type="hidden" name="receiver_id" value="<?= $contact['id'] ?>">
   <div class="form-group">
      <textarea name="content" required class="form-control" placeholder="Votre message..."></textarea>
   </div>
   <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layout.php';
?>
