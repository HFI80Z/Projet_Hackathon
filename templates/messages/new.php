<?php ob_start(); ?>
<h1>Nouveau message</h1>

<div class="conversation-actions">
   <a href="/messages" class="btn btn-secondary">Retour</a>
</div>

<form action="" method="get" class="search-form">
   <div class="form-group">
      <input type="text" name="search" placeholder="Rechercher un utilisateur..." value="<?= htmlspecialchars($searchTerm ?? '') ?>" class="form-control">
   </div>
   <button type="submit" class="btn btn-primary">Rechercher</button>
</form>

<?php if (isset($users) && !empty($users)): ?>
   <div class="user-list">
      <?php foreach ($users as $user): ?>
         <div class="user-item">
            <div class="user-info">
               <strong><?= htmlspecialchars($user['prenom'] . ' ' . $user['nom']) ?></strong>
               <?php if (isset($user['unread_count']) && $user['unread_count'] > 0): ?>
                  <span class="badge unread-badge"><?= $user['unread_count'] ?></span>
               <?php endif; ?>
            </div>
            <a href="/messages/conversation?id=<?= $user['id'] ?>" class="btn btn-sm btn-primary">Envoyer un message</a>
         </div>
      <?php endforeach; ?>
   </div>
<?php elseif (isset($searchTerm) && !empty($searchTerm)): ?>
   <p>Aucun utilisateur trouvé pour "<?= htmlspecialchars($searchTerm) ?>".</p>
<?php endif; ?>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layout.php';
?>