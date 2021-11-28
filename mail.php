<?php

if(isset($_POST)){
    $to='andrianaivofredo@gmail.com';
    $subject='Sujet du mail';
    $message=formattedMessage($_POST);

    if(sendMail($to, $subject, $message)){
        echo '1';die(); 
    }else{
        echo '0';die(); 
    }
    
}

function formattedMessage($post)
{    
    $message="<h2>Les travaux concernent-ils un appartement ou une maison ? </h2?";
    $message .="<strong>{$post['travaux_concerner']}</strong>";

    $message .="<h2>Ou se situe le logement ou devrait se dérouler les travaux ? </h2?";
    $message .="<strong>{$post['address']}</strong>";

    $message .="<h2>Combien d'années à votre logement ? </h2?";
    $message .="<strong>{$post['annee_logement']}</strong>";

    $message .="<h2>Quelle est la surface (approximative) habitable de votre logement ? </h2?";
    $message .="<strong>{$post['surface']}</strong>";

    $message .="<h2>Quelle est votre mode de chauffage actuel ? </h2?";
    $mode_chauffage_type= isset($post['mode_chauffage']) && $post['mode_chauffage'] !='' ?  $post['mode_chauffage'] :  $post['mode_chauffage_d'];
    $message .="<strong>{$mode_chauffage_type}</strong>";

    $message .="<h2>Combien de personnes vivent dans le foyer ? </h2?";
    $message .="<strong>{$post['nomber_habitant']}</strong>";

    $message .="<h2>Quel est le revenu moyen du foyer ? </h2?";
    $message .="<strong>{$post['revenu_moyen_foyer']}</strong>";

    $message .="<h2>Quels travaux souhaitez-vous réaliser dans votre logement ? </h2?";
    $message .="<h3>Isolation / Ventilation </h3?";
    $isolation_ventilation=isset($post['isolation_ventilation']) ? $post['isolation_ventilation']: '';
    $message .="<strong>{$isolation_ventilation}</strong>";
    $message .="<h3>Chauffage Traditionnel </h3?";
    $chauffage_traditionnel=isset($post['chauffage_traditionnel']) ? $post['chauffage_traditionnel'] : '';
    $message .="<strong>{$chauffage_traditionnel}</strong>";
    $message .="<h3>Pompe à chaleur </h3?";
    $pompe_a_chaleur=isset($post['pompe_chaleur']) ? $post['pompe_chaleur']: '';
    $message .="<strong>{$pompe_a_chaleur}</strong>";
    $message .="<h3>Chauffe-eau </h3?";
    $chauffe_eau=isset($post['chauffe_eau']) ? $post['chauffe_eau']: '';
    $message .="<strong>{$chauffe_eau}</strong>";

    $message .="<h2>Ou en etes dans vos travaux ? </h2?";
    $situation_travaux_actu= isset($post['situation_travaux']) && $post['situation_travaux'] !='' ?  $post['situation_travaux'] :  $post['situation_travaux_d'];
    $message .="<strong>{$situation_travaux_actu}</strong>";

    $message .="<h2>Informations afin d'envoyer l'offre de subventions </h2?";
    $message .="<strong>{$post['name']}</strong>";
    $message .="<strong>{$post['email']}</strong>";
    $message .="<strong>{$post['numero_tel']}</strong>";
    return $message;

}

function sendMail($to, $subject, $message )
{
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // $headers .= 'To: Fredo Andrianaivo <contact@fredoandrianaivo.com>' . "\r\n";
    // $headers .= 'From: af-dev | Espace contact <contact@fredoandrianaivo.com>' . "\r\n";
    // $headers .= 'Reply-To: '. $email."\r\n";

    
    return mail($to,$subject, $message, $headers);
}
