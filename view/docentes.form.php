<?php
require_once '../header.view.php';

//Incorporando clases
require_once '../class/institucioneducativa.class.php';
require_once '../class/especialidades.class.php';

//Instancia
$objIE = InstitucionEducativa::singleton();
$objEsp = Especialidades::singleton();

//Guardando datos de las IE
$dataIE = $objIE->ListarIE();
$dataEsp = $objEsp->ListarEspecialidades();

//Debemos verificar si el formulario se visualiza por una entrada de MODIFICAR
$apellidos = "";
$nombres = "";
$dni = "";
$direccion = "";
$telefono = "";
$email = "";
$idie = "";
$idespecialidad = "";

if (isset($_GET['modificar'])){

	require_once '../class/docentes.class.php';
	$objDocente = Docentes::singleton();
	$dataDocente = $objDocente->ObtenerDatos($_GET['iddocente']);

	$apellidos = $dataDocente['apellidos'];
	$nombres = $dataDocente['nombres'];
	$dni = $dataDocente['dni'];
	$direccion = $dataDocente['direccion'];
	$telefono = $dataDocente['telefono'];
	$email = $dataDocente['email'];
	$idie = $dataDocente['idie'];
	$idespecialidad = $dataDocente['idespecialidad'];
}
?>

<link rel="stylesheet" href="../css/estilos.form.css">
<link rel="stylesheet" href="../css/sweetalert.css">
<script src="../js/sweetalert.min.js"></script>

<script>
	$(document).ready(function(){


		$("#btnGuardar").click(function(){

		var ape, nom, dni, dir, tel, ema, ie, esp;
		
		ape = document.getElementById("txtApe").value;
		nom = document.getElementById("txtNom").value;
		dni = document.getElementById("txtDNI").value;
		dir = document.getElementById("txtDir").value;
		tel = document.getElementById("txtTel").value;
		ema = document.getElementById("txtEma").value;
		ie = document.getElementById("cboIE").value;
		esp = document.getElementById("cboEsp").value;

			if (ape == "" || nom == "" || dni == "" || ie == "0" || esp == "0"){
				$("#txtApe").focus();
				swal("Debe completar el formulario para continuar","Sistema de evaluación docente","error");
			}else{
				swal({
					title: "¿Está seguro de guardar los datos?",
					text: "Sistema de evaluación docente",
					type: "warning",
					showCancelButton: true,
					confirmButtonText: "Estoy seguro",
					cancelButtonText: "Cancelar",
					closeOnConfirm: true
					},
				function(){
					//Cargando el array con datos a procesar
					var datos = {
						'operacion':'registrar',
						'apellidos':ape,
						'nombres':nom,
						'dni':dni,
						'direccion':dir,
						'telefono':tel,
						'email':ema,
						'idie':ie,
						'idespecialidad':esp
					};

					//alert("IE: " + datos['idie'] + " - Especialidad: " + datos['idespecialidad']);

					//Enviando los datos por AJAX
					$.ajax({
						url:'../controller/docentes.controller.php',
						type:'text',
						method:'get',
						data:datos,
						success:function(){
							location.href = 'docentes.view.php';
						}
					});
				});
			}			
		});
	});
</script>


<div class="contenedor">

<h2>Registro de docentes</h2>
<p>Complete la información solicitada</p>
<hr>

<form action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="txtApe" class="col-lg-3 control-label">Apellidos:</label>
		<div class="col-lg-9">
			<input type="text" placeholder="" id="txtApe" class="form-control" maxlength="30" autofocus="" value="<?=$apellidos?>">
		</div>
	</div>

	<div class="form-group">
		<label for="txtNom" class="col-lg-3 control-label">Nombres:</label>
		<div class="col-lg-9">
			<input type="text" placeholder="" id="txtNom" class="form-control" maxlength="30" value="<?=$nombres?>">
		</div>
	</div>

	<div class="form-group">
		<label for="txtDNI" class="col-lg-3 control-label">DNI:</label>
		<div class="col-lg-9">
			<input type="text" id="txtDNI" class="form-control" maxlength="8" value="<?=$dni?>">
		</div>
	</div>

	<div class="form-group">
		<label for="txtDir" class="col-lg-3 control-label">Dirección:</label>
		<div class="col-lg-9">
			<input type="text" id="txtDir" class="form-control" maxlength="70" value="<?=$direccion?>">
		</div>
	</div>

	<div class="form-group">
		<label for="txtTel" class="col-lg-3 control-label">Teléfono:</label>
		<div class="col-lg-9">
			<input type="text" id="txtTel" class="form-control" maxlength="10" value="<?=$telefono?>">
		</div>
	</div>

	<div class="form-group">
		<label for="txtEma" class="col-lg-3 control-label">Correo electrónico</label>
		<div class="col-lg-9">
			<input type="email" id="txtEma" class="form-control" value="<?=$email?>">
		</div>
	</div>

	<ol class="breadcrumb alert-default">Información específica del profesional</ol>

	<div class="form-group">
		<label for="cboIE" class="col-lg-3 control-label">Institución educativa donde labora:</label>
		<div class="col-lg-9">
			<select name="cboIE" id="cboIE" class="form-control">
				<option value="0">Seleccione</option>

				<?php
				$parametro = "";

					foreach($dataIE as $filaIE){
						if ($idie == $filaIE['idie']){	$parametro = " selected"; } else { $parametro = ""; }
						echo '<option value="' . $filaIE['idie'] . '" ' . $parametro . ' >' . $filaIE['nombreie'] . '</option>';
					}
				?>

			</select>
		</div>
	</div>

	<div class="form-group">
		<label for="cboEsp" class="col-lg-3 control-label">Especialidad del docente:</label>
		<div class="col-lg-9">
			<select name="cboEsp" id="cboEsp" class="form-control">
				<option value="0">Seleccione</option>



				<?php
				$parametro = "";

					foreach($dataEsp as $filaES){
						if ($idespecialidad == $filaES['idespecialidad']){	$parametro = " selected"; } else { $parametro = ""; }
						echo '<option value="' . $filaES['idespecialidad'] . '" ' . $parametro . ' >' . $filaES['nombreespecialidad'] . '</option>';
					}
				?>

			</select>
		</div>
	</div>

	<span style="text-align: right;display: block;">
		<button type="button" id="btnGuardar" class="btn btn-default">Guardar datos del docente</button>
		<a href="docentes.view.php" class="btn btn-default">Cancelar este proceso</a>
	</span>
</form>

</div>

<?php
require_once '../footer.view.php';
?>