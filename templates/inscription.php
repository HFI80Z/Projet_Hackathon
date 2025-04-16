<?php ob_start(); ?>
<div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h1 class="text-center text-3xl font-extrabold text-gray-900">Inscription</h1>
        <p class="mt-2 text-center text-sm text-gray-600">
            Créez votre compte pour commencer à utiliser Chakou
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" action="/inscription" method="post">
                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                    <div>
                        <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                        <div class="mt-1">
                            <input id="prenom" name="prenom" type="text" autocomplete="given-name"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                        <div class="mt-1">
                            <input id="nom" name="nom" type="text" autocomplete="family-name"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="new-password" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <p class="mt-2 text-sm text-gray-500">Minimum 8 caractères</p>
                </div>

                <div>
                    <label for="region" class="block text-sm font-medium text-gray-700">Région</label>
                    <div class="mt-1">
                        <select id="region" name="region"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="">Sélectionnez votre région</option>
                            <option value="ile-de-france">Île-de-France</option>
                            <option value="auvergne-rhone-alpes">Auvergne-Rhône-Alpes</option>
                            <option value="nouvelle-aquitaine">Nouvelle-Aquitaine</option>
                            <option value="occitanie">Occitanie</option>
                            <option value="hauts-de-france">Hauts-de-France</option>
                            <option value="provence-alpes-cote-dazur">Provence-Alpes-Côte d'Azur</option>
                            <option value="pays-de-la-loire">Pays de la Loire</option>
                            <option value="bretagne">Bretagne</option>
                            <option value="normandie">Normandie</option>
                            <option value="grand-est">Grand Est</option>
                            <option value="centre-val-de-loire">Centre-Val de Loire</option>
                            <option value="bourgogne-franche-comte">Bourgogne-Franche-Comté</option>
                        </select>
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox"
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" required>
                    <label for="terms" class="ml-2 block text-sm text-gray-900">
                        J'accepte les <a href="/conditions" class="text-blue-600 hover:text-blue-500">conditions d'utilisation</a>
                    </label>
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        S'inscrire
                    </button>
                </div>
            </form>

            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Déjà un compte ?</span>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="/connexion"
                        class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Se connecter
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';