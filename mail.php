<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once 'vendor/autoload.php';

$phpmailer = new PHPMailer(true);
try {
    $email='andrianaivofredo@gmail.com';
    $to=$_POST["email"];
    // $email='mydiag@groupetransitionenergie.fr';
    $subject = "Mydiag - Étude personnalisée de votre habitat ";

    // Set content-type header for sending HTML email 
    // $headers = "MIME-Version: 1.0" . "\r\n"; 
    // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
    
    // // Additional headers 
    // $headers .= 'From:  GPT | Mydiag <'.$email.'>' . "\r\n"; 
    // $headers .= 'Cc:'.$email. "\r\n"; 
    // $headers .= 'Cci: andrianaivofredo@gmail.com'. "\r\n"; 
    // $headers .= 'Bcc: contact@groupetransitionenergie.fr' . "\r\n"; 

    // // $headers .= 'To: '.$_POST["nom"].' '.$_POST["prenom"].'<contact@fredoandrianaivo.com>' . "\r\n";
    // // $headers .= 'From: GPT | Mydiag <'.$email.'.com>' . "\r\n";
    // // $headers .= "Cci:andrianaivofredo@gmail.com \r\n";

    // // $headers .= 'Reply-To: '. $email."\r\n";

    // $message .= "<h1>Mydiag - Étude personnalisée de votre habitat</h1>";
    $message = '<html><body>';
    $message .= "<h3>Bonjour ".$_POST['nom']." ".$_POST['prenom']."</h3>";

    $message .= "<p>Suite à votre audit énergétique réalisé par le logiciel Mydiag voici en PJ votre récapitulatif PDF à télécharger.</p><br>";
    $message .= "<br><br><p>GROUPE TRANSITION ENERGIE</p>";
    $message .= '</body></html>';

    // $result= mail($to,$subject, $message, $headers);
    // print_r(json_encode($result));
    // //Sending mail
    // die('stop');

    //Recuperation du fichier PDF
    // $pdfdoc		= $_POST['pdffile'];
    // $b64file 		= trim( str_replace( 'data:application/pdf;base64,', '', $pdfdoc ) );
    // $b64file		= str_replace( ' ', '+', $b64file );
    // $decoded_pdf	= base64_decode( $b64file );
    // file_put_contents( $attachment, $decodPdf );


    // $data = substr($_POST['pdffile'], strpos($_POST['pdffile'], ",") + 1);
    // decode it
    // $decodedData = base64_decode($data);
    // file_put_contents($attachment, $decodedData);
    //--------------------
    // $data = file_get_contents('php://input');
    $phpmailer->SMTPDebug = SMTP::DEBUG_SERVER;
    $phpmailer->isSMTP();
    $phpmailer->Host = "ssl://smtp.gmail.com";
    $mail->SMTPAuth = true;
    // $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    // $mail->SMTPSecure = "tls";
    // $mail->SMTPSecure = "ssl";
    // $phpmailer->Port = 465;
    $phpmailer->Username   = "andrianaivofredo@gmail.com";
    $phpmailer->Password   = "rafanomezantsoa";
    $phpmailer->SMTPSecure = 'ssl'; 
    $phpmailer->Port = 465;

    $phpmailer->setFrom($email, ' GPT | Mydiag'); //Name is optional
    $phpmailer->addAddress($to);
    $phpmailer->addAddress('andriniainafredo@gmail.com');

    $phpmailer->isHTML(true);  
    $phpmailer->Subject   = $subject;
    $phpmailer->Body      = $message;
    // $phpmailer->AddAddress($email);
    
    // $email->AddAttachment($decodedData , 'NameOfFile.pdf' );
    if(!$phpmailer->send()){
        echo 'Error '.$phpmailer->ErrorInfo;
    }else{
        echo 'Message sent';
    }
    var_dump($_POST); die();


} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$e->ErrorInfo}";
}