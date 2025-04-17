## EFREI BNB ##
Un site de location de résidence avec possibilité de création, modification et réservation d'annonce, discuter entre utilisateurs

## Personne l'ayant réaliser :
Lory Esteban, Lin William, Leboucher Quentin, Nguyen Anthony

# Présentation Canva :
https://www.canva.com/design/DAGkxwCjILA/wUplEVDzT-c5Fyw_Mf3D7w/view?utm_content=DAGkxwCjILA&utm_campaign=designshare&utm_medium=link2&utm_source=uniquelinks&utlId=hcd81eb1ffd

# 🚀 Fonctionnalités
- Affichage des annonces disponibles

- Création et modification des annonces par les utilisateurs

- Réservation des annonces par les clients

- Messagerie entre utilisateurs pour faciliter la communication

- Gestion des réservations (acceptation, refus)

- Persistances des données dans une base de données PostgreSQL
  
# 🛠 Prérequis 
- Docker
- Docker Compose
- Git
- Navigateur web pour pgAdmin 

## 📦 Installation 

# Clonez le repository : 
```
git clone https://github.com/HFI80Z/Projet_Hackathon.git
cd Projet_Hackathon
```  
# Lancez l'application avec Docker Compose : 
```
docker compose up --build
```

# Accédez à l'application via votre navigateur : 
```
http://localhost:8082
```
# L'Accès à pgAdmin pgAdmin est accessible via votre navigateur : 
```
http://localhost:8081
```
# 📁 Structure du projet 
```
└── projet_hackathon.git/
    ├── README.md
    ├── composer.json
    ├── composer.lock
    ├── docker-compose.yml
    ├── Dockerfile
    ├── init.sql
    ├── public/
    │   ├── index.php
    │   ├── test_db.php
    │   ├── .htaccess
    │   ├── css/
    │   │   └── style.css
    │   └── images/
    │       └── img_6800bec0722df9.71697424.webp
    ├── src/
    │   ├── .DS_Store
    │   ├── Controllers/
    │   │   ├── AdminController.php
    │   │   ├── AnnonceController.php
    │   │   ├── AuthController.php
    │   │   ├── HomeController.php
    │   │   ├── MessageController.php
    │   │   ├── OtherController.php
    │   │   └── UserController.php
    │   ├── Database/
    │   │   └── Database.php
    │   └── Models/
    │       ├── AnnonceModel.php
    │       ├── MessageModel.php
    │       └── UserModel.php
    ├── templates/
    │   ├── accueil.php
    │   ├── admin-modifier-annonce.php
    │   ├── admin-modifier-user.php
    │   ├── admin.php
    │   ├── connexion.php
    │   ├── contact.php
    │   ├── creer-annonce.php
    │   ├── inscription.php
    │   ├── layout.php
    │   ├── modifier-annonce.php
    │   ├── modifier-compte.php
    │   ├── profil.php
    │   ├── recherche.php
    │   ├── reservation.php
    │   ├── messages/
    │   │   ├── conversation.php
    │   │   ├── inbox.php
    │   │   ├── messages.php
    │   │   ├── new.php
    │   │   └── supprimer-conversation.php
    │   └── partials/
    │       ├── footer.php
    │       └── navbar.php
    └── vendor/
        ├── autoload.php
        └── composer/
            ├── autoload_classmap.php
            ├── autoload_namespaces.php
            ├── autoload_psr4.php
            ├── autoload_real.php
            ├── autoload_static.php
            ├── ClassLoader.php
            ├── installed.json
            ├── installed.php
            ├── InstalledVersions.php
            ├── LICENSE
            └── platform_check.php
```
# PostgreSQL
environment: 
- DB_HOST: db
- DB_PORT: 5432
- DB_NAME: projet_db
- DB_USER: postgres
- DB_PASSWORD: password

# pgAdmin
environment: 
- PGADMIN_DEFAULT_EMAIL: admin@admin.com
- PGADMIN_DEFAULT_PASSWORD: admin

# 🔨 Développement 
Pour le développement, les volumes Docker sont configurés pour refléter les changements en temps réel :

volumes:

./public:/var/www/html/public
./src:/var/www/html/src
./templates:/var/www/html/templates 

## 🚀 Commandes utiles

# Démarrer l'application:
```
docker compose up
```
# Démarrer l'application en arrière-plan
```
docker compose up -d
```
# Arrêter l'application
```
docker compose down
```
# Reconstruire les containers
```
docker compose up --build
```
# Voir les logs
```
docker compose logs
```
# Accéder au container PHP
```
docker compose exec php bash
```
# Accéder à la base de données
```
docker compose exec db psql -U postgres -d todolist
```
# Accéder à pgAdmin
```
http://localhost:8081
```
# Redémarrer pgAdmin si nécessaire
```
docker compose restart pgadmin
```
# Configuration initiale de pgAdmin Connectez-vous avec :

- Email: admin@admin.com

- Mot de passe: admin

# Pour ajouter le serveur PostgreSQL :

- Clic droit sur "Servers" → "Register" → "Server"
- Dans l'onglet "General" : Name: projet_db (ou autre nom de votre choix)
- Dans l'onglet "Connection" : Host name/address:
- db Port: 5432
- Maintenance database: projet_db
- Username: postgres
- Password: password

# Vous pouvez maintenant :

- Visualiser la structure de la base de données
- Exécuter des requêtes SQL
- Gérer les tables et les données
- Exporter/Importer des données

# 🔨 Services Docker L'application utilise trois services Docker :

PHP/Apache : Serveur web et application PHP 
PostgreSQL : Base de données 
pgAdmin : Interface d'administration de la base de données 

# 🛡 Sécurité 
- Échappement des données HTML
- Requêtes préparées pour la base de données
- Validation des entrées utilisateur

# 🤝 Contribution 
- Fork le projet
- Créez votre branche (git checkout -b feature/AmazingFeature)
- Committez vos changements (git commit -m 'Add some AmazingFeature')
- Push vers la branche (git push origin feature/AmazingFeature)
- Ouvrez une Pull Request

