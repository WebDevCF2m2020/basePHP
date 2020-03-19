<?php
/*
 *
 * Front Controller
 *
 */

/*
 * Chargement des dépendances
 */
require_once "config.php";

/*
 * Connexion procédurale à notre DB
 */
$db = @mysqli_connect(DB_HOST,DB_LOGIN, DB_PWD, DB_NAME,DB_PORT);

/*
 * Gestion d'erreur en mysqli procédural
 */
if(!$db){
    echo "Erreur n° ".mysqli_connect_errno()." Description : ".mysqli_connect_error();
}