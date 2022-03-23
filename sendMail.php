<?php
//Sending mail
// sendMail($_POST["email"]);

// function sendMail($to)
// {
//     // $email='mydiag@groupetransitionenergie.fr';
//     $email='andrianaivofredo@gmail.com';
//     $subject = "Mydiag - Étude personnalisée de votre habitat ";
    
//     $headers = "MIME-Version: 1.0" . "\r\n"; 
//     $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n"; 

//     $headers .= 'To: '.$_POST["nom"].' '.$_POST["prenom"].'<'.$_POST["email"].'>' . "\r\n";
//     $headers .= 'From: GPT | Mydiag <'.$email.'>' . "\r\n";
//     $headers .= 'Cci:andrianaivofredo@gmail.com'."\r\n";
//     $headers .= 'Bcc:'.$email."\r\n";
//     $headers .= 'Reply-To:'. $email."\r\n";

//     $message ='<html><head><title>Mydiag - Étude personnalisée de votre habitat</title></head><body>';
//     $message .= "<h3>Bonjour Monsieur/Madame ".$_POST['nom']." ".$_POST['prenom']."</h3>";

//     $message .= "<p>Merci de nous avoir fait confiance pour votre audit énergetique, vous recevrez votre compte rendu complet dans les plus brefs délais.</p><br>";
//     $message .= "<br><br><br><p>GROUPE TRANSITION ENERGIE</p>";
//     $message .="</body></html>";

//     $result= mail($to,$subject, $message, $headers);
//     return $result;
//     die(' stop');
// }

// WITH ATTACHEMENT
$FileName = 'Mydiag_recapitulatif.pdf';
$FilePath = './completed';
$File = $FilePath.'/Mydiag_recapitulatif.pdf';
  
// Recipient 
$to = $_POST['email'];
 
// Sender 
$from = 'andrianaivofredo@gmail.com'; 
$fromName = 'Mydiag | GROUPE TRANSITION ENERGIE';
 
// Email subject 
$subject = 'Mydiag - Étude personnalisée de votre habitat ';
 
// Attachment file 
$file = $File; 
 
// Email body content 
$htmlContent = '
    <h3>Bonjour Monsieur/Madame '.$_POST['nom'].' '.$_POST['prenom'].'</h3> 
    <p>Suite à votre audit énergétique réalisé par le logiciel Mydiag voici en PJ votre récapitulatif PDF à télécharger.</p> 
'; 
 
// Header for sender info 
$headers = "From: $fromName"." <".$from.">"; 
 
// Boundary  
$semi_rand = md5(time());  
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
 
// Headers for attachment  
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
 
// Multipart boundary  
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
 
// Preparing attachment 
if(!empty($file) > 0){ 
    if(is_file($file)){ 
        $message .= "--{$mime_boundary}\n"; 
        $fp =    @fopen($file,"rb"); 
        $data =  @fread($fp,filesize($file)); 
 
        @fclose($fp); 
        $data = chunk_split(base64_encode($data)); 
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
        "Content-Description: ".basename($file)."\n" . 
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
    } 
} 
$message .= "--{$mime_boundary}--"; 
$returnpath = "-f" . $from; 
 
// Send email 
$mail = @mail($to, $subject, $message, $headers, $returnpath);  
 
// Email sending status 
echo $mail?"<h1>Email Sent Successfully!</h1>":"<h1>Email sending failed.</h1>"; die();