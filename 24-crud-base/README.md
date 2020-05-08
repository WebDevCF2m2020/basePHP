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

### boutons ajouter, modifier, supprimer

    <p>
                    <a href="./?miseajour=<?=$item['idthepage']?>"><img src="img/update.png" alt="Mettre à jour" title="Mettre à jour"/></a>
                    <a href="./?suppression=<?=$item['idthepage']?>"><img src="img/delete.png" alt="Supprimer" title="Supprimer"/></a>
                </p>    
### Gestion du delete
CF

    index.php
    ....
    // si on souhaite supprimer un article D
    }elseif (isset($_GET['suppression'])&&ctype_digit($_GET['suppression'])){
    
        // on convertit le string suppression en int
        $idpage = (int) $_GET['suppression'];
    
        // appel de la page
        require_once "pages/delete.php";
    ...
Et dans delete.php

    pages/delete.php
    <?php
    // si il existe une variable get qui se nomme "confirm"
    if(isset($_GET['confirm'])){
    
        // requête
        $sql = "DELETE FROM thepage WHERE idthepage=$idpage";
    
        // exécution de la requête
        mysqli_query($db,$sql) or die("Erreur n° ".mysqli_errno($db));
    
        // redirection, vers l'accueil
        header("Location: ./");
        // arrêt du chargement
        exit();
    }
    
    
    
    
    // requête qui récupère la page grâce à son id
    $sql = "SELECT p.idthepage, p.thetitle 
            FROM thepage p 
            WHERE p.idthepage=$idpage";
    // on effectue la requête sql avec gestion d'erreur procédurale or die()
    $requete = mysqli_query($db,$sql) or die("Erreur: ".mysqli_errno($db));
    
    // on vérifie si on un résultat $nb == 1 ou $nb == 0
    $nb = mysqli_num_rows($requete);
    
    // on a un article
    if($nb===1) {
        // si oui on stocke la ligne dans $item
        $item =  mysqli_fetch_assoc($requete);
        // on récupère le titre
        $titre = "Suppression de ".$item['thetitle'];
    }else{
        $titre = "Erreur 404";
    }
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?=$titre?></title>
    </head>
    <body>
    <h1><?=$titre?></h1>
    <div id="menu">
        <a href="./">Accueil</a>
        <a href="./?insertion"><img src="img/record.png" alt="insérer" title="Insérer une nouvelle page"></a> <a href="./?insertion" title="Insérer une nouvelle page">Insertion d'une page</a>
    </div>
    <div id="content">
        <div id="pages">
            <?php
            // si on a pas de résultat
            if(empty($nb)){
                echo "<h4>Cette page n'existe plus</h4>";
            // on a au moins une page
            }else {
                ?>
                    <h5>Voulez-vous vraiment supprimer la page "<?=$item['thetitle']?>" ?</h5>
            <a href="?suppression=<?=$item['idthepage']?>&confirm=ok"><button type="button" >Oui</button></a> <button onclick="history.go(-1);">Non</button>
    
                <?php
            }
            ?>
        </div>
    </div>
    </body>
    </html>
### Gestion de l'update
CF

    index.php
    ...
    // si on souhaite mettre à jour un article U
    }elseif (isset($_GET['miseajour'])&&ctype_digit($_GET['miseajour'])){
    
        // on convertit miseajour en entier numérique
        $idpage = (int) $_GET['miseajour'];
    
        // appel de la page de mise à jour
        require_once "pages/update.php";
Et dans affiche.php

        <?php
        /*
         * Update est l'élément le plus complexe du CRUD
         */
        
        // si le formulaire est envoyé (un seul formulaire dans la page)
        if(!empty($_POST)){
            // protection de base trim (les espaces avant après) puis strip_tags (retire les balises) puis conversion des caractères spéciaux en entités html
            $thetitle = htmlspecialchars(strip_tags(trim($_POST['thetitle'])),ENT_QUOTES);
        
            // protection contre les balises, sauf <p><a><br> et <img>
            $thetext = htmlspecialchars(strip_tags($_POST['thetext'],'<p><a><br><img>'),ENT_QUOTES);
        
            // récupération de la date et conversion en timestamp (secondes UNIX), envoie un int OU, en cas d'erreur, un FALSE (empty fonctionnera)
            $thedate = strtotime($_POST['thedate']);
        
            // récupération de l'id convertit en entier avec (int) (si attaque = 0)
            $idthepage = (int) $_POST['idthepage'];
        
            // récupération de l'id utilisateur convertit en entier avec (int) (si attaque = 0)
            $utilisateur_idutilisateur = (int) $_POST['utilisateur_idutilisateur'];
        
            // vérification que tous les champs sont valides (NOT empty)
            if( !empty($thetitle) &&
                !empty($thetext) &&
                !empty($thedate) &&
                !empty($idthepage) &&
                !empty($utilisateur_idutilisateur)
            ){
                // notre DB nous demande le temps en datetime
                $thedate = date("Y-m-d H:i:s",$thedate);
        
                // SQL de mise à jour de la table thepage
                $sql="UPDATE thepage 
                        SET thetitle='$thetitle', thetext='$thetext', thedate='$thedate',utilisateur_idutilisateur=$utilisateur_idutilisateur                  
                      WHERE idthepage = $idthepage ;      
        ";
                // exécution de la requête
                mysqli_query($db,$sql) or die("Erreur : ".mysqli_errno($db));
        
                // redirection vers le détail de l'article
                header("Location: ./?affiche=$idthepage");
        
                // arrêt du script
                exit();
        
        
            }else{
                echo "un champs est vide";
            }
        
        }
        
        // requête qui récupère la page grâce à son id avec auteur correspondant
        $sql = "SELECT p.idthepage, p.thetitle, p.thetext, p.thedate, p.utilisateur_idutilisateur,
        				u.thelogin, u.thename 
        FROM thepage p 
        	INNER JOIN utilisateur u 
            ON p.utilisateur_idutilisateur = u.idutilisateur 
        WHERE p.idthepage=$idpage";
        
        // on effectue la requête sql avec gestion d'erreur procédurale or die()
        $requete = mysqli_query($db,$sql) or die("Erreur: ".mysqli_errno($db));
        
        // on vérifie si on un résultat $nb == 1 ou $nb == 0
        $nb = mysqli_num_rows($requete);
        
        // on a un article
        if($nb===1) {
            // si oui on stocke la ligne dans $item
            $item =  mysqli_fetch_assoc($requete);
            // on récupère le titre
            $titre = "Modification : ".$item['thetitle'];
        }else{
            $titre = "Erreur 404";
        }
        /*
         * Chargement de la liste de tous les auteurs pour pouvoir en changer lors de l'update
         */
        $sql = "SELECT idutilisateur, thelogin, thename FROM utilisateur ORDER BY thelogin ASC;";
        $requestUtil = mysqli_query($db, $sql) or die(mysqli_errno($db));
        
        ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title><?=$titre?></title>
        </head>
        <body>
        <h1><?=$titre?></h1>
        <div id="menu">
            <a href="./">Accueil</a>
            <a href="./?insertion"><img src="img/record.png" alt="insérer" title="Insérer une nouvelle page"></a> <a href="./?insertion" title="Insérer une nouvelle page">Insertion d'une page</a>
        </div>
        <div id="content">
            <div id="pages">
                <?php
                // si on a pas de résultat
                if(empty($nb)){
                    echo "<h4>Cette page n'existe plus</h4>";
                // on a au moins une page
                }else {
                    ?>
                    <form action="" method="post" name="update">
                        <p>Titre : <br>
                            <input type="text" name="thetitle" placeholder="Titre" required maxlength="200" value="<?=$item['thetitle']?>" >
                        </p>
                        <p>Texte : <br>
                            <textarea name="thetext" placeholder="Votre texte ici" required><?=$item['thetext']?></textarea>
                        </p>
                        <p>Date : <br>
                            <input name="thedate" type="text" placeholder="0000-00-00 00:00:00" value="<?=$item['thedate']?>" required>
                        </p>
        
                        <input type="hidden" name="idthepage" value="<?=$item['idthepage']?>">
                        <!--
                        1) ce champs caché, qui contient l'id de l'auteur, doit devenir un select/option
                        pour pouvoir modifier l'auteur qui a écrit l'article
                        2) Le champs de l'auteur d'origine est sélectionné par défaut
                        -->
                        <select name="utilisateur_idutilisateur" required>
                            <?php
                            while($user = mysqli_fetch_assoc($requestUtil)){
                            /*
                            on doit comparer l'id de l'auteur qui se trouve dans la table thepage
                            utilisateur_idutilisateur (c'est la clef étrangère liée à idutilisateur
                            de la table utilisateur), avec l'id de l'auteur qui se trouve dans
                            utilisateur pour savoir quel utilisateur est sélectionné dans notre
                            DB
                            */
                            // version ternaire
                            $selectionnee =
                                ($user['idutilisateur']===$item['utilisateur_idutilisateur'])
                                ? "selected" : "";
                            /*
                             * version simple
                             */
                            if($user['idutilisateur']===$item['utilisateur_idutilisateur']){
                                $selectionnee = "selected";
                            }else{
                                $selectionnee = "";
                            }
                            ?>
                                <option value="<?=$user['idutilisateur']?>" <?=$selectionnee?>><?=$user['thelogin']?> | <?=$user['thename']?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <p><input type="submit" value="Envoyer"></p>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
        </body>
        </html>
                  