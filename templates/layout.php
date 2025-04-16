<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Efrei BNB</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col bg-gray-50">
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center h-16">
                    <a href="/" class="flex-shrink-0 flex items-center h-full">
                        <img class="max-h-full w-auto" src="/images/logo.png" alt="Logo Efrei BNB">
                        <span class="ml-2 text-xl font-semibold text-blue-900"></span>
                    </a>
                </div>
                <?php $current = $_SERVER['REQUEST_URI']; ?>
                <div class="hidden md:ml-6 md:flex md:items-center md:space-x-8">
                    <a href="/"
                    class="<?= $current === '/' ? 'text-gray-900 border-b-2 border-blue-900' : 'text-gray-500 hover:text-blue-900 hover:border-blue-300 border-b-2 border-transparent' ?> inline-flex items-center px-1 pt-1 text-sm font-medium">
                    Accueil
                    </a>
                    <a href="/reservation"
                    class="<?= $current === '/reservation' ? 'text-gray-900 border-b-2 border-blue-900' : 'text-gray-500 hover:text-blue-900 hover:border-blue-300 border-b-2 border-transparent' ?> inline-flex items-center px-1 pt-1 text-sm font-medium">
                    Réservation
                    </a>
                    <a href="/creer-annonce"
                    class="<?= $current === '/creer-annonce' ? 'text-gray-900 border-b-2 border-blue-900' : 'text-gray-500 hover:text-blue-900 hover:border-blue-300 border-b-2 border-transparent' ?> inline-flex items-center px-1 pt-1 text-sm font-medium">
                    Mettre une annonce
                    </a>
                    <a href="/contact"
                    class="<?= $current === '/contact' ? 'text-gray-900 border-b-2 border-blue-900' : 'text-gray-500 hover:text-blue-900 hover:border-blue-300 border-b-2 border-transparent' ?> inline-flex items-center px-1 pt-1 text-sm font-medium">
                    Nous contacter
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="relative user-menu ml-4">
                        <button class="flex items-center space-x-2 p-2 rounded-full hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <img class="h-8 w-8 rounded-full" src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y" alt="Compte">
                        </button>

                        <div class="user-menu-content hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                                <a href="/admin" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Panel Administrateur</a>
                            <?php endif; ?>
                            <a href="/modifier-compte" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Compte</a>
                            <a href="/messages" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Messages</a>
                            <a href="/deconnexion" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Déconnexion</a>
                        <?php else: ?>
                            <a href="/connexion" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Connexion</a>
                            <a href="/inscription" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Inscription</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <a href="/" class="bg-blue-50 border-blue-900 text-blue-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Accueil</a>
                <a href="/reservation" class="border-transparent text-gray-600 hover:bg-blue-50 hover:border-blue-300 hover:text-blue-900 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Réservation</a>
                <a href="/creer-annonce" class="border-transparent text-gray-600 hover:bg-blue-50 hover:border-blue-300 hover:text-blue-900 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Mettre une annonce</a>
                <a href="/contact" class="border-transparent text-gray-600 hover:bg-blue-50 hover:border-blue-300 hover:text-blue-900 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Nous contacter</a>
            </div>
        </div>
    </nav>
    <main class="flex-grow">
        <?= $content ?>
    </main>
    <footer class="bg-white border-t border-gray-200 py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-500 text-sm">&copy; 2025 Efrei BNB, Inc.</p>
                <div class="mt-4 md:mt-0 space-x-6">
                    <a href="/confidentialite" class="text-gray-500 hover:text-blue-900 text-sm">Confidentialité</a>
                    <a href="/conditions-generales" class="text-gray-500 hover:text-blue-900 text-sm">Conditions générales</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggleButton = document.querySelector(".user-menu button");
            const menuContent = document.querySelector(".user-menu-content");

            toggleButton.addEventListener("click", function (e) {
                e.stopPropagation();
                menuContent.classList.toggle("hidden");
            });

            document.addEventListener("click", function () {
                menuContent.classList.add("hidden");
            });

            menuContent.addEventListener("click", function (e) {
                e.stopPropagation();
            });
        });
    </script>
</body>
</html>