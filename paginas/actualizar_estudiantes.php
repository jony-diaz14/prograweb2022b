<?php
//ESTA PAGINA ES PARA GRABAR DATOS DE LA TABLA RELACIONADA-ESTUDIANTES
// Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conn_mysql_jonathan.php";
//
//Recuperamos los valores de las cajas de texto y de los demás objetos del formulario
$codigo = $_POST["txtnumeroOCULTO"];
$nombre = trim($_POST["txtnombre"]);
$apeido = trim($_POST["txtapeido"]);
$celular = $_POST["txtcel"];
$fechaNac = trim($_POST["txtfecha"]);
$genero = trim($_POST["combo_genero"]);
$direccion = trim($_POST["txtdireccion"]);
$correo = trim($_POST["txtcorreo"]);
$carrera = $_POST["combo_carrera"];

// Escribimos la consulta para ACTUALIZAR LOS DATOS EN LA TABLA de empleados
$sqlUPDATE  = "UPDATE estudiantes SET nombre_estudiante = '$nombre', apeido = '$apeido',
                telefono = $celular, fecha_nac = '$fechaNac', genero = '$genero', direccion = '$direccion',
                correo = '$correo', id_carrera = $carrera WHERE codigo = " . $codigo;
// Ejecutamos la sentencia UPDATE de SQL a partir de la conexión usando PDO
$conn->exec($sqlUPDATE);

// Escribimos la consulta para recuperar el nombre del Departamento del Empleado editado
// Y no mostrar en pantalla el ID de departamento que no es entendible para el usuario
$sql3 = "SELECT * FROM carrera WHERE id_carrera=".$carrera ;
// Almacenamos los resultados de la consulta en una variable llamada $smtp a partir de la conexión
$stmt2 = $conn->query($sql3);
// Recuperamos los valores de los registros de la tabla que ya están en la variable $stmt
$rows2 = $stmt2->fetchAll();
// Verificamos si está vacia la variable $smtp, si es positivo imprimimos en pantalla que no trae
if (empty($rows2)) {
	$result2 = "No se encontró ese Estudiante, revisa bien!!";
} else {
	foreach ($rows2 as $row2) {
		//Esta será la variable que se mostrará en pantalla con el Nombre Descriptivo del Departamento
		//En lugar de mostrar el ID de carrera que no es entendible para el usuario final
		$nombreCarrera = $row2['nombre_carrera'];
	}
}
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Regitro de estudiantes desde PHP hacia MySQL</title>
	<link href="../css/alta_tablae.css" rel="stylesheet" type="text/css" media="screen">
	<link rel="icon" href="/imagenes/registro1.png" type="image/x-icon">

</head>

<body>

	<div id="wrapper">

		<div id="caja1">Licenciatura en Tecnologías de la Información</div>
		<div id="caja2">Programación web</div>
		<div id="caja3">Formulario para alta de estudiantes en la base de datos desde una página web</div>

		<div id="caja4">
		<!-- <div id="texto2">
							<br />
							<a id="carrera" href="reporte_general_jonathand1.php" >REPORTE GENERAL DE CARRERAS</a>
							<br />
							<a id="estudiante" href="reporte_general_jonathand2.php" >REPORTE GENERAL DE ESTUDIANTES</a>
							<br />
							<a id="carrera" href="reporte_editar_catalogojd.php" >REPORTE EDITAR/BORRAR CARRERAS</a>
							<br />
							<a id="carrera" href="alta_tabla2_jonathand.php">REGISTRAR CARRERA</a>
							<br />
							<a id="estudiante" href="alta_tabla2_jonathand.php">REGISTRAR OTRO ESTUDIANTE</a>
							<br />
							<a id="carrera" href="reporte_editar_relacionadojd.php" >REPORTE EDITAR/BORRAR ESTUDIANTES</a>
							<a id="carrera" href="reporte_borrar_jonathand2.php">ELIMINAR ESTUDIANTE</a> </div>-->
			<div id="texto1"><br>
				<p></p>

				<fieldset style="width: 90%;">
					<legend>DATOS ACTUALIZADOS</legend>
					<div>
                        <br />
						<b>Codigo:</b> <?php echo ($codigo); ?>
						<br />
						<br />
						<b>Carrera:</b> <?php echo ($nombreCarrera); ?>
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
						<?php
						if ($genero == "M") {
							$genero2 = "Masculino";
						} else {
							$genero2 = "Femenino";
						}
						?>
						<b>Genero:</b> <?php echo ($genero2); ?>
						<br />
						<br />
						<b>Direccion del alumno:</b> <?php echo ($direccion); ?>
						<br />
						<br />
						<b>Correo del alumno:</b> <?php echo ($correo); ?>
						<br />
						<br />
                        <a href="alta_tabla2_jonathand.php">REGISTRAR OTRO ESTUDIANTE</a>
                        <br />
                        <br />
                        <a href="reporte_editar_relacionadojd.php">REPORTE DE ESTUDIANTES</a>
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