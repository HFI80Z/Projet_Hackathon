<?php ob_start(); ?>

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <a href="/" class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Retour aux annonces
        </a>
        <h1 class="text-3xl font-bold text-gray-900 mt-4">Modifier votre annonce</h1>
    </div>

    <form action="/modifier-annonce?id=<?= htmlspecialchars($annonce['id']) ?>" method="POST" enctype="multipart/form-data" class="bg-white shadow-sm rounded-xl p-6">
        <!-- Titre et Prix -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Titre de l'annonce</label>
                <input type="text" name="titre" value="<?= htmlspecialchars($annonce['titre']) ?>" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ex : Maison contemporaine avec piscine">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Prix par nuit (€)</label>
                <div class="relative">
                    <input type="number" name="prix" value="<?= htmlspecialchars($annonce['prix']) ?>" step="0.01" required
                        class="w-full pl-12 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="150,00">
                    <span class="absolute left-4 top-3 text-gray-500">€</span>
                </div>
            </div>
        </div>

        <!-- Description -->
        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" required rows="5"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Décrivez votre bien en détails..."><?= htmlspecialchars($annonce['description']) ?></textarea>
        </div>

        <!-- Image Upload -->
        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Photo du bien</label>
            
            <?php if (!empty($annonce['image'])): ?>
                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-2">Image actuelle :</p>
                    <div class="relative group">
                        <img src="/uploads/<?= htmlspecialchars($annonce['image']) ?>" 
                             alt="Image actuelle" 
                             class="rounded-lg w-full max-w-xs border-2 border-gray-200">
                        <input type="hidden" name="current_image" value="<?= htmlspecialchars($annonce['image']) ?>">
                    </div>
                </div>
            <?php endif; ?>

            <div class="flex items-center justify-center w-full">
                <label class="flex flex-col w-full max-w-md border-2 border-dashed border-gray-300 rounded-xl h-32 hover:border-blue-500 transition-colors cursor-pointer">
                    <div class="flex flex-col items-center justify-center pt-5">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="pt-1 text-sm text-gray-600">
                            <?= empty($annonce['image']) ? 'Ajouter une photo' : 'Remplacer la photo' ?>
                        </p>
                    </div>
                    <input type="file" name="image" accept="image/*" class="hidden">
                </label>
            </div>
            <p class="mt-2 text-xs text-gray-500">Formats acceptés : PNG, JPG (max. 10MB)</p>
        </div>

        <!-- Submit Button -->
        <div class="mt-8 border-t border-gray-200 pt-6">
            <button type="submit" 
                class="w-full md:w-auto px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold transition-colors flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Enregistrer les modifications
            </button>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
?>