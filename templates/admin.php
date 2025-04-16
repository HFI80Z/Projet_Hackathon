<?php 
ob_start();
$section = $_GET['section'] ?? ''; 
$users = [];
$annonces = [];
$userCount = 0;
$annonceCount = 0;

if ($section === 'utilisateurs') {
    $users = \App\Models\UserModel::getAllUsers();
} elseif ($section === 'annonces') {
    $annonces = \App\Models\AnnonceModel::getAllAnnonces();
} elseif ($section === '') {
    $userCount = \App\Models\UserModel::getUserCount();
    $annonceCount = \App\Models\AnnonceModel::getAnnonceCount();
}
?>
<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrateur - EFREI BNB</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .sidebar { transition: all 0.3s; }
        .active-nav { background-color: #6366f1; color: white; }
        .active-nav:hover { background-color: #4f46e5; }
    </style>
</head>
<body class="h-full">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg">
        <div class="flex items-center justify-center h-16 bg-indigo-700">
            <h1 class="text-xl font-bold text-white">EFREI BNB Admin</h1>
        </div>
        <nav class="mt-8">
            <div class="px-4 space-y-1">
                <a href="/admin?section=utilisateurs" 
                   class="<?= $section === 'utilisateurs' ? 'active-nav' : 'text-gray-600 hover:bg-gray-100' ?> group flex items-center px-4 py-3 rounded-lg">
                    <svg class="w-5 h-5 mr-3 <?= $section === 'utilisateurs' ? 'text-white' : 'text-gray-500 group-hover:text-gray-700' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Gestion Utilisateurs
                </a>
                <a href="/admin?section=annonces" 
                   class="<?= $section === 'annonces' ? 'active-nav' : 'text-gray-600 hover:bg-gray-100' ?> group flex items-center px-4 py-3 rounded-lg">
                    <svg class="w-5 h-5 mr-3 <?= $section === 'annonces' ? 'text-white' : 'text-gray-500 group-hover:text-gray-700' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    Gestion Annonces
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="ml-64 p-8">
        <?php if ($section !== ''): ?>
        <div class="mb-4">
            <a href="/admin" class="text-blue-500 hover:underline">&larr; Retour au Dashboard</a>
        </div>
        <?php endif; ?>
        <?php if ($section === 'annonces'): ?>
        <!-- Gestion Annonces -->
        <div class="mb-8 flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">Gestion des annonces</h2>
            <div class="relative">
                <input type="text" placeholder="Rechercher une annonce..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($annonces as $annonce): ?>
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <div class="h-48 bg-gray-200 overflow-hidden">
                    <?php if (!empty($annonce['image'])): ?>
                    <img src="/uploads/<?= htmlspecialchars($annonce['image']) ?>" alt="<?= htmlspecialchars($annonce['titre']) ?>" class="w-full h-full object-cover">
                    <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-r from-indigo-100 to-purple-100">
                        <svg class="w-16 h-16 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start">
                    <h3 class="text-lg font-semibold text-gray-800"><?= htmlspecialchars($annonce['titre']) ?></h3>
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded-full"><?= htmlspecialchars($annonce['prix']) ?>€/nuit</span>
                    </div>
                    <p class="mt-2 text-gray-600 text-sm line-clamp-2"><?= htmlspecialchars($annonce['description']) ?></p>
                    <div class="mt-4 flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-xs font-medium">
                                <?= strtoupper(substr($annonce['prenom'], 0, 1) . substr($annonce['nom'], 0, 1)) ?>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-700"><?= htmlspecialchars($annonce['prenom'] . ' ' . $annonce['nom']) ?></p>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-between items-center">
                        <span class="text-xs text-gray-500">ID: <?= htmlspecialchars($annonce['id']) ?></span>
                        <div class="flex space-x-2">
                            <a href="/admin/modifier-annonce?id=<?= $annonce['id'] ?>" class="text-indigo-600 hover:text-indigo-900">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <a href="/admin/supprimer-annonce?id=<?= $annonce['id'] ?>" class="text-red-600 hover:text-red-900 delete-annonce">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php elseif ($section === 'utilisateurs'): ?>
        <!-- Gestion Utilisateurs - Table Layout -->
        <div class="mb-8 flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">Gestion des utilisateurs</h2>
            <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Nouvel utilisateur
            </button>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="relative w-64">
                        <input type="text" placeholder="Rechercher un utilisateur..." class="pl-10 pr-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-600"><?= count($users) ?> utilisateurs</span>
                        <button class="p-2 text-gray-500 hover:text-gray-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rôle</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dernière connexion</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-medium">
                                        <?= strtoupper(substr($user['prenom'], 0, 1) . substr($user['nom'], 0, 1)) ?>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($user['prenom'] . ' ' . $user['nom']) ?></div>
                                        <div class="text-sm text-gray-500">ID: <?= htmlspecialchars($user['id']) ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"><?= htmlspecialchars($user['email']) ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $user['role'] === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' ?>">
                                    <?= htmlspecialchars($user['role']) ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?= date('d/m/Y H:i', strtotime($user['last_login'] ?? 'now')) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="/admin/modifier-user?id=<?= $user['id'] ?>" class="text-indigo-600 hover:text-indigo-900 mr-4">Modifier</a>
                                <a href="/admin/supprimer-user?id=<?= $user['id'] ?>" class="text-red-600 hover:text-red-900 delete-user">Supprimer</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Pagination ou autres éléments peuvent être ajoutés ici -->
        </div>
        <?php else: ?>
        <!-- Dashboard Overview -->
       <!-- Dashboard Overview -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-xl shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Utilisateurs</p>
                <p class="text-2xl font-semibold text-gray-900 mt-1"><?= $userCount ?></p>
            </div>
            <div class="p-3 rounded-lg bg-indigo-100 text-indigo-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
        </div>
    </div>
    <div class="bg-white p-6 rounded-xl shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Annonces</p>
                <p class="text-2xl font-semibold text-gray-900 mt-1"><?= $annonceCount ?></p>
            </div>
            <div class="p-3 rounded-lg bg-green-100 text-green-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
        </div>
    </div>
    <!-- D'autres cartes de statistiques peuvent être ajoutées ici -->
</div>
            <!-- D'autres cartes de statistiques peuvent être ajoutées ici -->
        </div>
        <?php endif; ?>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Confirmation de suppression pour les annonces (envoi de POST)
        document.querySelectorAll('.delete-annonce').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('Voulez-vous vraiment supprimer cette annonce ?')) {
                    fetch(this.href, { method: 'POST' })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Suppression de l'élément parent correspondant à l'annonce
                                this.closest('.bg-white.rounded-xl').remove();
                            }
                        });
                }
            });
        });

        // Confirmation de suppression pour les utilisateurs
        document.querySelectorAll('.delete-user').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('Voulez-vous vraiment supprimer cet utilisateur ?')) {
                    fetch(this.href, { method: 'POST' })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                this.closest('tr').remove();
                            }
                        });
                }
            });
        });
    });
    </script>
</body>
</html>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';