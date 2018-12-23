<?php

$destino = "sarusky.saez@gmail.com";

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
$mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : "";

//$contenido = "Enviado por: " . $nombre . "\nEmail: " . $correo . "\nTeléfono: " . $telefono . "\nMensaje: " . $mensaje;
$contenido = "Enviado por: " . $nombre . "\nEmail: " . $email . "\nTelefono: " . $telefono . "\nMensaje: " . $mensaje;

if(mail($destino, "Contacto", $contenido)) {

	$resultado = "./mensaje/gracias.html";
	
	$resp_header = "sarusky.saez@gmail.com\n" . "Reply-To: sarusky.saez@gmail.com\n";
	$resp_subject = "Mensaje recibido";
	$resp_email_to = "$correo";
	$resp_message = "Muchas Gracias $nombre, por su mensaje: $mensaje\n"
	. "Su mensaje ha sido recibido satisfactoriamente. \n"
	. "Me pondré en contanto con usted lo antes posible en su e-mail: $correo \n"
	. " \n"
	. " \n"
	. "--------------------------------------------------------------------------\n"
	. "Por favor, no responda a este correo ya que es generado automaticamente.\n"
	. "Antonio Culebras.\n"
	. "www.antonioculebras.com";
	@mail($resp_email_to, $resp_subject ,$resp_message ,$resp_header ) ;
} else {
	$resultado = "./mensaje/error.html";
}

header("Location: $resultado");
$ip = $_SERVER['REMOTE_ADDR'];

?>