<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Regitro de Televisoras desde PHP hacia MySQL</title>
	<style type="text/css" media="screen">
		body {
			background-color: #999;
		}

		#wrapper {
			margin: auto;
			width: 960px;
			height: 550px;
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
			height: 450px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 40px;
			background-color: #333;
			clear: both;
			/*
		position:absolute; 
		top:200px;
		 */
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
			height: 400px;
			margin-left: 5px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #CCC;
			padding: 5px;
			float: right;
			right: -10px;
			top: 10px;
		}

		#AddTelevisora {
			position: absolute;
			right: 50px;
			border: 3px solid #009;
			padding: 10px;
		}
	</style>
	<script language="javascript">
		function ValidaFormulario() {
			//Recuperamos lo elegido en el combo de los departamento
			var codigo_televisora = document.getElementById("txttelevisora").value;
			//Recuperamos lo escrito en la caja del número de empleado:
			var nombre_televisora = document.getElementById("txtnombre").value;
			//Recuperamos lo escrito en la caja del nombre del empleado:
			var sede = document.getElementById("txtsede").value;
			//Recuperamos lo escrito en la caja del salario del empleado:
			var fecha_estreno = document.getElementById("txtestreno").value;

			var tipo_televsiora = document.getElementById("txttipo").value;
			//Recuperamos lo escrito en la caja de la categoría del empleado:
			//VALIDACIONES ***********************
			//Caja de Texto **********************
			if (codigo_televisora == null || codigo_televisora == 0 ||  !/^([0-9])*$/.test(codigo_televisora)) {
				alert("Tienes que elegir el nombre de la televisora");
				document.getElementById("txttelevisora").value = "";
				document.getElementById("txttelevisora").focus();
				document.getElementById("txttelevisora").style.background = "#bfedbe20";
				return false;
			} else if (nombre_televisora == null || nombre_televisora.length == 0 || /^\s+$/.test(nombre_televisora)) {
				alert("Escribe la sede de la televisora");
				document.getElementById("txtnombre").value = "";
				document.getElementById("txtnombre").focus();
				document.getElementById("txtnombre").style.background = "#199C9920";
				return false;
			} else if (sede == null || sede.length == 0 || /^\s+$/.test(sede)) {
				alert("Escribe la fecha de estreno ");
				document.getElementById("txtsede").value = "";
				document.getElementById("txtsede").focus();
				document.getElementById("txtsede").style.background = "#199C9920";
				return false;
			} else if (fecha_estreno == null || fecha_estreno.length == 0 || /^\d{4}([\-/.])(0?[1-9]|1[1-2])([\-/.])1(3[01]|[12][0-9]|0?[1-9])$/.test(fecha_estreno)) {
				alert("Escribe el tipo de televisora");
				document.getElementById("txtestreno").value = "";
				document.getElementById("txtestreno").focus();
				document.getElementById("txtestreno").style.background = "#199C9920";
				return false;
			} //Cuando ya están contestadas todas las cajas de texto y seleccionados los combobox enviamos el form 
			else if (tipo_televsiora == null || tipo_televsiora.length == 0 || /^\s+$/.test(tipo_televsiora)) {
				alert("Escribe el tipo de televisora");
				document.getElementById("txttipo").value = "";
				document.getElementById("txttipo").focus();
				document.getElementById("txttipo").style.background = "#199C9920";
				return false;
			} //Cuando ya están contestadas todas las cajas de texto y seleccionados los combobox enviamos el form 
			return true;
		}
	</script>
</head>

<body>
	<div id="wrapper">
		<div id="caja1">Licenciatura en Tecnologías de la Información</div>
		<div id="caja2">Programación web</div>
		<div id="caja3">Formulario para grabar Televisoras en la base de datos desde una página web</div>
		<div id="caja4">
			<div id="texto1"><br>
				<fieldset style="width: 90%; font-weight: bold;">
					<legend>REGISTRAR UNA NUEVA TELEVISORA</legend>
					<form action="grabar_datos_televisora.php" method="post" id="formulario1" onsubmit="return ValidaFormulario()">
						<div>
							Codigo de la televisora:
							<input type="text" name="txttelevisora" id="txttelevisora" size="10">
							<br />
							<br />
							Nombre de la televisora:
							<input type="text" name="txtnombre" id="txtnombre" size="35">
							<br />
							<br />
							Sede:
							<input type="text" name="txtsede" id="txtsede" size="25">
							<br />
							<br />
							Fecha Estreno:
							<input type="date" name="txtestreno" id="txtestreno" size="16" >
							<br />
							<br />
							Tipo Televisora:
							<input type="text" name="txttipo" id="txttipo" size="16">
							<br />
							<br />
							<input type="submit" name="AddTelevisora" id="AddTelevisora" value="  Registrar esta Televisora " />
							<br />
							<a href="../paginas/reporte_general_jonathand.php" id="">Reporte General</a>
						</div>
					</form>
				</fieldset>
			</div>
		</div>
	</div>
	<?php
	//Cerramos la oonexion a la base de datos **************** 
	$conn = null;
	?>
</body>

</html>