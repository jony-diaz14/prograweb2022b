<?php
// Insertamos el código PHP donde nos conectamos a la base de datos *******************************
require_once "conn_mysql_jonathan.php";
$result = "";
// Escribimos la consulta para recuperar los departamentos de la tabla departamentos **************
$sql = 'SELECT id_carrera,nombre_carrera FROM carrera';
// Almacenamos los resultados de la consulta en una variable llamada $smtp a partir de la conexión
$stmt = $conn->query($sql);
// Recuperamos los valores de los registros de la tabla que ya están en la variable $stmt
$rows = $stmt->fetchAll();
// Verificamos si está vacia la variable $smtp, si es positivo imprimimos en pantalla que no trae
if (empty($rows)) {
	$result = "No se encontraron resultados !!";
}
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Regitro de Estudiantes desde PHP hacia MySQL</title>
	<link href="../css/alta_tablae.css" rel="stylesheet" type="text/css" media="screen">

	<!-- <style type="text/css" media="screen">
		
	</style> -->

	<script language="javascript">
		function ValidaFormulario() {
			//Recuperamos lo elegido en el combo de los departamento
			var carrera = document.getElementById("combo_carrera").selectedIndex;
			//Recuperamos lo escrito en la caja del número de empleado:
			var codigo = document.getElementById("txtcodigo").value;
			//Recuperamos lo escrito en la caja del nombre del empleado:
			var nombre = document.getElementById("txtnombre").value;
			//Recuperamos lo escrito en la caja del salario del empleado:
			var apeido = document.getElementById("txtapeido").value;
			//Recuperamos lo escrito en la caja de la categoría del empleado:
			var celular = document.getElementById("txtcel").value;
			//Fecha de nacimiento
			var fecha = document.getElementById("txtfecha").value;
			//Recuperamos lo elegido en el combo de los sexos
			var genero = document.getElementById("combo_genero").selectedIndex;
			//Direccion 
			var direccion = document.getElementById("txtdireccion").value;
			//Correo
			var correo = document.getElementById("txtcorreo").value;

			//VALIDACIONES *****************************************************************
			//Caja de Texto ****************************************************************
			if (carrera == null || carrera == 0) {
				alert("Tienes que elegir la carrea");
				document.getElementById("combo_carrera").focus();
				document.getElementById("combo_carrera").style.background = "#bd373790";
				return false;
			} else if (codigo == null || codigo.length == 0 || !/^([0-9])*$/.test(codigo)) {
				alert("Tienes que escribir el codigo del alumno usando solo números enteros");
				document.getElementById("txtcodigo").value = "";
				document.getElementById("txtcodigo").focus();
				document.getElementById("txtcodigo").style.background = "#bd373790";
				return false;
			} else if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
				alert("Escribe el nombre del alumno");
				document.getElementById("txtnombre").value = "";
				document.getElementById("txtnombre").focus();
				document.getElementById("txtnombre").style.background = "#bd373790";
				return false;
			} else if (apeido == null || apeido.length == 0 || /^\s+$/.test(apeido)) {
				alert("Escribe el Apeido del alumno");
				document.getElementById("txtapeido").value = "";
				document.getElementById("txtapeido").focus();
				document.getElementById("txtapeido").style.background = "#bd373790";
				return false;
			} else if (celular == null || celular.length == 0 || !/^([0-9])*$/.test(celular)) {
				alert("Escribe el numero de celular del alumno");
				document.getElementById("txtcel").value = "";
				document.getElementById("txtcel").focus();
				document.getElementById("txtcel").style.background = "#bd373790";
				return false;
			} else if (fecha == null || fecha.length == 0 || /^\d{4}([\-/.])(0?[1-9]|1[1-2])([\-/.])1(3[01]|[12][0-9]|0?[1-9])$/.test(fecha)) {
				alert("Escribe la Fecha (Año/Mes/Dia)");
				document.getElementById("txtfecha").value = "";
				document.getElementById("txtfecha").focus();
				document.getElementById("txtfecha").style.background = "#bd373790";
				return false;
			} else if (genero == null || genero == 0) {
				alert("Elige un genero");
				document.getElementById("combo_genero").focus();
				document.getElementById("combo_genero").style.background = "#bd373790";
				return false;
			} else if (direccion == null || direccion.length == 0 || /^\s+$/.test(direccion)) {
				alert("Escribe la direccion");
				document.getElementById("txtdireccion").value = "";
				document.getElementById("txtdireccion").focus();
				document.getElementById("txtdireccion").style.background = "#bd373790";
				return false;
			} else if (!(/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/.test(correo)) || correo.length > 30) {
				alert("Ingresa bien el correo, ejemplo: example@gmail.com");
				document.getElementById("txtcorreo").value = "";
				document.getElementById("txtcorreo").focus();
				document.getElementById("txtcorreo").style.background = "#bd373790";
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
		<div id="caja3">Formulario para grabar estudiantes en la base de datos desde una página web</div>
		<div id="caja4">
		<div id="texto2"> <br />
							<a id="carrera" href="reporte_general_jonathand1.php" id="">Reporte General de Carreras</a>
							<br />
							<a id="estudiante" href="reporte_general_jonathand2.php" id="">Reporte General de Estudiantes</a>
							<br />
							<a id="estudiante" href="alta_tabla2_jonathand.php">REGISTRAR ESTUDIANTE</a>
							<br />
							<a id="carrera" href="alta_tabla2_jonathand.php">REGISTRAR CARRERA</a>
		</div>
			<div id="texto1"><br>
				<p><?php echo $result; ?></p>

				<fieldset style="width: 90%; font-weight: bold;">
					<legend>REGISTRAR UN NUEVO ALUMNO</legend>



					<form action="grabar_datos_relacionados.php" method="post" id="formulario1" onsubmit="return ValidaFormulario()">
						<div>
							<br />
							<label for="carrera">Carrera:</label>
							<select name="combo_carrera" id="combo_carrera">
								<option value="0">-- Selecciona una Carrera --</option>
								<?php
								foreach ($rows as $row) {
									echo '<option value="' . $row['id_carrera'] . '">' . $row['nombre_carrera'] . '</option>';
								}
								?>
							</select>
							<br />
							<br />
							Codigo del Alumno:
							<input type="text" name="txtcodigo" id="txtcodigo" size="10">
							<br />
							<br />
							Nombre del Alumno:
							<input type="text" name="txtnombre" id="txtnombre" size="35">
							<br />
							<br />
							Apeido del Alumno:
							<input type="text" name="txtapeido" id="txtapeido" size="25">
							<br />
							<br />
							Numero de Celular:
							<input type="text" name="txtcel" id="txtcel" size="16">
							<br />
							<br />
							Fecha de Nacimiento:
							<!-- <input type="date" name="fecha_alumno" id="fecha_alumno" > -->
							<input type="date" name="txtfecha" id="txtfecha" value="2000-01-01" />
							<br />
							<br />
							Genero:
							<!-- Caja de Selección o ComboBox -->
							<select name="combo_genero" id="combo_genero">
								<option value="0">-- Selecciona un sexo --</option>
								<option value="M">Masculino</option>
								<option value="F">Femenino</option>
							</select>
							<br />
							<br />
							Direccion del Alumno:
							<input type="text" name="txtdireccion" id="txtdireccion" size="40">
							<br />
							<br />
							Correo del Alumno:
							<input type="mail" name="txtcorreo" id="txtcorreo" size="40" placeholder="example@gmail.com">
							<br />
							<br />
							<input type="submit" name="AddEstudiante" id="AddEstudiante" value="  Registrar este Alumno " />
							
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