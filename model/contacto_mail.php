<?php
error_reporting(E_ALL);

require '../vendor/autoload.php';
use Mailgun\Mailgun;

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone_number'];
$type_event = $_POST['type_event'];
$date = $_POST['date_event'];
$services = $_POST['service'];
$persons = $_POST['persons'];
$asunto = 'Una persona necesita una cotización';
$detalles = $_POST['details'];

/* Desarrollo */
$api_key = 'key-eb656047b090ea091ef7c5d2fbd83dc5';
// $send_to = '';
$send_to = 'info@casabeltrami.com';

// if ($services == 'Renta de Salon Lincanto' || $services == 'Renta de Salon Farfala') {
//     $send_to = 'info@salonlincanto.com';
// } else if ($services == 'Renta de Salon Bambinos') {
//     $send_to = 'info@salonbambinos.com';
// } else {
//     $send_to = 'info@casabeltrami.com';
// }

////# Include the Autoloader (see "Libraries" for install instructions)
//    require '../vendor/autoload.php';
//    use Mailgun\Mailgun;

//# Instantiate the client.
    $mgClient = new Mailgun($api_key);
    $domain = "mg.casabeltrami.com";

//
//# Make the call to the client.
    $result = $mgClient->sendMessage($domain, array(
        'from' => 'Casa Beltrami - Notificaciones <postmaster@'. $domain .'>',
        'to' => $send_to,
        'subject' => $asunto,
        'text' =>

        'Hola equipo de Casa Beltrami.

        ' . $name . ' a solicitado una cotización

        Los datos del Cliente son los siguientes

        Nombre del cliente: ' . $name . '
        Correo electrónico: ' . $email. '
        Telefono: ' . $phone. '
        Tipo de evento: ' . $type_event. '
        Fecha del evento: ' . $date. '
        Servicio que solicita: ' . $services. '
        Número de personas: ' . $persons. '
        Detalles adicionales de la solicitud:
        '. $detalles .'',
        'html' =>
        '<html>Hola equipo de Casa Beltrami. <br>

        <b>' . $name . '</b> a solicitado una cotización

        Los datos del Cliente son los siguientes
        <ul>
        <li>Nombre del cliente: ' . $name . '</li>
        <li>Correo electrónico: ' . $email. '</li>
        <li>Telefono: ' . $phone. '</li>
        <li>Tipo de evento: ' . $type_event. '</li>
        <li>Fecha del evento: ' . $date. '</li>
        <li>Servicio que solicita: ' . $services. '</li>
        <li>Número de personas: ' . $persons. '</li>
        <li>Detalles adicionales de la solicitud: <p>'. $detalles .'</p> </li>
        </ul>
        <hr>
        </html>'
    ));
$message = '<div class="alert alert-success" role="alert">¡Tu mensaje ha sido enviado, pronto nos pondremos en contacto contigo!</div>';
echo $message;



?>
