<?php
// Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conexion.php";

//Recuperamos los valores de las cajas de texto y de los demás objetos de formulario
$numero = $_POST["txtnumero"];
$numero = (int)$numero;
$nombre = strtoupper(trim($_POST["txtnombre"])); //Se convierte a MAYUSCULAS
$salario = $_POST["txtsalario"];
$categoria = trim($_POST["txtcategoria"]);
$sexo = $_POST["combo_sexo"];
$departamento = $_POST["combo_departamento"];

$sql = "SELECT * FROM empleados WHERE numero=" . $numero;
$result = $conn->query($sql);
$rows = $result->fetchAll();

if (empty($rows)) // Si detecta VACIO la consulta de busqueda del ID de empleado
{

	// Escribimos la consulta para INSERTAR LOS DATOS EN LA TABLA de empleados (PDO)
	// Concatenando 2 strings armamos la sentencia INSERT INTO ******************
	$sqlINSERT1 = "INSERT INTO empleados(numero, nombre, salario, categoria, sexo, departamento) ";
	$sqlINSERT2 = $sqlINSERT1 . "VALUES ($numero, '$nombre', $salario, '$categoria', '$sexo', '$departamento')";
	// Ejecutamos la sentencia INSERT de SQL a partir de la conexión usando PDO 
	// mediante la propiedad "EXEC" de la linea de conexión *******************

	$conn->exec($sqlINSERT2);
	$mensaje = "EMPLEADO REGISTRADO SATISFACTORIAMENTE";

	// Realizamos las operaciones necesarias para NO MOSTRAR el ID del departamento sino
	// su nombre descriptivo así como el texto descriptivo del SEXO en lugar de 1 letra
	$sql2 = "SELECT * FROM departamentos WHERE departamento='" . $departamento . "'";
	$result2 = $conn->query($sql2);
	$rows2 = $result2->fetchAll();

	foreach ($rows2 as $row2) {
		$nombre_departamento = $row2['descripcion'];
	}

	if ($sexo == 'M') {
		$sexo2 = "MASCULINO";
	} else {
		$sexo2 = "FEMENINO";
	}
	// **********************************************************************************
} else {

	// En caso de que si exista ya capturado ese empleado en la base de datos
	$mensaje = "Ese ID de empleado ya existe en la base de datos";

	$nombre = "";
	$salario = "";
	$categoria = "";
	$sexo2 = "";
	$nombre_departamento = "";
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

</head>

<body>

	<div id="wrapper">

		<div id="caja1">Licenciatura en Tecnologías de la Información</div>
		<div id="caja2">Programación web</div>
		<div id="caja3">Formulario para alta de empleados en la base de datos desde una página web</div>

		<div id="caja4">
			<div id="texto1"><br>
				<p></p>

				<fieldset style="width: 90%;">
					<legend><?php echo $mensaje; ?></legend>
					<div>
						<br />
						<b>Departamento:</b> <?php echo ($nombre_departamento); ?>
						<br />
						<br />
						<b>Número de empleado:</b> <?php echo ($numero); ?>
						<br />
						<br />
						<b>Nombre de empleado:</b> <?php echo ($nombre); ?>
						<br />
						<br />
						<b>Salario de empleado_:</b> <?php echo ($salario); ?>
						<br />
						<br />
						<b>Categoría de empleado:</b> <?php echo ($categoria); ?>
						<br />
						<br />
						<b>Sexo:</b> <?php echo ($sexo2); ?>
						<br />
						<br />
						<a href="alta_empleados2.php">REGISTRAR OTRO EMPLEADO</a>
					</div>
				</fieldset>
			</div>
		</div>
	</div>
	<?php
	//Cerramos la conexion a la base de datos *************************************
	$conn = null;
	?>
</body>

</html>