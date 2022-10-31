<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Regitro de Carreras desde PHP hacia MySQL</title>
	<link href="../css/alta_tablac.css" rel="stylesheet" type="text/css" media="screen">
	<link rel="icon" href="/imagenes/estudiante2.png" type="image/x-icon">

	<!-- <style type="text/css" media="screen">
		
	</style> -->

<script language="javascript">
		function ValidaFormulario() {
			//Recuperamos lo escrito en la caja del id de la universidad:
			var carrera = document.getElementById("txtcarrera").value;
			//Recuperamos lo escrito en la caja del nombre de la universidad:
			var nombre = document.getElementById("txtnombre").value;
			//Recuperamos lo escrito en la caja del salario del empleado:
			var coordi = document.getElementById("txtcordi").value;
			//Recuperamos lo escrito en la caja de la categoría del empleado:
			var uni = document.getElementById("combo_uni").selectedIndex;
			//

			//VALIDACIONES *****************************************************************
			//Caja de Texto ****************************************************************
			if (carrera == null || carrera.length == 0 || !/^([0-9])*$/.test(carrera)) {
				alert("Tienes que escribir el codigo del alumno usando solo números enteros");
				document.getElementById("txtcarrera").value = "";
				document.getElementById("txtcarrera").focus();
				document.getElementById("txtcarrera").style.background = "#bd373790";
				return false;
			} else if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
				alert("Escribe el nombre de la carrera");
				document.getElementById("txtnombre").value = "";
				document.getElementById("txtnombre").focus();
				document.getElementById("txtnombre").style.background = "#bd373790";
				return false;
			} else if (coordi == null || coordi.length == 0 || /^\s+$/.test(coordi)) {
				alert("Escribe el nombre del coordinador");
				document.getElementById("txtcordi").value = "";
				document.getElementById("txtcordi").focus();
				document.getElementById("txtcordi").style.background = "#bd373790";
				return false;
			} else if (uni == null || uni == 0) {//Puede ser un combo box
				alert("Escoge la universidad");
				document.getElementById("combo_uni").focus();
				document.getElementById("combo_uni").style.background = "#bd373790";
				return false;
			}
			//Cuando ya están contestadas todas las cajas de texto y seleccionados los combobox enviamos el form
			return true;
		}
		//
	</script>
</head>

<body>

	<div id="wrapper">

		<div id="caja1">Licenciatura en Tecnologías de la Información</div>
		<div id="caja2">Programación web</div>
		<div id="caja3">Formulario para grabar Carreras en la base de datos desde una página web</div>

		<div id="caja4">
		<div id="texto2">
							<a id="carrera" href="reporte_general_jonathand1.php" >REPORTE GENERAL DE CARRERAS</a>
							<br />
							<a id="estudiante" href="reporte_general_jonathand2.php">REPORTE GENERAL DE ESTUDIANTES</a>
							<br />
							<a id="estudiante" href="alta_tabla2_jonathand.php">REGISTRAR ESTUDIANTE</a>
							<br />
							<a id="carrera" href="reporte_borrar_jonathand2.php">ELIMINAR ESTUDIANTE</a>
		</div>
			<div id="texto1"><br>
				<fieldset style="width: 92%; height: 300px; font-weight: bold;">
					<legend>REGISTRAR UNA NUEVA CARRERA</legend>
					<form action="grabar_datos1.php" method="post" id="formulario1" onsubmit="return ValidaFormulario()">
						<div>
							<br />
							Codigo de la carrera:
							<input type="text" name="txtcarrera" id="txtcarrera" size="10">
							<br />
							<br />
							Nombre de la Carrera:
							<input type="text" name="txtnombre" id="txtnombre" size="35">
							<br />
							<br />
							Nombre del Coordinador:
							<input type="text" name="txtcordi" id="txtcordi" size="25">
							<br />
							<br />
							<label for="carrera">Nombre de la Universidad:</label>
							<select name="combo_uni" id="combo_uni">
							<option value="0">-- Selecciona una Universidad --</option>
							<option value="CUVALLES">CUVALLES</option>
							<option value="CUCSUR">CUCSUR</option>
							<option value="CUNORTE">CUNORTE</option>
							<option value="CUCOSTA">CUCOSTA</option>
							<option value="CUTONALA">CUTONALA</option>
							<option value="CUALTOS">CUALTOS</option>
							<option value="CUAAD">CUAAD</option>
							<option value="UCBA">UCBA</option>
							<option value="CUCS">CUCS</option>
							<option value="CUCSH">CUCSH</option>
							<option value="CUCEI">CUCEI</option>
							<option value="CUCEA">CUCEA</option>

							</select>
							<br />
							<br />
							<input type="submit" name="AddCarrera" id="AddCarrera" value="  Registrar esta Carrera " />
							<br />
						</div>
					</form>
					<!-- <button  onclick="location.href='../paginas/reporte_general_jonathand.php'">Reporte general</button> -->
				</fieldset>

			</div>
		</div>
	</div>
	<?php
	//Cerramos la oonexion a la base de datos **********************************************
	$conn = null;
	?>
</body>

</html>