<?php
//Cabecera de la WEB
require_once '../header.view.php';

//Incorporando la clase que vamos a necesitar en este módulo
require_once '../class/docentes.class.php';

//Instancia
$objDocente = Docentes::singleton();

//Almacenamos los datos en un contenedor temporal
$data = $objDocente->ListarDocentes();

?>

<div class="container">

	<h1>Administrador de datos del docente</h1>
	<p>Personal que será evaluado</p>
	<br />

	<table class="table">
		<tr>
			<th>N°</th>
			<th>Apellidos</th>
			<th>Nombres</th>
			<th>DNI</th>
			<th>I.E.</th>
			<th colspan="3" width="20">Procesos</th>
		</tr>

		<?php
		$i = 1;
		foreach($data as $fila):
		?>

		<tr>
			<td><?=$i?></td>
			<td><?=$fila['apellidos']?></td>
			<td><?=$fila['nombres']?></td>
			<td><?=$fila['dni']?></td>
			<td><?=$fila['nombreie']?></td>
			<td><a href="docentes.form.php?modificar&iddocente=<?=$fila['iddocente']?>"><img src="../images/editar.png" alt="Editar"></a></td>
			<td><a href="#"><img src="../images/verificar.png" alt="Anexar expediente"></a></td>
			<td><a href="#"><img src="../images/evaluar.png" alt="Programar evaluación"></a></td>
		</tr>

		<?php
		$i++;
		endforeach;
		?>
		
	</table>

	<a class="btn btn-default" href="docentes.form.php">Registrar nuevo docente</a>
	<button type="button" name="" id="" class="btn btn-default">Exportar datos del docente</button>
	<hr />
	<p>
		<strong>LEYENDA:</strong> 
			<img src="../images/editar.png" alt="Editar"> Editar |
			<img src="../images/verificar.png" alt=""> Anexar Expediente |
			<img src="../images/evaluar.png" alt=""> Programar evaluación
	</p>

</div>

<?php
require_once '../footer.view.php';
?>