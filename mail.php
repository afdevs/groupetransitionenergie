<?php

function sendMail($to)
{
    $email='andrianaivofredo@gmail.com';
    // $email='mydiag@groupetransitionenergie.fr';
    $subject = "Mydiag - Étude personnalisée de votre habitat ";
    
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $headers .= 'To: '.$_POST["nom"].' '.$_POST["prenom"].'<contact@fredoandrianaivo.com>' . "\r\n";
    $headers .= 'From: GPT | Mydiag <'.$email.'.com>' . "\r\n";
    $headers .= "Cci:andrianaivofredo@gmail.com \r\n";

    $headers .= 'Reply-To: '. $email."\r\n";

    // $message .= "<h1>Mydiag - Étude personnalisée de votre habitat</h1>";
    $message = "<h3>Bonjour ".$_POST['nom']." ".$_POST['prenom']."</h3>";

    $message .= "<p>Suite à votre audit énergétique réalisé par le logiciel Mydiag voici en PJ votre récapitulatif <a href=".$_POST['pdf_url']." target='_link'>PDF à télécharger.</a> </p><br>";
    $message .= "<br><br><br><p>GROUPE TRANSITION ENERGIE</p>";
    $result= mail($to,$subject, $message, $headers);
    print_r(json_encode($result));
    die('stop');
}

//Sending mail
sendMail($_POST["email"]);