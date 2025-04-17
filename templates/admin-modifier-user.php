<?php
ob_start();
// $user est transmis (via App\Models\UserModel::getUserById($userId))
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'utilisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Modifier l'utilisateur</h1>
        <form action="/admin/modifier-user?id=<?= htmlspecialchars($user['id']) ?>" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="nom" class="block text-gray-700 font-bold">Nom</label>
                <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($user['nom']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="prenom" class="block text-gray-700 font-bold">Prénom</label>
                <input type="text" name="prenom" id="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold">Email</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
        <label for="role" class="block text-gray-700 font-bold">Rôle</label>
        <select name="role" id="role" class="mt-1 block w-full border border-gray-300 rounded-md">
            <option value="user" <?= ($user['role'] ?? '') === 'user' ? 'selected' : '' ?>>Utilisateur</option>
            <option value="admin" <?= ($user['role'] ?? '') === 'admin' ? 'selected' : '' ?>>Administrateur</option>
        </select>
        </div>
            <div class="flex justify-between">
                <a href="/admin?section=utilisateurs" class="text-blue-500 hover:underline">Annuler</a>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Enregistrer</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
$content = ob_get_clean();
echo $content;
?>