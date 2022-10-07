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

	<style type="text/css" media="screen">
		body {
			background-color: #999;
		}

		#wrapper {
			margin: auto;
			width: 960px;
			height: 630px;
			background-color: #CCC;
		}

		#caja1 {
			font-weight: bold;
			text-align: center;
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #FFC;
			float: left;
		}

		#caja2 {
			font-weight: bold;
			text-align: center;
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #FFC;
			float: left;
		}

		#caja3 {
			font-weight: bold;
			text-align: center;
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
			height: 550PX;
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
			height: 500PX;
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
			right: 50px;
			border: 3px solid #5c5c5c;
			padding: 10px;
		}
	</style>

	<script language="javascript">
		function ValidaFormulario() {
			//Recuperamos lo elegido en el combo carrera
			var carrera = document.getElementById("combo_carrera").selectedIndex;
			//Recuperamos los numeros puestos en el cuadro de codigo
			var valorCodigo = document.getElementById("txtcodigo").value;
			//Recuperamos el nombre
			var valorNombre = document.getElementById("txtnombre").value;
		 	//Recuperamos el apeido
			var valorApeido = document.getElementById("txtapeido").value;
			//Recuperamos el numero de telefono escrito en la caja de texto
			var valorTelefono = document.getElementById("txtcel").value;
			//Recuperamos los datos de la fecha de nacimiento
			var valorFechaNac = document.getElementsByName("fecha_alumno").values;
			//Recuperamos lo elegido en el combo de los sexos
			var genero = document.getElementById("combo_genero").selectedIndex;
            //Recuperamos lo escrito en la caja de la categoría del empleado:
			var valorDireccion = document.getElementById("txtdireccion").value;
			var valorCorreo = document.getElementById("txtcorreo").value;
			//VALIDACIONES *****************************************************************
			//Caja de Texto ****************************************************************
			if (valorCodigo == null || valorCodigo.length == 0 || !/^([0-9])*$/.test(valorCodigo)) {
				alert("Debes escribir el codigo del alumno usando solo números enteros");
				document.getElementById("txtcodigo").value = "";
				document.getElementById("txtcodigo").focus();
				document.getElementById("txtcodigo").style.background="#FC4F2C"
				return false;
			} else if (valorNombre == null || valorNombre.length == 0 || /^\s+$/.test(valorNombre)) {
				alert("Tienes que escribir el nombre del alumno");
				document.getElementById("txtnombre").focus();
				document.getElementById("txtnombre").style.background = "#FC4F2C";
				return false;
			} else if (valorApeido == null || valorApeido.length == 0 || /^\s+$/.test(valorApeido)) {
				alert("Tienes que escribir el apeido del alumno");
				document.getElementById("txtapeido").focus();
				document.getElementById("txtapeido").style.background = "#FC4F2C";
				return false;
			} else if (valorTelefono == null || valorTelefono.length == 0 || /^\s+$/.test(valorTelefono)) {
				alert("Debes escribir el salario del empleado utilizando solamente números");
				document.getElementById("txtcel").value = "";
				document.getElementById("txtcel").focus();
				document.getElementById("txtcel").style.background = "#FC4F2C";
				return false;
			} else if (valorDireccion == null || valorDireccion.length == 0 || /^\s+$/.test(valorDireccion)) {
				alert("Debes escribir el salario del empleado utilizando solamente números");
				document.getElementById("txtcel").value = "";
				document.getElementById("txtcel").focus();
				document.getElementById("txtcel").style.background = "#FC4F2C";
				return false;
			} else if (valorCorreo == null || valorCorreo.length == 0 || /^\s+$/.test(valorCorreo)) {
				alert("Debes escribir el salario del empleado utilizando solamente números");
				document.getElementById("txtcel").value = "";
				document.getElementById("txtcel").focus();
				document.getElementById("txtcel").style.background = "#FC4F2C";
				return false;
			} else if (valorFechaNac == null || valorFechaNac.length == 0 || /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(0[1-9]|1[1-9]|2[1-9])$/.test(valorFechaNac)) {
				alert("Escribe la Fecha (Año/Mes/Dia)");
				document.getElementById("txtfechaNac").focus();
				return false;
				//Cajas de Selección (Combo Box) ****************************************************************
			} else if (genero == null || genero == 0) {
				alert("tienes que elegir un genero");
				document.getElementById("combo_genero").focus();
				return false;
			} else if (carrera == null || carrera == 0) {
				alert("Tienes que elegir una carrera");
				document.getElementById("combo_carrera").focus();
				return false;
			} //Cuando ya están contestadas todas las cajas de texto y seleccionados los combobox enviamos el form
			return true;
		}
		//
	</script>

</head>

<body>

	<div id="wrapper">

		<div id="caja1">Licenciatura en Tecnologías de la Información</div>
		<div id="caja2">Programación web</div>
		<div id="caja3">Formulario para alta de empleados en la base de datos desde una página web</div>

		<div id="caja4">
			<div id="texto1"><br>
				<p><?php echo $result; ?></p>

				<fieldset style="width: 90%; font-weight: bold;">
					<legend>REGISTRAR UN NUEVO ALUMNO</legend>



					<form action="grabar_datos.php" method="post" id="formulario1" onsubmit="return ValidaFormulario()">
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
							<input type="text" name="txtapeido" id="txtsalario" size="25">
							<br />
							<br />
							Telefono del alumno(con lada):
							<input type="text" name="txtcel" id="txtcel" size="16">
							<br />
							<br />
							Fecha de Nacimiento:
							<input type="date" name="fecha_alumno" id="fecha_alumno" >
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
							<input type="text" name="txtcategoria" id="txtcategoria" size="40">
							<br />
							<br />
							Correo del Alumno:
							<input type="text" name="txtcategoria" id="txtcategoria" size="40">
							<br />
							<br />
							<input type="submit" name="AddEmpleado" id="AddEmpleado" value="  Registrar este empleado " />
							<br />
							
						</div>
					</form>
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