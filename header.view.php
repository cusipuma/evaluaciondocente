<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Principal</title>
	<script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
</head>

<body>

<style>
    /* Se incrementa por la barra superior estática */
    body { padding-top: 50px; }
</style>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Desplegar navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a href="../main.php" class="navbar-brand">Sistema de evaluación</a>
    </div>

    <!-- Enlaces de navegación -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li><a href="docentes.view.php">Docentes</a></li>
            <li><a href="ie.view.php">Inst. Educativas</a></li>
            <li><a href="asignaciones.view.php">Asignar evaluación</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Evaluaciones <b class="caret"></b> </a>
                <ul class="dropdown-menu">
                    <li><a href="envioexpediente.view.php">Envío de expediente</a></li>
                    <li><a href="controlexamenes.view.php">Control de exámenes</a></li>
                    <li><a href="faq.view.php">Preguntas y respuestas</a></li>
                    <li class="divider"></li>
                    <li><a href="resultados.view.php">Resultados obtenidos</a></li>
                </ul>
            </li>
        </ul>

    <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Buscar">
        </div>
        <button type="submit" class="btn btn-default">Enviar</button>
    </form>

    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Control de usuario <b class="caret"></b></a>

            <ul class="dropdown-menu">
                <li><a href="../index.php">Cerrar sesión</a></li>
                <li><a href="#">Cambio de contraseña</a></li>
                <li class="divider"></li>
                <li><a href="#">Actualizar datos</a></li>
            </ul>
        </li>
    </ul>

    </div>
</nav>