<?php
require_once '../class/personas.php';

$objPersona = Personas::singleton();

if ($_GET['operacion'] == 'registrar'){
	//Registramos los datos de la persona
	$objPersona->Registrar($_GET['apellidos'],$_GET['nombres'],$_GET['dni'],$_GET['direccion'],$_GET['telefono'],$_GET['email']);

	//Tomamos el último ID registrado (persona) y creamos los datos del docente
}
?>