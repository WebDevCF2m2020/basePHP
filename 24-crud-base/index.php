<?php
/*
 *
 * Contrôleur frontal
 *
 */

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