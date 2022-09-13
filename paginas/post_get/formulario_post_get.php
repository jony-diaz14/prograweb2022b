<?php

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
			background-color: #CCC;
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

				<fieldset style="width: 95%; font-weight: bold; height:85%;">
					<legend>REGISTRAR UN NUEVO EMPLEADO</legend>

					<form action="procesa_informacion.php" method="post" id="formulario1">

						<div>
							<p><br />
								Número de empleado:
								<input type="text" name="txtnumero" id="txtnumero" size="10">
								<br />
								<br />
								Nombre de empleado:
								<input type="text" name="txtnombre" id="txtnombre" size="40">
								<br />
								<br />
								Sexo:
								<!-- Caja de Selección o ComboBox -->
								<select name="combo_sexo" id="combo_sexo">
									<option value="0">-- Selecciona un sexo --</option>
									<option value="M">Masculino</option>
									<option value="F">Femenino</option>
								</select>
							</p>
							<a href="procesa_informacion.php?idempleado=66">

								Este es un enlace con envio de un parametro

							</a>
							<br />
							<br />

							<input type="hidden" name="txtoculto1" id="txtoculto1" size="10" value="Abraham Vega" />

							<input type="submit" name="AddEmpleado" id="AddEmpleado" value="  Registrar este empleado " />
							<br />
						</div>
					</form>
				</fieldset>
			</div>
		</div>
	</div>
</body>

</html>