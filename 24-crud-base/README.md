# 24-crud-base
## Marche à suivre

 - Ouvrez PhpMyAdmin en mysql avec root et "" comme mot de passe
 - Importez datas/crudbase-structure-v1.sql sans changement de paramètres
 - Sélectionnez la DB crudbase dans PhpMyAdmin
 - Importez le fichier crudbase-datas-only-v1.sql en désactivant les clefs étrangères (Décochez:  Activer la vérification des clés étrangères)
 
 ### plan des variables get
 Qui vont nous servir pour naviguer dans le site et effectuer les actions de type CRUD
 
    // Nous aurons 4 variables get, la première sera l'action, la deuxième sera l'id
    /*
     * CRUD => Create Read Update Delete
     * 
     * R / index.php => pas de variables GET => afficher tous les pages en résumé par date DESC
     * 
     * R /?affiche=2 => variable GET nommée affiche avec l'id de la page comme valeur => Affiche le détail de la page dont l'id est 2
     * 
     * C /?insertion => variable GET nommée insertion sans valeur => Affiche le formulaire pour insérer un nouvel article
     * 
     * R-U /?miseajour=2 => variable GET nommée miseajour avec l'id de la page comme valeur => Affiche le formulaire de modification de la page dont l'id est 2
     * 
     * D /?suppression=2 => variable GET nommée suppression avec l'id de la page comme valeur => supprime la page dont l'id est 2 (avec confirmation)
     */
### Connexion à la DB
connexion très simple et sans vérification

    // connexion à la base de donnée
    $db = mysqli_connect("localhost","root","","crudbase",3308);
    // on indique que notre connexion est en utf8
    mysqli_set_charset($db,"utf8");
### Index.php est également notre router
non complet

    // si on veut afficher le détail d'un article R
    if(isset($_GET['affiche'])){
    
    
    
    // si on veut insérer un nouvel article C
    }elseif (isset($_GET['insertion'])){
    
    
    // si on souhaite mettre à jour un article U
    }elseif (isset($_GET['miseajour'])){
    
    
    // si on souhaite supprimer un article D
    }elseif (isset($_GET['suppression'])){
    
    
    // sinon affichage de l'accueil
    }else{
    
    }
### Accueil.php

    pages/accueil.php
    ....
    // requête qui récupère toutes les pages avec auteur correspondant
    $sql = "SELECT p.idthepage, p.thetitle, p.thetext, p.thedate, 
    				u.thelogin, u.thename 
    FROM thepage p 
    	INNER JOIN utilisateur u 
        ON p.utilisateur_idutilisateur = u.idutilisateur 
    ORDER BY p.thedate DESC;";
    // on effectue la requête sql
    $requete = mysqli_query($db,$sql) or die("Erreur: ".mysqli_errno($db));
    
    // on compte le nombre de ligne de résultats
    $nb = mysqli_num_rows($requete);
    ....
    <?php
            // si on a pas de résultat
            if(empty($nb)){
                echo "<h4>Pas encore de pages sur le site</h4>";
            // on a au moins une page
            }else {
                echo "<h4>Nombre de pages : $nb</h4>";
                // tant qu'on a des pages
                while ($item = mysqli_fetch_assoc($requete)) {
                ?>
                    <h5><?=$item['thetitle']?></h5>
                    <p><?=$item['thetext']?> ... <a href="./?affiche=<?=$item['idthepage']?>">Lire la suite</a></p>
                    <h6>Ecrit le <?=$item['thedate']?> par <?=$item['thename']?>, surnommé <?=$item['thelogin']?></h6><hr>
                <?php
                }
            }
    
            ?>
                
        