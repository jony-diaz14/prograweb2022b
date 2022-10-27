<?php
// Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conexion.php";

// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
$idEmpleado = $_GET["id"];
//Eliminamos los posibles espacios en blanco que tenga a ambos lados la variable $idDepartamento usando trim()
$idEmpleado = trim($idEmpleado);

// Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
// Debido a que el campo llave en este ejemplo es de tipo STRING la variable en SQL va encerrada entre ''
$sql = "SELECT * FROM empleados WHERE numero='$idEmpleado'";

// Ejecutamos la consulta SQL y asignamos el resultado a la variable llamada $result
$result = $conn->query($sql);

// Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
$rows = $result->fetchAll();

// El resultado se mostrará en la página, en el BODY del HTML **********************************************
if (empty($rows)) {
	$result = "No se encontraron departamentos con esa información !!";
	header("Location: ");
	exit;
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
			height: 350px;
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
			height: 260px;
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
			height: 230px;
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
			border: 3px solid #009;
			padding: 10px;
		}
	</style>

	<script language="javascript">
		function ValidaFormulario1() {
			var numero = document.getElementById("txtnumero").value;
			var nombre = document.getElementById("txtnombre").value;
			var numero = document.getElementById("txtsalario").value;
			var nombre = document.getElementById("txtcategoria").value;
			var numero = document.getElementById("txtsexo").value;
			var nombre = document.getElementById("txtdepartamento").value;
			//VALIDACIONES *****************************************************************
			//Caja de Texto ****************************************************************
			if (numero == null || numero.length == 0 || /^\s+$/.test(numero)) {
				alert("Debes escribir la CLAVE del departamento usando solo 1 letra y 1 número");
				document.getElementById("txtnumero").value = "";
				document.getElementById("txtnumero").style.background = 'lightgreen';
				document.getElementById("txtnumero").focus();
				return false;
			} else if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
				alert("Debes escribir el nombre del departamento");
				document.getElementById("txtnombre").style.background = 'lightgreen';
				document.getElementById("txtnombre").focus();
				return false;
			}
			return true;
		}
		//-->
	</script>

</head>

<body>

	<div id="wrapper">

		<div id="caja1">Licenciatura en Tecnologías de la Información</div>
		<div id="caja2">Programación web</div>
		<div id="caja3">Formulario para modificar empleados en la base de datos desde una página web</div>

		<div id="caja4">
			<div id="texto1"><br>
				<p></p>

				<fieldset style="width: 90%; font-weight: bold;">
					<legend>ACTUALIZAR UN EMPLEADO</legend>

					<!-- el atributo ACTION del Formulario apunta al archivo 3 de esta práctica: actualizar_departamento.php -->
					<form action="actualizar_empleado.php" method="post" id="formulario1" onsubmit="return ValidaFormulario1();">
						<?php
						foreach ($rows as $row) {
							//Imprimimos en la página EL UNICO REGISTRO de MySQL en un renglon de HTML
						?>
							<div>
								<br />
								<!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->
								Número de empleado:
								<input type="text" name="txtnombre" id="txtnombre" size="10" maxlength="2" disabled value="<?php echo $row['numero']; ?>" />

								<!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->
								<input type="hidden" name="txt_numero_oculto" id="txt_numero_oculto" size="10" maxlength="2" value="<?php echo $row['numero']; ?>" />

								<br />
								<br />
								<!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->
								Nombre del empleado:
								<input type="text" name="txtnombre" id="txt_departamento" size="40" maxlength="50" value="<?php echo $row['nombre']; ?>" />
								<br />
								<br />
								<input type="submit" name="AddEmpleado" id="AddEmpleado" value="  Actualizar este Empleado " />
								<br />
							</div>
						<?php } ?>
					</form>
				</fieldset>
			</div>
		</div>
	</div>
</body>

</html>