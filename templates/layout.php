<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon mini Chakou</title>
</head>
<body>
    <nav>
        <div class="logo">
            <a href="/"><img src="https://www.airbnb.fr/favicon.ico" alt="Logo Airbnb" class="logo-img"></a>
        </div>
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="/reservation">Réservation</a></li>
            <li><a href="/creer-annonce">Mettre une annonce</a></li>
            <li><a href="/contact">Nous contacter</a></li>
        </ul>
        <div class="user-menu">
            <img src="/images/user-icon.png" alt="Compte">
            <div class="user-menu-content">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="/modifier-compte">Compte</a>
                    <a href="/messages">Messages</a>
                    <a href="/deconnexion">Déconnexion</a>
                <?php else: ?>
                    <a href="/connexion">Connexion</a>
                    <a href="/inscription">Inscription</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <main>
        <?= $content ?>
    </main>

    <footer>
    <p>&#169; 2025 Chakou, Inc. · <a href="/confidentialite">Confidentialité</a> | <a href="/conditions-generales">Conditions générales</a></p>
</footer>

</body>
</html>
