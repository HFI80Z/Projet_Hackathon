<?php ob_start(); ?>

<div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 bg-white lg:max-w-2xl lg:w-full">
            <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
            </div>
        </div>
    </div>
    <main class="mt-16 mx-auto max-w-7xl px-4 sm:mt-24 sm:px-6 lg:mt-32">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
            <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                    <span class="block text-indigo-600 xl:inline">EFREI BNB</span>
                    <span class="block text-gray-900 mt-3">Votre plateforme de location</span>
                </h1>
                <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                    Découvrez des logements uniques et mettez les vôtres en location
                </p>
                <div class="mt-10 sm:flex sm:justify-center lg:justify-start">
                    <div class="rounded-md shadow">
                        <a href="/creer-annonce" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10 transition-all duration-300 transform hover:scale-105">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Déposer une annonce
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-12 relative lg:col-span-6 lg:mt-0">
                <div class="relative mx-auto w-full rounded-lg shadow-xl overflow-hidden">
                    <div class="absolute inset-0"></div>
                    <img class="w-full h-56 object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="/images/photo.jpg" alt="Image d'accueil">
                </div>
            </div>
        </div>
    </main>
</div>

<div class="relative bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                Nos dernières annonces
            </h2>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                Une sélection exclusive de logements disponibles
            </p>
        </div>

        <!-- Search/Filter Bar -->
        <div class="mb-12 max-w-3xl mx-auto bg-white rounded-xl shadow-lg p-4">
            <form action="/" method="GET" class="flex items-center space-x-4">
                <div class="flex-1">
                    <input type="text" name="search" placeholder="Rechercher un logement..." 
                        value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                        class="w-full px-4 py-3 border-0 rounded-lg bg-gray-100 focus:ring-2 focus:ring-indigo-500">
                </div>
                <div class="flex items-center space-x-2">
                    <button type="submit" class="flex items-center px-4 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Rechercher
                    </button>
                    <a href="/" class="<?= isset($_GET['search']) ? 'visible' : 'hidden' ?> flex items-center px-4 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                        Réinitialiser
                    </a>
                </div>
            </form>
        </div>

        <?php if (!empty($annonces)): ?>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <?php foreach ($annonces as $annonceItem): ?>
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative h-48 w-full overflow-hidden rounded-t-2xl">
                    <?php if (!empty($annonceItem['image'])): ?>
                    <img src="/images/<?= htmlspecialchars($annonceItem['image']) ?>" 
                         alt="<?= htmlspecialchars($annonceItem['titre']) ?>" 
                         class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    <?php else: ?>
                    <div class="w-full h-full bg-gradient-to-r from-indigo-100 to-purple-100 flex items-center justify-center">
                        <svg class="w-16 h-16 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">
                            <?= htmlspecialchars($annonceItem['titre']) ?>
                        </h3>
                    </div>
                    
                    <p class="text-gray-600 line-clamp-2 mb-6">
                        <?= nl2br(htmlspecialchars($annonceItem['description'])) ?>
                    </p>

                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-2xl font-bold text-indigo-600">
                                <?= htmlspecialchars($annonceItem['prix']) ?>€
                            </span>
                            <span class="text-gray-500">/nuit</span>
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex justify-between items-center">
                            <div class="text-sm text-gray-500">
                                <a href="/profil?id=<?= htmlspecialchars($annonceItem['user_id']) ?>" class="hover:text-indigo-600">
                                    Par <?= htmlspecialchars($annonceItem['prenom'] . ' ' . $annonceItem['nom']) ?>
                                </a>
                            </div>
                            <div class="flex space-x-2">
                                <?php if (isset($_SESSION['user_id'])): ?>
                                    <?php if ($_SESSION['user_id'] === $annonceItem['user_id']): ?>
                                        <a href="/modifier-annonce?id=<?= $annonceItem['id'] ?>" 
                                           class="p-2 text-gray-400 hover:text-indigo-600 transition-colors"
                                           title="Modifier">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                            </svg>
                                        </a>
                                        <a href="/supprimer-annonce?id=<?= $annonceItem['id'] ?>" 
                                           class="p-2 text-gray-400 hover:text-red-600 transition-colors"
                                           title="Supprimer">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </a>
                                    <?php else: ?>
                                        <form action="/reserver-annonce" method="POST" class="inline">
                                            <input type="hidden" name="annonce_id" value="<?= $annonceItem['id'] ?>">
                                            <button type="submit" class="flex items-center px-3 py-1 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors text-sm">
                                                Réserver
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                    <form action="/sendMessageToAdvertiser" method="POST" class="inline">
                                        <input type="hidden" name="annonce_id" value="<?= $annonceItem['id'] ?>">
                                        <button type="submit" class="flex items-center px-3 py-1 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors text-sm ml-2">
                                            Message
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="text-center py-20">
            <div class="inline-block p-8 bg-white rounded-2xl shadow-lg">
                <div class="mx-auto h-24 w-24 text-indigo-600 mb-4">
                    <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Aucune annonce disponible</h3>
                <p class="text-gray-600 max-w-md mx-auto mb-8">
                    Soyez le premier à partager votre logement avec notre communauté !
                </p>
                <a href="/creer-annonce" class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition-colors">
                    Commencer maintenant
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';