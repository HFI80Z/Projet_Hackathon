<?php ob_start(); ?>
<h1>Conversation avec <?= htmlspecialchars($contact['prenom'] . ' ' . $contact['nom']) ?></h1>

<div class="conversation-actions">
   <a href="/messages" class="btn btn-secondary">Retour</a>
</div>

<div class="messages-container">
   <?php foreach ($messages as $message): ?>
      <?php $isCurrentUser = $message['sender_id'] == $_SESSION['user_id']; ?>
      <div class="message <?= $isCurrentUser ? 'sent' : 'received' ?>">
         <div class="message-content">
            <?= nl2br(htmlspecialchars($message['content'])) ?>
         </div>
         <div class="message-meta">
            <?= date('d/m/Y H:i', strtotime($message['created_at'])) ?>
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