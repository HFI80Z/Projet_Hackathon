<?php ob_start(); ?>
<h1>Messagerie</h1>

<div class="inbox-actions">
   <a href="/messages/nouveau" class="btn btn-primary">Nouveau message</a>
</div>

<?php if (empty($conversations)): ?>
   <p>Vous n'avez pas encore de conversations.</p>
<?php else: ?>
   <div class="conversations-list">
      <?php foreach ($conversations as $conv): ?>
         <div class="conversation-item">
            <!-- Lien vers la conversation -->
            <a href="/messages/conversation?id=<?= $conv['contact_id'] ?>">
               <div class="contact-info">
                  <strong><?= htmlspecialchars($conv['prenom'] . ' ' . $conv['nom']) ?></strong>
                  <?php if ($conv['unread_count'] > 0): ?>
                     <span class="badge unread-badge"><?= $conv['unread_count'] ?></span>
                  <?php endif; ?>
               </div>
               <div class="last-message-date">
                  <?= date('d/m/Y H:i', strtotime($conv['last_message_date'])) ?>
               </div>
            </a>

            <!-- Bouton pour supprimer la conversation -->
            <a href="/messages/supprimer-conversation?id=<?= $conv['contact_id'] ?>"
               onclick="return confirm('Voulez-vous vraiment supprimer cette conversation ?')"
               class="btn btn-danger btn-sm"
               style="margin-left: 10px;">Supprimer</a>
         </div>
      <?php endforeach; ?>
   </div>
<?php endif; ?>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layout.php';
?>
