<?php error_reporting(E_ALL);

use Mailgun\Mailgun;


require 'vendor/autoload.php';
$name = $user;
$email = $email_restart;
$mail_encrypt=  base64_encode($email_restart);


/*JDB */
$api_key = 'key-eb656047b090ea091ef7c5d2fbd83dc5';
$api_domain = 'sandbox3bfa1334fbee4dcca5b08a9b34b46337.mailgun.org';
$send_to = $email;

////# Include the Autoloader (see "Libraries" for install instructions)
//    require '../vendor/autoload.php';
//    use Mailgun\Mailgun;

//# Instantiate the client.
    $mgClient = new Mailgun('key-eb656047b090ea091ef7c5d2fbd83dc5');
    $domain = "sandbox3bfa1334fbee4dcca5b08a9b34b46337.mailgun.org";

//
//# Make the call to the client.
    $result = $mgClient->sendMessage($domain, array(
        'from' => 'Administrador <postmaster@sandbox3bfa1334fbee4dcca5b08a9b34b46337.mailgun.org>',
        'to' => $send_to,
        'subject' => 'Recuperacion de contraseña',
        'text' => 
        
        'Hola ' . $user . ' 
       
            
        solicitaste recuperar tu password de administrador de la galeria, para poder renovar tu password haz click en el siguiente link:

        http://localhost/CasaBeltrami/new_pass.php?user='.$mail_encrypt .'
            
         

        Si no solicitaste recuperar tu password, simplemente ignora este email.'
    ));
    
    
    

?>