<?php
// Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conexion.php";

//Recuperamos los valores de las cajas de texto y de los demás objetos del formulario
$id_programa = $_POST["txtprograma"];
$id_programa = (int)$id_programa;
$id_televisora = $_POST["combo_televisora"];
$nombre_programa = $_POST["txtnombre"];
$horario = $_POST["txthorario"];
$clasificacion = $_POST["txtclasificacion"];
$numero_canal = $_POST["txtcanal"];

$sql = "SELECT * FROM programa WHERE id_televisora=" . $id_televisora;
$result = $conn->query($sql);
$rows = $result->fetchAll();
// Este IF es para detectar si esta VACIO el campo del ID del programa, si lo esta, manda los datos
if (empty($rows))
{
	// Escribimos la consulta para INSERTAR LOS DATOS EN LA TABLA de Estudiantes (PDO)
	// Podemos escribir la insercion de datos en una sola, o podemos concatenarla y asi armar dos $INSERT
	$INSERT1 = "INSERT INTO programa(id_programa, id_televisora, nombre_progzrama, horario, clasificacion,num_canal) VALUES($id_programa, $id_televisora, '$nombre_programa', '$horario', '$clasificacion', $numero_canal)";
	//Ejecutamos la sentencia INSERT de SQL a partir de la conexión usando PDO 
	// mediante la propiedad "EXEC" de la linea de conexión

	$conn->exec($INSERT1);
	$mensaje = "PORGRAMA REGISTRADO SATISFACTORIAMENTE";
	
	// Realizamos las operaciones necesarias para NO MOSTRAR el ID del departamento sino
	// su nombre descriptivo así como el texto descriptivo del SEXO en lugar de 1 letra
	$sql2 = "SELECT * FROM televisora WHERE id_televisora='" . $id_televisora . "'";
	$result2 = $conn->query($sql2);
	$rows2 = $result2->fetchAll();

	foreach ($rows2 as $row2) {
		$nom = $row2['nombre_televisora'];
	}

} else {

	// En caso de que si exista ya capturado ese empleado en la base de datos
	$mensaje = "Ese ID de empleado ya existe en la base de datos";

}
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Regitro de programas desde PHP hacia MySQL</title>
	<style type="text/css" media="screen">
		body {
            background-color: #999;
        }

        #wrapper {
            margin: auto;
            width: 960px;
            height: 580px;
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
            height: 470px;
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
            height: 430px;
            margin-left: 5px;
            margin-right: 10px;
            margin-top: 10px;
            background-color: #CCC;
            padding: 5px;
            float: right;
            right: -10px;
            top: 10px;
        }

        #AddPrograma {
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
						<b>Departamento:</b> <?php echo ($id_programa); ?>
						<br />
						<br />
						<b>Nombre de la Televisora:</b> <?php echo ($id_televisora); ?>
						<br />
						<br />
						<b>Nombre del Programa:</b> <?php echo ($nombre_programa); ?>
						<br />
						<br />
						<b>Hoarario:</b> <?php echo ($horario); ?>
						<br />
						<br />
						<b>Tipo de clasificacion:</b> <?php echo ($clasificacion); ?>
						<br />
						<br />
						<b>Numero de Canal del programa:</b> <?php echo ($numero_canal); ?>
						<br />
						<br />
						<a href="alta_tabla1_daniela.php">REGISTRAR OTRO PROGRAMA</a>
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