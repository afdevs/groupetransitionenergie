<?php
    // $email='andrianaivofredo@gmail.com';
    $to=$_POST["email"];
    $email='mydiag@groupetransitionenergie.fr';
    $subject = "Mydiag - Étude personnalisée de votre habitat ";
    
   

    // Set content-type header for sending HTML email 
    $headers = "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
    
    // Additional headers 
    $headers .= 'From:  GPT | Mydiag <'.$email.'>' . "\r\n"; 
    $headers .= 'Cc:'.$email. "\r\n"; 
    $headers .= 'Cci: andrianaivofredo@gmail.com'. "\r\n"; 
    $headers .= 'Bcc: contact@groupetransitionenergie.fr' . "\r\n"; 

    // $headers .= 'To: '.$_POST["nom"].' '.$_POST["prenom"].'<contact@fredoandrianaivo.com>' . "\r\n";
    // $headers .= 'From: GPT | Mydiag <'.$email.'.com>' . "\r\n";
    // $headers .= "Cci:andrianaivofredo@gmail.com \r\n";

    // $headers .= 'Reply-To: '. $email."\r\n";

    // $message .= "<h1>Mydiag - Étude personnalisée de votre habitat</h1>";
    $message = '<html><body>';
    $message .= "<h3>Bonjour ".$_POST['nom']." ".$_POST['prenom']."</h3>";

    $message .= "<p>Suite à votre audit énergétique réalisé par le logiciel Mydiag voici en PJ votre récapitulatif <a href='".$_POST['pdf_url']."' target='_blank'>PDF à télécharger.</a> </p><br>";
    $message .= "<br><br><p>GROUPE TRANSITION ENERGIE</p>";
    $message .= '</body></html>';

    $result= mail($to,$subject, $message, $headers);
    print_r(json_encode($result));
//Sending mail
die('stop');