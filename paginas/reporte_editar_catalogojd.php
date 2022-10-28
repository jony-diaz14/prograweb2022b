<?php
//Insertamos el codigo PHP donde nos conectamos a la base de datos 
require_once "conn_mysql_jonathan.php";
// Escribimos la consulta para recuperar los registros de la tabla de MySQL
$sql = 'SELECT id_carrera, nombre_carrera FROM carrera';

// Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
$result = $conn->query($sql);

// Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
$rows = $result->fetchAll();

// Los valores que tendr� la variable $rows se organizan en un arreglo asociativo
// (Variable con varias valores)
// y se usar� un ciclo foreach para recuper los valores uno a uno de ese arreglo
// El resultado se mostrar� en una tabla HTML 
?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Regitro de registros a eliminar</title>

	<style type="text/css" media="screen">
		body {
			background-color: #999;
		}

		#wrapper {
			margin: auto;
			width: 960px;
			height: 570px;
			background-color: #CCC;
		}

		#caja1 {
			width: 300px;
			height: 60px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #FFC;
			float: left;
		}

		#caja2 {
			width: 300px;
			height: 60px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #FFC;
			float: left;
		}

		#caja3 {
			width: 300px;
			height: 60px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #FFC;
			float: left;
		}

		#caja4 {
			width: 940px;
			height: 480px;
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
			width: 900px;
			margin-left: 5px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #CCC;
			padding: 5px;
			float: right;
			right: -10px;
			top: 10px;
		}
	</style>

</head>

<body>

	<div id="wrapper">

		<div id="caja1">Licenciatura en Tecnolog&iacute;as de la Informaci&oacute;n</div>
		<div id="caja2">Programaci&oacute;n web</div>
		<div id="caja3">Reporte de registros de una tabla para ser ACTUALIZADOS en l&iacute;nea (PHP con PDP y MySQL)</div>

		<div id="caja4">
			<div id="texto1"><br>

				<table border="1" style="width:100%;">
					<thead>
						<tr>
							<th>Codigo de Carrera</th>
							<th>Nombre de la Carrera</th>
							<th>Eliminar</th>
							<th>Editar</th>
						</tr>
					</thead>
					<tbody>

						<?php
						foreach ($rows as $row) {
							//Imprimimos en la pagina un renglon de tabla HTML por cada registro de tabla de MySQL
						?>
							<tr>
								<!-- En estas celdas de HTML se muestran los valores recuperados de la consulta SELECT de SQL -->
								<!-- En esta parte mostraras tus propios campos de tu TABLA CATALOGO (todos los que conforman tu tabla) -->
								<td><?php echo $row['id_carrera']; ?></td>
								<td><?php echo $row['nombre_carrera']; ?></td>

								<!-- CELDA 1 para la ilga de BORRAR -->
								<td><a href="eliminar_carreras.php?id=<?php echo $row['id_carrera']; ?>">
										eliminar
									</a>
								</td>

								<!-- CELDA 2 para la ilga de EDITAR -->
								<!-- Esta es la LIGA o LINK para enviar el valor del campo llave al archivo 2 de la practica -->
								<td><a href="editar_registro_catalogo.php?id=<?php echo $row['id_carrera']; ?>">
										editar
									</a>
								</td>
							</tr>
							<!-- Aqui se cierra el ciclo foreach de PHP que se us� para mostrar en pantalla los valores de los campos de la consulta SQL tipo SELECT -->
						<?php } ?>
						<tr>
							<td colspan="4">&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><a href="alta_tabla2_jonathand.php">Agregar otra Carrera</a></td>
							<td>&nbsp;</td>
							<td colspan="4">&nbsp;</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php
	//Cerramos la oonexion a la base de datos **********************************************
	$conn = null;
	?>
</body>

</html>