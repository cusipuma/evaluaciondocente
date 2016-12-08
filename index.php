<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Acceso al sistema</title>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>

	<script>
	
		$(document).ready(function(){
			$("#login").click(function(){
				location.href = "main.php";
			});
		});
		
	</script>


	<style>
		.container{
			text-align: center;
		}
		img{
			height: 380px;
			width: 280px;
			display: block;
			margin: 0 auto;
		}
	</style>

	<div class="container">

	<h2>Sistema de evaluación docente</h2>
	<p>La evaluación consiste en dos etapas: Presentación de expediente y desarrollo de prueba</p>
		<img src="images/insignia.png" alt="">
		<br />
		<a href="#" class="btn btn-success" data-toggle="modal" data-target="#login-modal">Acceder al sistema</a>
	</div>


	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	  <div class="modal-dialog">
			<div class="loginmodal-container">
				<h1>Iniciar sesión en la plataforma</h1><br>
			  <form>
				<input type="text" name="user" placeholder="Usuario">
				<input type="password" name="pass" placeholder="Contraseña">
				<input type="button" id="login" name="login" class="btn btn-info btn-block" value="Acceder">
			  </form>
				
			  <div class="login-help">
				<a href="mailto:diego@gmail.com">Desarrollado y con soporte por DCQ</a>
			  </div>
			</div>
		</div>
	</div>
</body>
</html>