<?php
ob_start();
?>

<div class="banner">
    <h1>Bienvenue sur EFREI BNB</h1>
    <p>Naviguez parmi les différentes annonces</p>
    <div class="cta">
        <a href="/creer-annonce">Mettre une annonce</a>
    </div>
</div>

<?php if (!empty($annonces)): ?>
    <h2>Toutes les annonces :</h2>
    <div class="annonces">
        <?php foreach ($annonces as $annonceItem): ?>
            <div class="annonce-card">
                <?php if (!empty($annonceItem['image'])): ?>
                    <img src="/images/<?= htmlspecialchars($annonceItem['image']) ?>" alt="Image de l'annonce">
                <?php endif; ?>
                <div class="annonce-card-content">
                    <div class="annonce-card-title"><?= htmlspecialchars($annonceItem['titre']) ?></div>
                    <div class="annonce-card-location">
                        <?= nl2br(htmlspecialchars($annonceItem['description'])) ?>
                    </div>
                    <div class="annonce-card-info">
                        <div class="annonce-card-price"><?= htmlspecialchars($annonceItem['prix']) ?> € / nuit</div>
                    </div>
                    <div class="annonce-card-footer">
                        <div class="created-by">
                            <a href="/profil?id=<?= htmlspecialchars($annonceItem['user_id']) ?>">
                                Créé par : <?= htmlspecialchars($annonceItem['prenom'] . ' ' . $annonceItem['nom']) ?>
                            </a>
                        </div>
                        <div class="actions">
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <?php if ($_SESSION['user_id'] === $annonceItem['user_id']): ?>
                                    <a href="/modifier-annonce?id=<?= $annonceItem['id'] ?>" class="btn btn-sm btn-secondary">Modifier</a>
                                    <a href="/supprimer-annonce?id=<?= $annonceItem['id'] ?>" class="btn btn-sm btn-danger">Supprimer</a>
                                <?php else: ?>
                                    <form action="/reserver-annonce" method="POST">
                                        <input type="hidden" name="annonce_id" value="<?= $annonceItem['id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-primary">Réserver</button>
                                    </form>
                                <?php endif; ?>
                                <form action="/sendMessageToAdvertiser" method="POST">
                                    <input type="hidden" name="annonce_id" value="<?= $annonceItem['id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-primary">Envoyer un message</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>Aucune annonce disponible.</p>
<?php endif; ?>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
?>