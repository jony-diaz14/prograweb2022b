<?php
//Recuperamos los valores de variables de página previa
//mediante variables SUPERGLOBALES de PHP
// Se recuperan con $_POST["  "]; o con $_GET["  "];

/*
$NumeroEmpleado = $_POST["txtnumero"];
$NombreEmpleado = $_POST["txtnombre"];
$SxoEmpleado = $_POST["combo_sexo"];


if ($NumeroEmpleado == "") {

	$NumeroEmpleado = "No trae nada la caja de texto";
}
if ($NombreEmpleado == "") {

	$NombreEmpleado = "No pusiste el nombre de tu Empleado";
}

*/
$CodigoEmpleado = $_GET["idempleado"];
if ($CodigoEmpleado == "") {
	$CodigoEmpleado = "No se hizo clic en la liga";
}
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Regitro de empleados desde PHP hacia MySQL</title>

	<style type="text/css" media="screen">
		body {
			background-color: #999;
		}

		#wrapper {
			margin: auto;
			width: 960px;
			height: 410px;
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
			height: 310px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 40px;
			background-color: #333;
			clear: both;

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
			height: 280px;
			margin-left: 5px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: rgba(180, 185, 245, 1.00);
			padding: 5px;
			float: right;
			right: -10px;
			top: 10px;
		}

		#AddEmpleado {
			position: absolute;
			right: 30px;
			border: 3px solid #009;
			padding: 10px;
			top: 245px;
		}
	</style>

</head>

<body>

	<div id="wrapper">

		<div id="caja1">Licenciatura en Tecnologías de la Información</div>
		<div id="caja2">Programación web</div>
		<div id="caja3">Formulario para la PRACTICA DE POST y GET</div>

		<div id="caja4">
			<div id="texto1"><br>

				<fieldset style="width: 95%; 
                  font-weight: bold; height:85%;">

					<legend>INFORMACION RECUPERADA CON POST&nbsp;Y CON GET
					</legend>
					<?php
					echo "Número de empleado: " . $CodigoEmpleado . "<br />";
					//echo "Nombre del empleado: ". $NombreEmpleado . "<br />";
					//echo "Sexo del Empleado: " . $SxoEmpleado . "<br />";

					?>
				</fieldset>
			</div>
		</div>
	</div>
</body>

</html>