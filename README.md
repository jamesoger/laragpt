# LaraGPT -chatbot 

<img src="/public/img/logo.png?raw=true" alt="">

## Installation:

### 1

- cloner le projet 
- Se rendre sur le bon chemin

```bash
cd laraGPT
```


### 2
-Installer XAMP
-Glisser le dossier VS code dans le htdocs de XAMP
- Se rendre sur localhost/phpmyadmin
- Créer une database, lui donner le meme nom que celui dans le dossier database
- Renommer le fichier .env à la racine du projet et modifier les informations suivantes:

```bash
HOST=localhost
USERNAME=root
PASSWORD=
DBNAME=lara_database
```

### 3

- Installer les dépendances

```bash
composer install
```

-Effectuer les migrations

```bash
php artisan migrate --seed
```


  
