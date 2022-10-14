<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Regitro de Carreras desde PHP hacia MySQL</title>
	<link href="../css/alta_tabla1.css" rel="stylesheet" type="text/css" media="screen">

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


			//VALIDACIONES *****************************************************************
			//Caja de Texto ****************************************************************
			if (carrera == null || carrera.length == 0 || !/^([0-9])*$/.test(carrera)) {
				alert("Tienes que escribir el codigo del alumno usando solo números enteros");
				document.getElementById("txtcarrera").value = "";
				document.getElementById("txtcarrera").focus();
				document.getElementById("txtcarrera").style.background = "#bd373790";
				return false;
			} else if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
				alert("Escribe el nombre del alumno");
				document.getElementById("txtnombre").value = "";
				document.getElementById("txtnombre").focus();
				document.getElementById("txtnombre").style.background = "#bd373790";
				return false;
			} else if (coordi == null || coordi.length == 0 || /^\s+$/.test(coordi)) {
				alert("Escribe el Apeido del alumno");
				document.getElementById("txtcordi").value = "";
				document.getElementById("txtcordi").focus();
				document.getElementById("txtcordi").style.background = "#bd373790";
				return false;
			} else if (uni == null || uni.length == 0) {//Puede ser un combo box
				alert("Escribe el numero de celular del alumno");
				document.getElementById("combo_uni").value = "";
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
			<div id="texto1"><br>
				<p><?php echo $result; ?></p>

				<fieldset style="width: 90%; font-weight: bold;">
					<legend>REGISTRAR UNA NUEVA CARRERA</legend>
					<form action="grabar_datos.php" method="post" id="formulario1" onsubmit="return ValidaFormulario()">
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
							<option value="1">CUVALLES</option>
							<option value="2">CUCSUR</option>
							<option value="3">CUNORTE</option>
							<option value="4">CUCOSTA</option>
							<option value="5">CUTONALA</option>
							<option value="6">CUALTOS</option>
							<option value="7">CUAAD</option>
							<option value="8">UCBA</option>
							<option value="9">CUCS</option>
							<option value="10">CUCSH</option>
							<option value="10">CUCEI</option>
							<option value="10">CUCEA</option>

							</select>
							<br />
							<br />
							<input type="submit" name="AddCarrera" id="AddCarrera" value="  Registrar esta Carrera " />
							<br />
							<a href="../paginas/reporte_general_jonathand1.php" id="">Reporte General de Carreras</a>
							<br />
							<a href="../paginas/reporte_general_jonathand2.php" id="">Reporte General de Estudiantes</a>
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