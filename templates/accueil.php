<?php  
ob_start(); 
?>
<div class="relative bg-gradient-to-r from-blue-800 to-blue-900 text-white py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Bienvenue sur Efrei BNB</h1>
        <p class="text-xl mb-8">Trouvez le logement parfait pour votre prochain voyage</p>
        <div class="cta">
            <a href="/creer-annonce" class="inline-block bg-white text-blue-800 font-semibold px-6 py-3 rounded-lg hover:bg-gray-100 transition duration-300 shadow-lg">
                Mettre une annonce
            </a>
        </div>
    </div>
</div>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <?php if (!isset($annonce)): ?>
        <h2 class="text-2xl font-bold text-gray-800 mb-8">Toutes les annonces :</h2>
        
        <?php if (!empty($annonces)): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($annonces as $annonceItem): ?>
                    <div class="annonce-card bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                        <?php if (!empty($annonceItem['image'])): ?>
                            <img src="/uploads/<?= htmlspecialchars($annonceItem['image']) ?>" 
                                 alt="Image de l'annonce" 
                                 class="w-full h-48 object-cover">
                        <?php else: ?>
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500">Pas d'image</span>
                            </div>
                        <?php endif; ?>
                        <div class="p-5">
                            <div class="flex justify-between items-start">
                                <h3 class="annonce-card-title text-lg font-semibold text-gray-800 mb-2">
                                    <?= htmlspecialchars($annonceItem['titre']) ?>
                                </h3>
                                <div class="annonce-card-rating flex items-center text-sm">
                                    <span class="text-blue-800">★</span>
                                    <span>4,9</span>
                                </div>
                            </div>
                            <div class="annonce-card-location text-gray-600 mb-4 line-clamp-2">
                                <?= nl2br(htmlspecialchars($annonceItem['description'])) ?>
                            </div>
                            
                            <div class="annonce-card-info flex justify-between items-center mb-4">
                                <div class="annonce-card-price font-bold text-gray-900">
                                    <?= htmlspecialchars($annonceItem['prix']) ?> € <span class="font-normal text-gray-600">/ nuit</span>
                                </div>
                            </div>
                            <div class="annonce-card-footer border-t border-gray-100 pt-4">
                                <div class="created-by text-sm text-gray-500 mb-3">
                                    <a href="/profil?id=<?= htmlspecialchars($annonceItem['user_id']) ?>" class="hover:text-blue-800">
                                        Créé par : <?= htmlspecialchars($annonceItem['prenom'] . ' ' . $annonceItem['nom']) ?>
                                    </a>
                                </div>
                                <div class="actions flex justify-end space-x-4 text-sm">
                                    <?php if (isset($_SESSION['user_id'])): ?>
                                        <?php if ($_SESSION['user_id'] == $annonceItem['user_id']): ?>
                                            <a href="/modifier-annonce?id=<?= $annonceItem['id'] ?>" class="text-gray-500 hover:text-blue-800">Modifier</a>
                                            <a href="/supprimer-annonce?id=<?= $annonceItem['id'] ?>" 
                                               onclick="return confirm('Supprimer cette annonce ?')"
                                               class="text-gray-500 hover:text-blue-800">Supprimer</a>
                                        <?php endif; ?>
                                        <a href="/reserver-annonce?id=<?= $annonceItem['id'] ?>" class="text-blue-800 font-semibold hover:text-blue-900">Réserver</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-12">
                <div class="mx-auto h-24 w-24 text-gray-400 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900">Aucune annonce disponible</h3>
                <p class="mt-1 text-sm text-gray-500">Soyez le premier à créer une annonce !</p>
                <div class="mt-6">
                    <a href="/creer-annonce" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-800 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Créer une annonce
                    </a>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
<pre>
<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
