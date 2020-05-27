<?php
/*
 * fonctions nécessaires au fonctionement du site
 */
// récupération des constantes de connexion
require_once "config.php";

function connectMysql()
{
    // connexion à la base de donnée
    $db = mysqli_connect(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME, DB_PORT);
    // communication se fera en utf8
    mysqli_set_charset($db, "utf8");
    // $db étant une variable locale à cette fonction, il faut renvoyer la valeur
    return $db;
}

