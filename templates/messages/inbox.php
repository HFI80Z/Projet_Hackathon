<?php ob_start(); ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Messagerie</h1>
        <a href="/messages/nouveau" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Nouveau message
        </a>
    </div>

    <?php if (empty($conversations)): ?>
        <div class="text-center py-20">
            <div class="mx-auto h-24 w-24 text-gray-400 mb-4">
                <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900">Aucune conversation</h3>
            <p class="mt-2 text-sm text-gray-500">Commencez une nouvelle conversation en cliquant sur "Nouveau message"</p>
        </div>
    <?php else: ?>
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <div class="divide-y divide-gray-200">
                <?php foreach ($conversations as $conv): ?>
                    <div class="relative group hover:bg-gray-50 transition-colors">
                        <div class="flex items-center justify-between p-4">
                            <a href="/messages/conversation?id=<?= $conv['contact_id'] ?>" class="flex-1 flex items-center min-w-0">
                                <!-- Avatar -->
                                <div class="flex-shrink-0 h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                    <span class="text-blue-600 font-medium">
                                        <?= strtoupper(substr($conv['prenom'], 0, 1) . substr($conv['nom'], 0, 1)) ?>
                                    </span>
                                </div>

                                <!-- Contact Info -->
                                <div class="flex-1 min-w-0 mr-4">
                                    <div class="flex items-center">
                                        <p class="text-base font-medium text-gray-900 truncate">
                                            <?= htmlspecialchars($conv['prenom'] . ' ' . $conv['nom']) ?>
                                        </p>
                                        <?php if ($conv['unread_count'] > 0): ?>
                                            <span class="ml-2 bg-red-500 text-white rounded-full px-2 py-1 text-xs font-medium">
                                                <?= $conv['unread_count'] ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <p class="text-sm text-gray-500 truncate">
                                        Dernier message : <?= date('d/m/Y à H:i', strtotime($conv['last_message_date'])) ?>
                                    </p>
                                </div>
                            </a>

                            <!-- Delete Button -->
                            <div class="flex items-center">
                                <a href="/messages/supprimer-conversation?id=<?= $conv['contact_id'] ?>" 
                                   onclick="return confirm('Voulez-vous vraiment supprimer cette conversation ?')"
                                   class="text-gray-400 hover:text-red-600 p-2 rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layout.php';
?>