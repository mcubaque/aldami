<?php
require('../modelo/conexion.php');  


function enviarCorreo()
{
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$mensaje = $_POST['mensaje'];

	

	// Definir el correo de destino:
	$dest = "mcubaque@gmail.com"; 
	 
	// Estas son cabeceras que se usan para evitar que el correo llegue a SPAM:
	$headers = "From: $nombre $apellido <$email>\r\n";  
	$headers .= "X-Mailer: PHP5\n";
	$headers .= 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	 
	// Aqui definimos el asunto y armamos el cuerpo del mensaje
	$asunto = "Contacto tienda ALDAMI";
	$cuerpo = "Nombre: ".$nombre.' '.$apellido."<br>";
	$cuerpo .= "Email: ".$email."<br>";
	$cuerpo .= "Telefono: ".$telefono."<br>";
	$cuerpo .= "Mensaje: ".$mensaje;
	 
	// Esta es una pequena validación, que solo envie el correo si todas las variables tiene algo de contenido:
	if($nombre != '' && $apellido != '' && $email != '' && $telefono != '' && $mensaje != ''){
	    mail($dest,$asunto,$cuerpo,$headers); //ENVIAR!
	}
}
  enviarCorreo();

?>

 <script type="text/javascript">
 	alert("Mensaje enviado satisfactoriamente");
 	window.location.href = "../vista/tienda.php";
 </script>	