<?php
use App\Models\AnnonceModel;
ob_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: /connexion');
    exit;
}
// Récupérer les réservations de l'utilisateur
$reservations = AnnonceModel::getReservationsByUser($_SESSION['user_id']);
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Vos réservations</h1>

    <?php if (!empty($reservations)): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($reservations as $reservation): ?>
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                    <?php if (!empty($reservation['image'])): ?>
                        <img src="/uploads/<?= htmlspecialchars($reservation['image']) ?>" 
                             alt="Image de la réservation" 
                             class="w-full h-48 object-cover">
                    <?php else: ?>
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">Pas d'image</span>
                        </div>
                    <?php endif; ?>
                    
                    <div class="p-5">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">
                            <?= htmlspecialchars($reservation['titre']) ?>
                        </h3>
                        
                        <div class="text-gray-600 mb-4 text-sm line-clamp-3">
                            <?= nl2br(htmlspecialchars($reservation['description'])) ?>
                        </div>
                        
                        <div class="flex justify-between items-center mb-4">
                            <div class="font-bold text-gray-900">
                                <?= htmlspecialchars($reservation['prix']) ?> € <span class="font-normal text-gray-600">/ nuit</span>
                            </div>
                        </div>
                        
                        <div class="border-t border-gray-100 pt-4">
                            <div class="text-sm text-gray-500 mb-3">
                                Réservé le : <?= date('d/m/Y à H:i', strtotime($reservation['created_at'])) ?>
                            </div>
                            
                            <div class="flex justify-end">
                                <a href="/supprimer-reservation?id=<?= $reservation['id'] ?>" 
                                   onclick="return confirm('Voulez-vous vraiment supprimer cette réservation ?')"
                                   class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Annuler
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="text-center py-16 bg-white rounded-xl shadow-md">
            <div class="mx-auto h-24 w-24 text-gray-400 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <h3 class="text-xl font-medium text-gray-900 mb-2">Aucune réservation pour le moment</h3>
            <p class="text-gray-500 mb-8 max-w-md mx-auto">Découvrez les annonces disponibles et réservez votre prochain séjour!</p>
            <a href="/accueil" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-800 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                Parcourir les annonces
            </a>
        </div>
    <?php endif; ?>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
?>