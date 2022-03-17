<?php

$extension = '.pdf';
$FileName = str_replace("'", "_",  ($_POST["nom"]!='' ? $_POST["nom"] : 'nom').'_'.($_POST["prenom"]!='' ? $_POST["prenom"] : 'prenom'));
$FileName .=$extension;
$FilePath = './completed';
$File = 'Mydiag_recapitulatif_'.$FilePath.'/'.$FileName;
  
if(isset($_FILES['pdffinal']['name']))
{
    $uploadResult = move_uploaded_file($_FILES['pdffinal']['tmp_name'],$File);
    if($uploadResult){
        //Sending mail WITH PJ
        sendMail($_POST["email"], true, $File, $FilePath, $FileName);
    }else{
        //Sending mail
        sendMail($_POST["email"]);
    }
}else{
    //Sending mail
    sendMail($_POST["email"]);
}

function sendMail($to, $withPJ=false, $file='', $filepath='', $filename='')
{
    
    // $email='mydiag@groupetransitionenergie.fr';
    $email='andrianaivofredo@gmail.com';
    $subject = "Mydiag - Étude personnalisée de votre habitat ";
    
    $headers = "MIME-Version: 1.0" . "\r\n"; 
    if($withPJ){
        $content = file_get_contents($file);
        $content = chunk_split(base64_encode($filepath));
        // a random hash will be necessary to send mixed content
        $separator = md5(time());
        // carriage return type (RFC)
        $eol = "\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
        $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
        $headers .= "This is a MIME encoded message." . $eol;
    }else{
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n"; 
    }

    $headers .= 'To: '.$_POST["nom"].' '.$_POST["prenom"].'<'.$_POST["email"].'>' . "\r\n";
    $headers .= 'From: GPT | Mydiag <'.$email.'>' . "\r\n";
    $headers .= 'Cci:andrianaivofredo@gmail.com'."\r\n";
    $headers .= 'Bcc:'.$email."\r\n";
    $headers .= 'Reply-To:'. $email."\r\n";
    
    $message ='<html><head><title>Mydiag - Étude personnalisée de votre habitat</title></head><body>';
    $message .= "<h3>Bonjour Monsieur/Madame ".$_POST['nom']." ".$_POST['prenom']."</h3>";
    if($withPJ){
        $message .= "<p>Suite à votre audit énergétique réalisé par le logiciel Mydiag voici en PJ votre récapitulatif PDF à télécharger.</p><br>";
        
        // attachment
        $message .= "--" . $separator . $eol;
        $message .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
        $message .= "Content-Transfer-Encoding: base64" . $eol;
        $message .= "Content-Disposition: attachment" . $eol;
        $message .= $content . $eol;
        $message .= "--" . $separator . "--";
    }else{
        $message .= "<p>Merci de nous avoir fait confiance pour votre audit énergetique, vous recevrez votre compte rendu complet dans les plus brefs délais.</p><br>";
    }
    $message .= "<br><br><br><p>GROUPE TRANSITION ENERGIE</p>";
    $message .="</body></html>";

    var_dump('Sending mail WITH PJ', $withPJ);
    var_dump('headers', $headers);

    $result= mail($to,$subject, $message, $headers);
    return $result;
    die(' stop');
}
