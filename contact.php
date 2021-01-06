<?php



$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];


$destinatario = "matiasar1343@gmail.com";
$asunto = "Contacto desde mi web";


$carta = "De: $nombre \n";
$carta .= "Correo: $correo \n";
$carta .= "Mensaje: $mensaje";


mail($destinatario, $asunto, $carta);
header('Location:mensaje-de-envio.html');



?>
