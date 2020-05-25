# crud-session-base
On va créer un mini site avec affichage de news,
on aura également un utilisateur, qui sera l'administrateur du site, qui pourra insérer, modifier, supprimer les articles
## la structure
Avant de réellement coder, je vais créer la structure. Pages nécessaires, navigations, les rôles, le design
![alt text](https://github.com/WebDevCF2m2020/basePHP/raw/master/29-crud-session-base/datas/Whiteboard%5B1%5D-01.png " 08")
![alt text](https://github.com/WebDevCF2m2020/basePHP/raw/master/29-crud-session-base/datas/Whiteboard%5B2%5D-01.png " 08")
### design :
Quelqu'un d'autre s'en occupe (ou on le fera vers la fin si on travail seul, sauf si le choix est dicté par un besoin graphique ou un client)
## Les technologies
Ici nous allons travailler avec du PHP/MySQL, de l'html et un peu de javascript
### La base de donnée
On va créer notre base de donnée MySQL avec un outil que vous connaissez : Workbench
#### Exportation du fichier Workbench
Nous mettons les fichiers dans datas,
L'exportation de la DB vers notre serveur mysql est effectuée avec le fichier structure.sql
![alt text](https://github.com/WebDevCF2m2020/basePHP/raw/master/29-crud-session-base/datas/schema.png " 08")
#### Création des données de test
Ici on va remplir la table "util" avec un admin / admin (login et mot de passe) dans phpmyadmin

Je mets mes requêtes dans
    
    datas/requetes.sql
Les données de test peuvent être récupérées depuis phpmyadmin, lignes de commandes, Workbench etc....

### Méthodes
Nous choisissons les méthodes suivant plusieurs critères (dans ce cas): 
- site très simple sur lequel on travail seul, préférence au procédural ou quelque éléments en orienté objet
- rôles limités (un seul admin): MVC non nécessaire, au choix, choix de ne pas avoir de contrôlleur frontal
- Division du site en 2:
1) Public
2) Privé

### Choix de début du codage
- page d'accueil (index.php) : va afficher tous les articles au visiteur en mode publique
- le fichier (config.php) contenant les paramètres permettant la connexion à notre base de donnée SQL


