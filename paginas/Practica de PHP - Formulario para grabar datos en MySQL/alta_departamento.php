<?php
// Insertamos el código PHP donde nos conectamos a la base de datos *******************************
require_once "conexion.php";
$result = "";

// Escribimos la consulta para recuperar los departamentos de la tabla departamentos **************
$sql = 'SELECT * FROM departamentos';
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
	<title>Regitro de empleados desde PHP hacia MySQL</title>

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

		#AddEmpleado {
			position: absolute;
			right: 50px;
			border: 3px solid #009;
			padding: 10px;
		}
	</style>

	<script language="javascript">
		function ValidaFormulario() {
			//Recuperamos lo elegido en el combo de los departamento
			// var departamento = document.getElementById("combo_departamento").selectedIndex;
			//Recuperamos lo escrito en la caja del número de empleado:
			// var valorNumero = document.getElementById("txtnumero").value;
			//Recuperamos lo escrito en la caja del nombre del empleado:
			var valorDepa = document.getElementById("txtdepartamento").value;
            var valorDes = document.getElementById("txtdescripcion").value;

			// Recuperamos lo escrito en la caja del salario del empleado:
			// var valorSalario = document.getElementById("txtsalario").value;
			// Recuperamos lo escrito en la caja de la categoría del empleado:
			// var valorCategoria = document.getElementById("txtcategoria").value;
			// Recuperamos lo elegido en el combo de los sexos
			// var sexo = document.getElementById("combo_sexo").selectedIndex;
			//VALIDACIONES *****************************************************************
			//Caja de Texto ****************************************************************
			if (valorDepa == null || valorDepa.length == 0 || /^\s+$/.test(valorDepa)) {
				alert("Debes escribir el nombre del departamento");
				document.getElementById("txtdepartamento").focus();
				document.getElementById("txtdepartamento").style.background = '#ff0';
				return false;
			}
            else if (valorDepa == null || valorDepa.length == 0 || /^\s+$/.test(valorDepa)) {
				alert("Debes escribir el nombre del departamento");
				document.getElementById("txtdescripcion").focus();
				document.getElementById("txtdescripcion").style.background = '#ff0000';
				return false;
            }//Cuando ya están contestadas todas las cajas de texto y seleccionados los combobox enviamos el form
			return true;
		}
		//
	</script>

</head>

<body>

	<div id="wrapper">

		<div id="caja1">Licenciatura en Tecnologías de la Información</div>
		<div id="caja2">Programación web</div>
		<div id="caja3">Formulario para alta de Departamentos en la base de datos desde una página web</div>

		<div id="caja4">
			<div id="texto1"><br>
				<p><?php echo $result; ?></p>

				<fieldset style="width: 90%; font-weight: bold;">
					<legend>REGISTRAR UN NUEVO DEPARTAMENTO</legend>



					<form action="grabar_departamento.php" method="post" id="formulario1" onsubmit="return ValidaFormulario()">
						<div>
							<br />
							Departamento:
							<input type="text" name="txtdepartamento" id="txtdepartamento" size="10">
							<br />
							<br />
							Descripcion:
							<input type="text" name="txtdescripcion" id="txtdescripcion" size="40">
							<br />
							<br />
							<input type="submit" name="AddDepartamento" id="AddDepartamento" value="  Registrar este departamento " />
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