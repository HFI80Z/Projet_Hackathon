<?php ob_start(); ?>

<div class="min-h-screen bg-gradient-to-br from-blue-50 to-gray-100">
    <!-- Header avec photo de fond -->
    <div class="relative bg-blue-600 h-48">
        <div class="absolute inset-0 bg-black opacity-30"></div>
        <div class="relative max-w-5xl mx-auto px-6 h-full flex items-center">
            <div>
                <h1 class="text-4xl font-bold text-white">Mon Profil</h1>
                <p class="text-blue-100 mt-2">Gérez vos informations personnelles</p>
            </div>
        </div>
    </div>

    <!-- Contenu principal avec un espacement ajouté sous le header -->
    <div class="max-w-5xl mx-auto px-6 mt-12"> <!-- Ajout de mt-12 pour l'espacement -->
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Sidebar -->
            <div class="w-full md:w-1/3">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <!-- Photo de profil -->
                    <div class="bg-gray-200 h-48 flex items-center justify-center">
                        <svg class="h-24 w-24 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12a5 5 0 110-10 5 5 0 010 10zm0-2a3 3 0 100-6 3 3 0 000 6zm8 11a1 1 0 01-2 0v-2a3 3 0 00-3-3H9a3 3 0 00-3 3v2a1 1 0 01-2 0v-2a5 5 0 015-5h6a5 5 0 015 5v2z"/>
                        </svg>
                    </div>
                    <!-- Menu -->
                    <div class="p-6">
                        <div class="space-y-3">
                            <a href="#" class="flex items-center space-x-3 text-blue-600 font-medium">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span>Informations personnelles</span>
                            </a>
                            <a href="#" class="flex items-center space-x-3 text-gray-500 hover:text-blue-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                <span>Sécurité</span>
                            </a>
                            <a href="#" class="flex items-center space-x-3 text-gray-500 hover:text-blue-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                                <span>Paiements</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulaire -->
            <div class="w-full md:w-2/3">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Modifier mes informations</h2>
                        
                        <form action="/modifier-compte" method="POST" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Prénom -->
                                <div>
                                    <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                                    <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                </div>
                                 
                                <!-- Nom -->
                                <div>
                                    <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                                    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                </div>
                                 
                                <!-- Email -->
                                <div class="md:col-span-2">
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse email</label>
                                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                </div>
                                 
                                <!-- Région -->
                                <div class="md:col-span-2">
                                    <label for="region" class="block text-sm font-medium text-gray-700 mb-1">Région</label>
                                    <select id="region" name="region" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                        <option value="Île-de-France" <?= $user['region'] === 'Île-de-France' ? 'selected' : '' ?>>Île-de-France</option>
                                        <option value="Auvergne-Rhône-Alpes" <?= $user['region'] === 'Auvergne-Rhône-Alpes' ? 'selected' : '' ?>>Auvergne-Rhône-Alpes</option>
                                        <option value="Nouvelle-Aquitaine" <?= $user['region'] === 'Nouvelle-Aquitaine' ? 'selected' : '' ?>>Nouvelle-Aquitaine</option>
                                        <option value="Occitanie" <?= $user['region'] === 'Occitanie' ? 'selected' : '' ?>>Occitanie</option>
                                        <option value="Hauts-de-France" <?= $user['region'] === 'Hauts-de-France' ? 'selected' : '' ?>>Hauts-de-France</option>
                                    </select>
                                </div>
                                 
                                <!-- Photo de profil -->
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Photo de profil</label>
                                    <div class="mt-1 flex items-center">
                                        <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100 mr-4">
                                            <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
                                            </svg>
                                        </span>
                                        <button type="button" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            Changer
                                        </button>
                                    </div>
                                </div>
                            </div>
                             
                            <div class="pt-6 border-t border-gray-200 flex justify-end space-x-3">
                                <button type="button" class="px-6 py-3 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Annuler
                                </button>
                                <button type="submit" class="px-6 py-3 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Enregistrer les modifications
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';