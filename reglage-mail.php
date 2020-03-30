<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Réglage du php.ini</h1>
<h2>Pour envoyer un mail depuis localhost</h2>
<p>Trouver dans php.ini de wamp et mettre les valeurs de votre fournisseur d'accès, par exemple chez moi: C:\wamp64-3-2-0\bin\apache\apache2.4.41\bin\php.ini</p>
<code><pre>
    [mail function]
    ; For Win32 only.
    ; http://php.net/smtp
    SMTP = smtp.telenet.be
    ; http://php.net/smtp-port
    smtp_port = 25

    ; For Win32 only.
    ; http://php.net/sendmail-from
    sendmail_from ="admin@cf2m.be"</pre>
</code>
<h2>Pour envoyer un mail depuis votre IDE ou depuis la console</h2>
<p>Trouver dans php.ini pour les ide et mettre les valeurs de votre fournisseur d'accès, par exemple chez moi: C:\wamp64-3-2-0\bin\php\php7.3.12\php.ini</p>
<?php
$to      = 'michaeljpitz@gmail.com';
$subject = 'le sujet';
$message = 'Bonjour !';
$headers = 'From: elpadre@vatican.va' . "\r\n" .
    'Reply-To: elpadre@vatican.va' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>
</body>
</html>
