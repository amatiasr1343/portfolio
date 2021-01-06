<?php


$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];



$body = "nombre: " . $nombre . "<br>correo: " . $correo . "<br>mensaje: " . $mensaje;




use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmail/Exception.php';
require 'phpmail/PHPMailer.php';
require 'phpmail/SMTP.php';




$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'miwebportfolio@gmail.com';                     // SMTP username
    $mail->Password   = 'qwerty1343';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('miwebportfolio@gmail.com', 'MI WEB');
    $mail->addAddress('matiasar1343@gmail.com');     // Add a recipient


    // Attachments


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensaje Web';
    $mail->Body    = $body;
 	$mail->Charset = 'UTF-8';

    $mail->send();
    echo '<script>
    			alert("Mensaje enviado muchas gracias");
    			windows.history.go(-1);
    			</script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



?>
