<?php

$destino = "matiasar1343@gmail.com";
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$mensaje = $_POST["mensaje"];


$contenido = "nombre: " . $nombre . "\ncorreo: " . $correo . "\nmensaje: " . $mensaje;


mail($destino, "contacto", $contenido);




?>