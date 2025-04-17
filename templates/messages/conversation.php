<?php ob_start(); ?>

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <!-- Header -->
    <div class="flex items-center mb-6 space-x-4">
        <a href="/messages" class="text-gray-600 hover:text-gray-900 flex items-center">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Retour
        </a>
        <h1 class="text-2xl font-bold text-gray-900 flex items-center">
            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                <span class="text-blue-600 text-sm font-medium">
                    <?= strtoupper(substr($contact['prenom'], 0, 1) . substr($contact['nom'], 0, 1)) ?>
                </span>
            </div>
            Conversation avec <?= htmlspecialchars($contact['prenom'] . ' ' . $contact['nom']) ?>
        </h1>
    </div>

    <!-- Messages Container -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 mb-6 h-[calc(100vh-280px)] overflow-y-auto">
        <?php if (empty($messages)): ?>
            <div class="text-center py-12 text-gray-500">
                Aucun message échangé pour le moment
            </div>
        <?php else: ?>
            <div class="space-y-4">
                <?php foreach ($messages as $message): ?>
                    <?php 
                        $isCurrentUser = $message['sender_id'] == $_SESSION['user_id'];
                        $senderName = $isCurrentUser ? 'Vous' : htmlspecialchars($message['sender_prenom'] . ' ' . htmlspecialchars($message['sender_nom']));
                    ?>
                    <div class="flex <?= $isCurrentUser ? 'justify-end' : 'justify-start' ?>">
                        <div class="max-w-[70%]">
                            <div class="<?= $isCurrentUser ? 'bg-blue-100' : 'bg-gray-100' ?> rounded-xl p-4">
                                <!-- Message Header -->
                                <div class="flex items-center justify-between mb-2 space-x-4">
                                    <span class="text-sm font-medium <?= $isCurrentUser ? 'text-blue-600' : 'text-gray-700' ?>">
                                        <?= $senderName ?>
                                    </span>
                                    <span class="text-xs text-gray-500">
                                        <?= date('d/m/Y H:i', strtotime($message['created_at'])) ?>
                                    </span>
                                </div>
                                
                                <!-- Message Content -->
                                <div class="text-gray-800 break-words">
                                    <?= nl2br(htmlspecialchars($message['content'] ?? 'Message par défaut')) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Message Form -->
    <form action="/messages/envoyer" method="post" class="sticky bottom-0  pt-4 border-t border-gray-200">
        <input type="hidden" name="receiver_id" value="<?= $contact['id'] ?>">
        <div class="flex gap-3">
            <textarea 
                name="content" 
                required 
                rows="2"
                class="flex-1 block w-full rounded-xl border border-gray-300 shadow-sm px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Écrivez votre message..."
            ></textarea>
            <button 
                type="submit" 
                class="self-end bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700 transition-colors flex items-center"
            >
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
                Envoyer
            </button>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layout.php';
?>