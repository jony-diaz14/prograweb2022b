<?php
// Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conn_mysql_jonathan.php";

//Recuperamos los valores de las cajas de texto y de los demás objetos del formulario
$codigo = $_POST["txtcodigo"];
$codigo = (int)$codigo;
$nombre = $_POST["txtnombre"];
$apeido = $_POST["txtapeido"];
$celular = $_POST["txtcel"];
$fechaNac = $_POST["txtfecha"];
$genero = $_POST["combo_genero"];
$direccion = $_POST["txtdireccion"];
$correo = $_POST["txtcorreo"];
$carrera = $_POST["combo_carrera"];

$sql = "SELECT * FROM estudiantes WHERE codigo=" . $codigo;
$result = $conn->query($sql);
$rows = $result->fetchAll();
// Este IF es para detectar si esta VACIA la consulta del CODIGO de estudiante, si lo esta, manda los datos
if (empty($rows))
{
	// Escribimos la consulta para INSERTAR LOS DATOS EN LA TABLA de Estudiantes (PDO)
	// Podemos escribir la insercion de datos en una sola, o podemos concatenarla y asi armar dos $INSERT
	$INSERT1 = "INSERT INTO estudiantes(codigo, nombre_estudiante, apeido, telefono, fecha_nac, genero, direccion,correo, id_carrera) 
	VALUES ($codigo, '$nombre', '$apeido', '$celular', '$fechaNac', '$genero','$direccion','$correo',$carrera)";
	// Ejecutamos la sentencia INSERT de SQL a partir de la conexión usando PDO 
	// mediante la propiedad "EXEC" de la linea de conexión

	$conn->exec($INSERT1);
	$mensaje = "ALUMNO REGISTRADO SATISFACTORIAMENTE";
	$mensaje = "EMPLEADO REGISTRADO SATISFACTORIAMENTE";

	// Realizamos las operaciones necesarias para NO MOSTRAR el ID del departamento sino
	// su nombre descriptivo así como el texto descriptivo del SEXO en lugar de 1 letra
	$sql2 = "SELECT * FROM carrera WHERE id_carrera='" . $carrera . "'";
	$result2 = $conn->query($sql2);
	$rows2 = $result2->fetchAll();

	foreach ($rows2 as $row2) {
		$nombre_carrera = $row2['nombre_carrera'];
	}

	if ($genero == 'M') {
		$genero2 = "masculino";
	} else {
		$genero2 = "femenino";
	}

} else {

	// En caso de que si exista ya capturado ese empleado en la base de datos
	$mensaje = "Ese ID de empleado ya existe en la base de datos";

	$codigo = "El codigo ya esta registrado";
	$nombre = "Ese nombre ya existe";
	$apeido = "Alguien ya tiene ese apeido";
	$celular = "Ya esta";
	$fechaNac = "Otra vez esa";
	$genero2 = "terc@ con lo mismo";
	$direccion = "ya basta!";
	$correo = "la gente no entiende que ya esta este";
	$nombre_carrera = "Ya esta";

}
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Regitro de empleados desde PHP hacia MySQL</title>
	<link href="../css/alta_tabla1.css" rel="stylesheet" type="text/css" media="screen">

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
						<b>Carrera:</b> <?php echo ($nombre_carrera); ?>
						<br />
						<br />
						<b>Codigo:</b> <?php echo ($codigo); ?>
						<br />
						<br />
						<b>Nombre del alumno:</b> <?php echo ($nombre); ?>
						<br />
						<br />
						<b>Apeido del alumno:</b> <?php echo ($apeido); ?>
						<br />
						<br />
						<b>Numero de celular:</b> <?php echo ($celular); ?>
						<br />
						<br />
						<b>Fehca de nacimiento:</b> <?php echo ($fechaNac); ?>
						<br />
						<br />
						<b>Genero:</b> <?php echo ($genero2); ?>
						<br />
						<br />
						<b>Direccion del alumno:</b> <?php echo ($direccion); ?>
						<br />
						<br />
						<b>Correo del alumno:</b> <?php echo ($correo); ?>
						<br />
						<br />
						<a href="alta_tabla1_jonathand.php">REGISTRAR OTRO ESTUDIANTE</a>
						<br />
						<br />
						<a href="reporte_general_jonathand.php">REPORTE DE LOS ESTUDIANTES</a>
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