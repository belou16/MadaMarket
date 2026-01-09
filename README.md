# MadaMarket - Site de vente de produits malgaches

## Installation

1. Installer les dépendances :
```bash
composer install
```

2. Configurer la base de données dans `.env.local` :
```env
DATABASE_URL="mysql://root:@127.0.0.1:3306/madamarket"
MAILER_DSN=smtp://sandbox.smtp.mailtrap.io:2525?encryption=tls&auth_mode=login&username=YOUR_USERNAME&password=YOUR_PASSWORD
```

3. Créer la base de données :
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

4. Créer l'admin :
```bash
php bin/console app:create-admin
```

5. Charger les produits de test :
```bash
php bin/console doctrine:fixtures:load
```

6. Lancer le serveur :
```bash
symfony server:start
```

## Compte Admin
- Email : armandodapa10@gmail.com
- Mot de passe : admin123

## Fonctionnalités

✅ Page d'accueil moderne
✅ Menu de navigation
✅ Authentification complète (connexion, déconnexion, inscription)
✅ Se souvenir de moi
✅ Mot de passe oublié
✅ Profil utilisateur (afficher, modifier, supprimer)
✅ CRUD complet des produits (protégé ADMIN)
✅ Pages statiques (mentions légales, CGU, CGV, confidentialité, qui sommes-nous)
✅ Formulaire de contact
✅ Design moderne et responsive