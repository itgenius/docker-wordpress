# WordPress Docker Project

Ce projet configure un environnement WordPress complet à l'aide de Docker et Docker Compose.

## Contenu du projet

- **WordPress** : Dernière version de WordPress.
- **MySQL** : Base de données MySQL 8.0.
- **Volumes** : Les données persistantes sont stockées dans des volumes Docker.
- **Thèmes** : Les thèmes WordPress sont gérés dans le dossier `wp-data/themes`.

## Prérequis

Avant de commencer, assurez-vous d'avoir installé les outils suivants :

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

## Installation

1. Clonez ce dépôt :
   ```bash
   git clone https://github.com/itgenius/docker-wordpress.git
   cd docker-wordpress

   
   
   
2. Lancez les conteneurs Docker :
docker-compose up -d

3. Accédez à votre site WordPress dans votre navigateur à l'adresse :
http://localhost:8000

4. Structure du projet :
. docker-compose.yml : Configuration des services Docker (WordPress, MySQL, etc.).
. wp-data/ : Contient les données persistantes de WordPress.
. .gitignore : Fichiers et dossiers ignorés par Git.
. README.md : Documentation du projet.
5. Personnalisation : 
. Modifier les identifiants de la base de données : Vous pouvez modifier les variables d'environnement dans le fichier docker-compose.yml pour personnaliser les identifiants MySQL.
. Ajouter des thèmes : Placez vos thèmes WordPress dans le dossier wp-data/themes.
6. Commandes utiles :
. Démarrer les conteneurs :
docker-compose up -d
. Arrêter les conteneurs :
docker-compose down
. Voir les logs :
docker-compose logs -f

7. Licence
Ce projet est sous licence MIT.
