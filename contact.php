<?php
   error_reporting(0);
   
   $Nombre = $_POST['Nombre'];
   $Correo = $_POST['Correo'];
   $Mensaje = $_POST['Mensaje'];
   
   if ($Nombre=='' || $Correo=='' || $Mensaje==''){
   
      echo "<script>alert('Los campos marcados con * son obligatorios');location.href ='javascript:history.back()';</script>";
   
   }else{
   
       date_default_timezone_set('America/Argentina/Buenos_Aires');
       require("phpmail/phpmailer.php");
       include("phpmail/smtp.php");
       
      $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
      
      $mail->IsSMTP(); // telling the class to use SMTP
      $cuerpo="Nombre: ".$Nombre."<br />Email: ".$Correo."<br />Mensaje: ".$Mensaje."<br />";
      try {
         $mail->Host       = "mail.zerpens.com"; // SMTP server
         $mail->SMTPAuth   = true;                  // enable SMTP authentication
         $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
         $mail->Username   = "webportfolio@gmail.com"; // SMTP account username
         $mail->Password   = "qwerty1343";        // SMTP account password
         $mail->AddReplyTo($Correo, $Nombre);
         $mail->AddAddress('webportfolio@gmail.com', 'NOMBRE');
         $mail->SetFrom("matiasar1343@gmail.com", $Nombre);
         $mail->IsHTML(true);
         $mail->Subject = 'ASUNTO DEL MAIL';
         
         $mail->MsgHTML($cuerpo);
         $mail->AltBody = 'Nombre: '.$Nombre.' \n<br />'.
         'Email: '.$Correo.' \n<br />'.
         'Mensaje: '.$Mensaje.' \n<br />';
         $mail->Send();
         echo "<script>alert('Muchas gracias por contactarnos! Pronto recibirás una respuesta');location.href ='javascript:history.back()';</script>";
      } catch (phpmailerException $e) {
         echo $e->errorMessage(); //Pretty error messages from PHPMailer
      } catch (Exception $e) {
         echo $e->getMessage(); //Boring error messages from anything else!
      }
   }
   
?>