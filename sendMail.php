<?php

$FileName = 'Mydiag_recapitulatif.pdf';
$FilePath = './completed';
$File = $FilePath.'/Mydiag_recapitulatif.pdf';
  
//Sending mail WITH PJ
sendMail($_POST["email"], $File, $FilePath, $FileName);

function sendMail($to,  $file='', $filepath='', $filename='')
{
    
    // $email='mydiag@groupetransitionenergie.fr';
    $email='andrianaivofredo@gmail.com';
    $subject = "Mydiag - Étude personnalisée de votre habitat ";
    
    $headers = "MIME-Version: 1.0" . "\r\n"; 
    $content = file_get_contents($file);
    $content = chunk_split(base64_encode($filepath));
    // a random hash will be necessary to send mixed content
    $separator = md5(time());
    // carriage return type (RFC)
    $eol = "\r\n";
        
    // $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n"; 
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;

    $headers .= 'To: '.$_POST["nom"].' '.$_POST["prenom"].'<'.$_POST["email"].'>' . "\r\n";
    $headers .= 'From: GPT | Mydiag <'.$email.'>' . "\r\n";
    $headers .= 'Cci:andrianaivofredo@gmail.com'."\r\n";
    $headers .= 'Bcc:'.$email."\r\n";
    $headers .= 'Reply-To:'. $email."\r\n";
    
    $message ='<html><head><title>Mydiag - Étude personnalisée de votre habitat</title></head><body>';
    $message .= "<h3>Bonjour Monsieur/Madame ".$_POST['nom']." ".$_POST['prenom']."</h3>";
    $message .= "<p>Suite à votre audit énergétique réalisé par le logiciel Mydiag voici en PJ votre récapitulatif PDF à télécharger.</p><br>";
    
    // attachment
    $message .= "--" . $separator . $eol;
    $message .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
    $message .= "Content-Transfer-Encoding: base64" . $eol;
    $message .= "Content-Disposition: attachment" . $eol;
    $message .= $content . $eol;
    $message .= "--" . $separator . "--";
    // whitout attachement
    // $message .= "<p>Merci de nous avoir fait confiance pour votre audit énergetique, vous recevrez votre compte rendu complet dans les plus brefs délais.</p><br>";
    
    $message .= "<br><br><br><p>GROUPE TRANSITION ENERGIE</p>";
    $message .="</body></html>";

    $result= mail($to,$subject, $message, $headers);
    return $result;
    die(' stop');
}
