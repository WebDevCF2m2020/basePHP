<?php
// vérification de l'envoi du formulaire avec tous les champs nécessaires dans un seul isset
// équivalennt dez multiples isset()&&isset()&&....
if(isset($_POST['lenom'],$_POST['lemail'],$_POST['lesujet'],$_POST['lemessage'])) {
    /*
     * Création de variables locales
     */
    $lenom = strip_tags(trim($_POST['lenom']));
    // filter_var avec FILTER_VALIDATE_EMAIL comme attribut va vérifier
    // si le mail est formaté correctement (pas de vérification de l'existence du mail)
    // on récupère le mail, sinon $lemail vaut false
    $lemail = filter_var(trim($_POST['lemail']), FILTER_VALIDATE_EMAIL);
    $lesujet = strip_tags(trim($_POST['lesujet']));
    $lemessage = strip_tags(trim($_POST['lemessage']));

    // si les valeurs sont acceptées (autre que vide, false etc...)
    if (!empty($lenom) && !empty($lemail) && !empty($lesujet) && !empty($lemessage)) {
        /*
         *  Préparation pour l'envoi
         */
        // votre mail de réception
        $monmail = "michaeljpitz@gmail.com";
        // mail qui appartient à votre site (plus sécurisé que immédiatement le mail de
        // l'utilisateur) - Pratique en cas d'entrée dans les spam, rajoutez ce mail dans vos
        // contact et tous les mails venant de votre formulaire n'irons jamais dans les spam
        $mailserveur = "robot@monsite.be";
        // titre du mail
        $titre = "Message venant de votre site";
        // message final
        $messageFinal = "Message envoyé par : \r\n\r\n";
        $messageFinal .= $lemail . "\r\n\r\n";
        $messageFinal .= "Titre: \r\n\r\n";
        $messageFinal .= $lesujet . "\r\n\r\n";
        $messageFinal .= $lemessage;

        /*
         * Envoi du mail
         */
        // création des entêtes
        $entetes = 'From: ' . $mailserveur . "\r\n" .
            'Reply-To: ' . $lemail . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        // envoi réel du mail
        $envoi = @mail($monmail, $titre, $messageFinal, $entetes);
        // mail envoyé
        if($envoi){
            // message de réussite de l'envoi
            $erreur = "<h2>Message bien envoyé</h2>";
            $erreur .= "<h3>Vous recevrez une réponse prochainement</h3>";
        }else{
            // problème de la fonction mail, erreur personnalisée
            $erreur = "Problème du serveur, veuillez recommencer plus tard";
        }

    // un champs est vide
    } else {
        // création d'une variable d'erreur en cas de champs non valides
        $erreur = "<h3>Veuillez remplir correctement les champs</h3>";
        $erreur .= "<h4>Retour au formulaire <a href='#' onclick='history.go(-1);'>ici</a></h4>";
    }
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
<?php
if(isset($erreur))echo $erreur;
else{
?>
<form action="" method="post" name="contact">
    <input name="lenom" placeholder="Votre nom" required><br>
    <input name="lemail" placeholder="Votre mail" required><br>
    <input name="lesujet" placeholder="Sujet" required><br>
    <textarea name="lemessage" placeholder="Votre message" required></textarea><br>
    <input type="submit" value="Envoi du mail">
<?php
}
?>
</form>
</body>
</html>