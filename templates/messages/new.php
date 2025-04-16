<?php ob_start(); ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center space-x-4">
            <a href="/messages" class="text-gray-600 hover:text-gray-900 flex items-center">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Retour
            </a>
            <h1 class="text-3xl font-bold text-gray-900">Nouveau message</h1>
        </div>
    </div>

    <!-- Search Form -->
    <form action="" method="get" class="mb-8">
        <div class="relative rounded-lg shadow-sm">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input 
                type="text" 
                name="search" 
                placeholder="Rechercher par nom, prénom ou email..." 
                value="<?= htmlspecialchars($searchTerm ?? '') ?>" 
                class="block w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            >
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <button 
                    type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded-r-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    Rechercher
                </button>
            </div>
        </div>
    </form>

    <?php if (isset($searchTerm) && !empty($searchTerm)): ?>
        <?php if (isset($users) && !empty($users)): ?>
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <div class="divide-y divide-gray-200">
                    <?php foreach ($users as $user): ?>
                        <div class="group hover:bg-gray-50 transition-colors">
                            <div class="flex items-center justify-between p-4">
                                <div class="flex items-center min-w-0 flex-1">
                                    <!-- Avatar -->
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                        <span class="text-blue-600 font-medium">
                                            <?= strtoupper(substr($user['prenom'], 0, 1) . substr($user['nom'], 0, 1)) ?>
                                        </span>
                                    </div>

                                    <!-- User Info -->
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center space-x-2">
                                            <p class="text-base font-medium text-gray-900 truncate">
                                                <?= htmlspecialchars($user['prenom'] . ' ' . $user['nom']) ?>
                                            </p>
                                            <?php if (isset($user['unread_count']) && $user['unread_count'] > 0): ?>
                                                <span class="bg-red-500 text-white rounded-full px-2 py-1 text-xs font-medium">
                                                    <?= $user['unread_count'] ?> non-lus
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <?php if (!empty($user['region'])): ?>
                                            <p class="text-sm text-gray-500 truncate">
                                                <?= htmlspecialchars($user['region']) ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Message Button -->
                                <a 
                                    href="/messages/conversation?id=<?= $user['id'] ?>" 
                                    class="ml-4 px-4 py-2 bg-white border border-blue-600 rounded-md text-blue-600 hover:bg-blue-50 hover:text-blue-700 transition-colors"
                                >
                                    Contacter
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center py-12">
                <div class="mx-auto h-24 w-24 text-gray-400 mb-4">
                    <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900">Aucun résultat pour "<?= htmlspecialchars($searchTerm) ?>"</h3>
                <p class="mt-2 text-sm text-gray-500">Vérifiez l'orthographe ou essayez d'autres termes</p>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="text-center py-12">
            <div class="mx-auto h-24 w-24 text-gray-400 mb-4">
                <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900">Rechercher un utilisateur</h3>
            <p class="mt-2 text-sm text-gray-500">Commencez par taper un nom, un prénom ou un email</p>
        </div>
    <?php endif; ?>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layout.php';
?>