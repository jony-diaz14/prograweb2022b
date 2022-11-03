<?php
//ESTA PAGINA GRABA LOS DATOS DE LA TABLA CATALOGO-CARRERA
// Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conn_mysql_jonathan.php";
//
//Recuperamos los valores de las cajas de texto y de los demás objetos del formulario
$id = $_POST["txtcarrera"];
$id = (int)$id;
$nombre = $_POST["txtnombre"];
$coordi = $_POST["txtcordi"];
$uni = $_POST["combo_uni"];

$sql = "SELECT * FROM carrera WHERE id_carrera=" . $id;
$result = $conn->query($sql);
$rows = $result->fetchAll();
// Este IF es para detectar si esta VACIA la consulta del CODIGO de estudiante, si lo esta, manda los datos
if (empty($rows))
{
	// Escribimos la consulta para INSERTAR LOS DATOS EN LA TABLA de Estudiantes (PDO)
	// Podemos escribir la insercion de datos en una sola, o podemos concatenarla y asi armar dos $INSERT
	$INSERT1 = "INSERT INTO carrera(id_carrera, nombre_carrera, coordinador, nom_uni) 
	VALUES ($id, '$nombre', '$coordi', '$uni')";
	// Ejecutamos la sentencia INSERT de SQL a partir de la conexión usando PDO 
	// mediante la propiedad "EXEC" de la linea de conexión

	$conn->exec($INSERT1);
	$mensaje = "CARRERA REGISTRADA SATISFACTORIAMENTE";
	
	// Realizamos las operaciones necesarias para NO MOSTRAR el ID del departamento sino
	// su nombre descriptivo así como el texto descriptivo del SEXO en lugar de 1 letra
	// $sql2 = "SELECT * FROM carrera WHERE id_carrera='" . $carrera . "'";
	// $result2 = $conn->query($sql2);
	// $rows2 = $result2->fetchAll();

	// foreach ($rows2 as $row2) {
	// 	$nombre_carrera = $row2['nombre_carrera'];
	// }

	// if ($genero == 'M') {
	// 	$genero2 = "masculino";
	// } else {
	// 	$genero2 = "femenino";
	// }

} else {

	// En caso de que si exista ya capturado ese empleado en la base de datos
	$mensaje = "Ese ID de carrera ya existe en la base de datos";

}
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Regitro de Carrera desde PHP hacia MySQL</title>
	<link href="../css/alta_tablac.css" rel="stylesheet" type="text/css" media="screen">
	<link rel="icon" href="/imagenes/registro1.png" type="image/x-icon">

</head>

<body>

	<div id="wrapper">

		<div id="caja1">Licenciatura en Tecnologías de la Información</div>
		<div id="caja2">Programación web</div>
		<div id="caja3">Formulario para alta de carrera en la base de datos desde una página web</div>

		<div id="caja4">
		<div id="texto2"> <br />
							<a id="carrera" href="reporte_general_jonathand1.php" >REPORTE GENERAL DE CARRERAS</a>
							<br />
							<a id="estudiante" href="reporte_general_jonathand2.php" >REPORTE GENERAL ESTUDIANTES</a>
							<br />
							<a id="carrera" href="reporte_editar_catalogojd.php" >REPORTE EDITAR/BORRAR CARRERAS</a>
							<br />
							<a id="estudiante" href="alta_tabla2_jonathand.php">REGISTRAR ESTUDIANTE</a>
							<br />
							<a id="carrera" href="alta_tabla2_jonathand.php">REGISTRAR CARRERA</a>
							<br />
							<a id="carrera" href="reporte_borrar_jonathand2.php">ELIMINAR ESTUDIANTE</a>

		</div>
			<div id="texto1"><br>
				<p></p>

				<fieldset style="width: 90%;">
					<legend><?php echo $mensaje; ?></legend>
					<div>
						<br />
						<b>Codigo de la Carrera:</b> <?php echo ($id); ?>
						<br />
						<br />
						<b>Nombre de la carrera:</b> <?php echo ($nombre); ?>
						<br />
						<br />
						<b>Nombre del coordinador:</b> <?php echo ($coordi); ?>
						<br />
						<br />
						<b>Nombre de la universidad:</b> <?php echo ($uni); ?>
						<br />
						<br />
						
					</div>
				</fieldset>
			</div>
		</div>
	</div>
	<?php
	//Cerramos la conexion a la base de datos
	$conn = null;
	?>
</body>

</html>