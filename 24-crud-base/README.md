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
### affiche.php
              
      $sql = "SELECT p.idthepage, p.thetitle, p.thetext, p.thedate, 
      				u.thelogin, u.thename 
      FROM thepage p 
      	INNER JOIN utilisateur u 
          ON p.utilisateur_idutilisateur = u.idutilisateur 
      WHERE p.idthepage=$idpage";
      // on effectue la requête sql
      $requete = mysqli_query($db,$sql) or die("Erreur: ".mysqli_errno($db));
      
      // on vérifie si on un résultat $nb == 1 ou $nb == 0
      $nb = mysqli_num_rows($requete);
      
      // on a un article
      if($nb==1) {
          // si oui on stocke la ligne dans $item
          $item =  mysqli_fetch_assoc($requete);
          // on récupère le titre
          $titre = $item['thetitle'];
      }else{
          $titre = "Erreur 404";
      }
                
 ### insertion.php       
 
    // superglobale POST non vide
    if(!empty($_POST)){
    
        /*
         * on transforme nos variables POST en variables locales, on va les traîter pour éviter les attaques
         */
    
        // si idutilisateur n'est pas convertible en entier, il vaudra 0, sinon cette chaîne devient un entier
        $idutilisateur = (int) $_POST['idutilisateur'];
    
        // protection de base trim (les espaces avant après) puis strip_tags (retire les balises) puis conversion des caractères spéciaux en entités html
        $thetitle = htmlspecialchars(strip_tags(trim($_POST['thetitle'])),ENT_QUOTES);
        // protection contre les balises, sauf <p><a><br> et <img>
        $thetext = htmlspecialchars(strip_tags($_POST['thetext'],'<p><a><br><img>'),ENT_QUOTES);
    
        // si un des champs est vide
        if(empty($idutilisateur)||empty($thetitle)||empty($thetext)){
            // redirection vers le formulaire non envoyé
            header("Location: ./?insertion");
            exit();
        // sinon on va insérer la page
        }else{
            $sql = "INSERT INTO thepage (thetitle,thetext,utilisateur_idutilisateur) 
                    VALUES ('$thetitle','$thetext',$idutilisateur)";
            $envoi = mysqli_query($db,$sql);
    
            // réussite de l'envoi
            if($envoi){
                header("Location: ./");
                exit();
            }
        }
    
    
    // on a pas envoyé le formulaire, on sélectionne les auteurs
    }else {
    
        /*
         * Récupération de tous les auteurs pour le choix d'un auteur pour l'article
         */
        $sql = "SELECT idutilisateur, thelogin, thename FROM utilisateur ORDER BY thelogin ASC;";
        $requestUtil = mysqli_query($db, $sql) or die(mysqli_errno($db));
    // si on a pas d'utilisateur, on ne peut pas insérer de page, redirection avec header("Location: ./") vers la page d'accueil, on arrête le script de cette page avec exit() ou die()
        if (empty(mysqli_num_rows($requestUtil))) {
            header("Location: ./");
            exit();
        }
    }
    ....
    <form action="" method="post" name="insertion">
            <p>Choisir un utilisateur : <br>
            <select name="idutilisateur" required>
                <?php
                while($user = mysqli_fetch_assoc($requestUtil)){
                ?>
                <option value="<?=$user['idutilisateur']?>"><?=$user['thelogin']?> | <?=$user['thename']?></option>
                <?php
                }
                ?>
            </select>
            </p>
            <p>Titre : <br>
            <input type="text" name="thetitle" placeholder="Titre" required maxlength="200">
            </p>
            <p>Texte : <br>
                <textarea name="thetext" placeholder="Votre texte ici" required></textarea>
            </p>
            <p><input type="submit" value="Envoyer"></p>
        </form>
### Index.php est mis à jour

    // si on veut afficher le détail d'un article ET que affiche contient un string composé  uniquement d'un entier non signé [0123456789]*   R
    if(isset($_GET['affiche']) && ctype_digit($_GET['affiche'])){
    
        // on convertit le string affiche en int
        $idpage = (int) $_GET['affiche'];
    
        // appel de la page détail de l'article
        require_once "pages/affiche.php";
    
    // si on veut insérer un nouvel article, existence de la variable get "insertion" C
    }elseif (isset($_GET['insertion'])){
    
        // appel de la page d'insertion
        require_once "pages/insertion.php";
    
    // si on souhaite mettre à jour un article U
    }elseif (isset($_GET['miseajour'])){
    
    
    // si on souhaite supprimer un article D
    }elseif (isset($_GET['suppression'])){
    
    
    // sinon affichage de l'accueil
    }else{
       // appel de la page d'accueil
       require_once "pages/accueil.php";
    }
           