<?php ob_start(); ?>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header Section -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
        <div class="flex items-center space-x-6">
            <!-- Avatar -->
            <div class="w-24 h-24 rounded-full bg-blue-100 flex items-center justify-center">
                <span class="text-blue-600 text-2xl font-bold">
                    <?= strtoupper(substr($user['prenom'], 0, 1) . substr($user['nom'], 0, 1)) ?>
                </span>
            </div>
            
            <!-- User Info -->
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-1">
                    <?= htmlspecialchars($user['prenom'] . ' ' . $user['nom']) ?>
                </h1>
                <p class="text-gray-600">
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <?= htmlspecialchars($user['region']) ?>
                    </span>
                </p>
            </div>
        </div>
    </div>

    <!-- Details Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Personal Info Card -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-xl font-semibold mb-4 flex items-center">
                <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Informations personnelles
            </h2>
            
            <dl class="space-y-4">
                <div>
                    <dt class="text-sm text-gray-500">Nom complet</dt>
                    <dd class="mt-1 text-gray-900">
                        <?= htmlspecialchars($user['prenom'] . ' ' . $user['nom']) ?>
                    </dd>
                </div>
                <div>
                    <dt class="text-sm text-gray-500">Email</dt>
                    <dd class="mt-1 text-gray-900">
                        <?= htmlspecialchars($user['email']) ?>
                    </dd>
                </div>
                <div>
                    <dt class="text-sm text-gray-500">Localisation</dt>
                    <dd class="mt-1 text-gray-900">
                        <?= htmlspecialchars($user['region']) ?>
                    </dd>
                </div>
            </dl>
            
            <div class="mt-6">
                <a href="/modifier-compte" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                    </svg>
                    Modifier le profil
                </a>
            </div>
        </div>

        <!-- Additional Section (Optional) -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-xl font-semibold mb-4 flex items-center">
                <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                Statistiques
            </h2>
            
            <div class="space-y-4">
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <span class="text-gray-600">Annonces publiées</span>
                    <span class="font-medium text-gray-900">12</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <span class="text-gray-600">Avis reçus</span>
                    <span class="font-medium text-gray-900">4.8 ★</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <span class="text-gray-600">Membre depuis</span>
                    <span class="font-medium text-gray-900">2023</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Back Link -->
    <div class="mt-8">
        <a href="/" class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Retour à l'accueil
        </a>
    </div>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';