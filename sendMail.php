<?php

//Sending mail
sendMail($_POST["email"]);

function sendMail($to)
{
    // $email='mydiag@groupetransitionenergie.fr';
    $email='andrianaivofredo@gmail.com';
    $subject = "Mydiag - Étude personnalisée de votre habitat ";
    
    $headers = "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n"; 

    $headers .= 'To: '.$_POST["nom"].' '.$_POST["prenom"].'<'.$_POST["email"].'>' . "\r\n";
    $headers .= 'From: GPT | Mydiag <'.$email.'>' . "\r\n";
    $headers .= 'Cci:andrianaivofredo@gmail.com'."\r\n";
    $headers .= 'Bcc:'.$email."\r\n";
    $headers .= 'Reply-To:'. $email."\r\n";

    $message ='<html><head><title>Mydiag - Étude personnalisée de votre habitat</title></head><body>';
    $message .= "<h3>Bonjour Monsieur/Madame ".$_POST['nom']." ".$_POST['prenom']."</h3>";

    $message .= "<p>Merci de nous avoir fait confiance pour votre audit énergetique, vous recevrez votre compte rendu complet dans les plus brefs délais.</p><br>";
    $message .= "<br><br><br><p>GROUPE TRANSITION ENERGIE</p>";
    $message .="</body></html>";

    $result= mail($to,$subject, $message, $headers);
    return $result;
    die(' stop');
}