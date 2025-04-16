<?php
// Inclure le modèle pour récupérer les conversations et messages
use App\Models\MessageModel;
use App\Models\AnnonceModel;

// Récupérer les conversations
$conversations = MessageModel::getInbox($_SESSION['user_id']);
$selectedConversation = null;
$annonceDetails = null;

// Vérifier si une conversation a été sélectionnée
if (isset($_GET['conversation_id'])) {
    $selectedConversation = MessageModel::getConversation($_SESSION['user_id'], $_GET['conversation_id']);
    // Récupérer les détails de l'annonce de cette conversation
    $annonceDetails = AnnonceModel::getAnnonceById($selectedConversation[0]['annonce_id']);
} elseif (isset($_GET['annonce_id'])) {
    // Démarrer une nouvelle conversation si une annonce est sélectionnée
    $annonceDetails = AnnonceModel::getAnnonceById($_GET['annonce_id']);
}

?>

<div class="messages-page">
    <div class="conversations-list">
        <h2>Conversations</h2>
        <ul>
            <?php foreach ($conversations as $conv): ?>
                <li>
                    <a href="?conversation_id=<?= $conv['contact_id'] ?>">
                        <div class="conversation-info">
                            <strong><?= htmlspecialchars($conv['prenom'] . ' ' . $conv['nom']) ?></strong>
                            <span><?= htmlspecialchars($conv['last_message_date']) ?></span>
                        </div>
                        <div class="announcement-info">
                            <strong><?= htmlspecialchars($conv['titre']) ?></strong>
                            <img src="/uploads/<?= htmlspecialchars($conv['image']) ?>" alt="Annonce image" class="annonce-image">
                        </div>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="conversation-view">
        <?php if ($selectedConversation): ?>
            <h2>Conversation avec <?= htmlspecialchars($selectedConversation[0]['prenom'] . ' ' . $selectedConversation[0]['nom']) ?></h2>
            <div class="messages">
                <?php foreach ($selectedConversation as $message): ?>
                    <div class="message <?= $message['sender_id'] == $_SESSION['user_id'] ? 'sent' : 'received' ?>">
                        <p><?= nl2br(htmlspecialchars($message['message'])) ?></p>
                        <small><?= date('d/m/Y H:i', strtotime($message['created_at'])) ?></small>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Formulaire pour envoyer un message -->
            <form action="/messages/envoyer" method="post" class="message-form">
                <input type="hidden" name="receiver_id" value="<?= $selectedConversation[0]['contact_id'] ?>">
                <textarea name="content" required></textarea>
                <button type="submit">Envoyer</button>
            </form>
        <?php else: ?>
            <p>Sélectionnez une conversation pour voir les messages.</p>
        <?php endif; ?>
    </div>

    <div class="annonce-details">
        <?php if ($annonceDetails): ?>
            <h3>Détails de l'annonce</h3>
            <img src="/uploads/<?= htmlspecialchars($annonceDetails['image']) ?>" alt="Image de l'annonce">
            <p><strong>Titre :</strong> <?= htmlspecialchars($annonceDetails['titre']) ?></p>
            <p><strong>Description :</strong> <?= nl2br(htmlspecialchars($annonceDetails['description'])) ?></p>
            <p><strong>Prix :</strong> <?= htmlspecialchars($annonceDetails['prix']) ?> €</p>
        <?php endif; ?>
    </div>
</div>

