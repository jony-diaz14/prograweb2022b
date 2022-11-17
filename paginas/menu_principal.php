<?php
//Inicializamos el uso de las sesiones 
session_start();
if ($_SESSION["validado"] != "true"){
    //Redireccionamos a la página de firma de usuarios (LOGIN)
	echo'<script type="text/javascript">
        alert("ERROR!! LOGUEATE");
        window.location.href="../index_jesus.php";
        </script>';
    // header("Location: ../index_jesus.php");
    exit;
}
if ($_SESSION["tipo_usuario"] == 2) {
    //Redireccionamos a la página de firma de usuarios (LOGIN)
	echo'<script type="text/javascript">
        alert("ERROR!! tipo de usuario no valido");
        window.location.href="../index_jesus.php";
        </script>';
    //header("Location: ../index_jesus.php");
    exit;
}
?>
<!doctype html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Menú de opciones de la aplicación web</title>
	<link rel="icon" href="/imagenes/inicio.png" type="image/x-icon">
	<link href="../css/menu.css" rel="stylesheet" type="text/css" media="screen">

	<style type="text/css" media="screen">
		/* body {
			background-color: #999;
		}

		#wrapper {
			margin: auto;
			width: 960px;
			height: 360px;
			background-color: #CCC;
		}

		#caja1 {
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #FFC;
			float: left;
		}

		#caja2 {
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #FFC;
			float: left;
		}

		#caja3 {
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #FFC;
			float: left;
		}

		#caja4 {
			width: 940px;
			height: 280px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 40px;
			background-color: #333;
			clear: both;
			/*
		 position:absolute; 
		 top:200px;
		 
			position: relative;
			top: 10px;
		}

		#imagen1 {
			position: relative;
			top: 10px;
			right: -10px;
		}

		#texto1 {
			width: 500px;
			height: 250px;
			margin-left: 5px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #CCC;
			padding: 5px;
			float: right;
			right: -10px;
			top: 10px;
		}

		#btn_aceptar {
			position: absolute;
			right: 50px;
			border: 3px solid #009;
			padding: 10px;
		} */
	</style>

</head>

<body>
	<div id="wrapper">
		<div id="caja1">Licenciatura en Tecnologías de la Información</div>
		<div id="caja2">Programación web</div>
		<div id="caja3">Menú de opciones de la aplicación web</div>
		<div id="caja4">
			<div id="texto1">
				<p>MENU DE OPCIONES<br>
				</p>
				<!-- <h3>Bienvenido <?php echo $rows['nombreU']; ?>!!</h3> -->
				<ul>
					<li><a href="reporte_general_jonathand1.php">Reporte General de Carreras</a></li>
					<li><a href="reporte_general_jonathand2.php">Reporte General de Estudiantes</a></li>
					<li><a href="reporte_editar_catalogojd.php">reporte Editar/Eliminar Carreras</a></li>
					<li><a href="reporte_editar_relacionadojd.php">Reporte Editar/Eliminar Estudiantes</a></li>
					<li><a href="alta_tabla1_jonathand.php">Agregar Carreras</a></li>
					<li><a href="alta_tabla2_jonathand.php">Agregar Estudiantes</a></li>
					<br><br>
					<li><a href="../index_jesus.php">CERRAR SESION</a></li>


				</ul>
				<p>&nbsp;</p>
			</div>
		</div>
	</div>
</body>

</html>