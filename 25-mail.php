<?php
// vérification de l'envoi du formulaire avec tous les champs nécessaires dans un seul isset
// équivalennt dez multiples isset()&&isset()&&....
if(isset($_POST['lenom'],$_POST['lemail'],$_POST['lesujet'],$_POST['lemessage'])){
    /*
     * Création de variables locales
     */
    $lenom = strip_tags(trim($_POST['lenom']));
    // filter_var avec FILTER_VALIDATE_EMAIL comme attribut va vérifier
    // si le mail est formaté correctement (pas de vérification de l'existence du mail)
    // on récupère le mail, sinon $lemail vaut false
    $lemail = filter_var(trim($_POST['lenom']),"FILTER_VALIDATE_EMAIL");
    $lesujet = strip_tags(trim($_POST['lesujet']));
    $lemessage = strip_tags(trim($_POST['lemessage']));
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mon formulaire de contact</title>
</head>
<body>
<h1>Mon formulaire de contact</h1>
<p>Merci de me laisser un message</p>
<form action="" method="post" name="contact">
    <input name="lenom" placeholder="Votre nom" required><br>
    <input name="lemail" placeholder="Votre mail" required><br>
    <input name="lesujet" placeholder="Sujet" required><br>
    <textarea name="lemessage" placeholder="Votre message" required></textarea><br>
    <input type="submit" value="Envoi du mail">

</form>
</body>
</html>