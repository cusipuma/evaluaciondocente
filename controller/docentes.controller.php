<?php
require_once "../class/docentes.class.php";
require_once "../class/personas.class.php";

//Instancia Singleton
$objDocente = Docentes::singleton();
$objPersona = Personas::singleton();

//Definiendo operación a realizar
if ($_GET['operacion'] == 'registrar'){
	//Registramos los datos de la persona
	$objPersona->Registrar($_GET['apellidos'],$_GET['nombres'],$_GET['dni'],$_GET['direccion'],$_GET['telefono'],$_GET['email']);

	//Tomamos el último ID registrado (persona) y creamos los datos del docente
	$objDocente->Registrar($_GET['idie'],$_GET['idespecialidad']);
}

?>