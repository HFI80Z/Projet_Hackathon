<?php
ob_start();
// $annonce est transmis (via App\Models\AnnonceModel::getAnnonceById($annonceId))
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'annonce</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Modifier l'annonce</h1>
        <form action="/admin/modifier-annonce?id=<?= htmlspecialchars($annonce['id']) ?>" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="titre" class="block text-gray-700 font-bold">Titre</label>
                <input type="text" name="titre" id="titre" value="<?= htmlspecialchars($annonce['titre']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold">Description</label>
                <textarea name="description" id="description" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md"><?= htmlspecialchars($annonce['description']) ?></textarea>
            </div>
            <div class="mb-4">
                <label for="prix" class="block text-gray-700 font-bold">Prix</label>
                <input type="number" step="0.01" name="prix" id="prix" value="<?= htmlspecialchars($annonce['prix']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md">
            </div>
            <div class="flex justify-between">
                <a href="/admin?section=annonces" class="text-blue-500 hover:underline">Annuler</a>
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