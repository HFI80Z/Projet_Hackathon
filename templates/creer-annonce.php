<?php ob_start(); ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Créer une annonce</h1>

    <div class="bg-white rounded-xl shadow-md p-6 md:p-8">
        <form action="/creer-annonce" method="POST" enctype="multipart/form-data" class="space-y-6">
            <div class="space-y-2">
                <label for="titre" class="block text-sm font-medium text-gray-700">Titre :</label>
                <input type="text" name="titre" id="titre" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-800 focus:border-blue-800 transition duration-200">
            </div>
            
            <div class="space-y-2">
                <label for="description" class="block text-sm font-medium text-gray-700">Description :</label>
                <textarea name="description" id="description" required rows="5"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-800 focus:border-blue-800 transition duration-200"></textarea>
            </div>
            
            <div class="space-y-2">
                <label for="prix" class="block text-sm font-medium text-gray-700">Prix :</label>
                <div class="relative">
                    <input type="number" name="prix" id="prix" step="0.01" max="99999999.99" required
                           class="w-full pl-4 pr-12 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-800 focus:border-blue-800 transition duration-200">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                        <span class="text-gray-500">€</span>
                    </div>
                </div>
                <p class="text-xs text-gray-500">Prix par nuit</p>
            </div>
            
            <div class="space-y-2">
                <label for="image" class="block text-sm font-medium text-gray-700">Image :</label>
                <div class="flex items-center space-x-2">
                    <label for="image" class="cursor-pointer bg-gray-50 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition duration-200">
                        <span class="text-sm text-gray-700">Choisir un fichier</span>
                        <input type="file" name="image" id="image" accept="image/*" class="hidden">
                    </label>
                    <span id="file-chosen" class="text-sm text-gray-500">Aucun fichier choisi</span>
                </div>
                <p class="text-xs text-gray-500">Format recommandé : JPG, PNG (max. 5MB)</p>
            </div>
            
            <div class="pt-4">
                <button type="submit" 
                        class="w-full sm:w-auto px-6 py-3 bg-blue-800 text-white font-semibold rounded-lg hover:bg-blue-900 transition duration-300 shadow-md">
                    Ajouter cette annonce
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Script pour afficher le nom du fichier sélectionné
    const fileInput = document.getElementById('image');
    const fileChosen = document.getElementById('file-chosen');

    fileInput.addEventListener('change', function() {
        if (this.files.length > 0) {
            fileChosen.textContent = this.files[0].name;
        } else {
            fileChosen.textContent = 'Aucun fichier choisi';
        }
    });
</script>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';