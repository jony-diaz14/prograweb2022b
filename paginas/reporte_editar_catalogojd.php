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
// y se usara un ciclo foreach para recuper los valores uno a uno de ese arreglo
// El resultado se mostrara en una tabla HTML 
?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Regitro de registros a eliminar/editar</title>
	<link href="../css/editarc1.css" rel="stylesheet" type="text/css" media="screen">
	<link rel="icon" href="/imagenes/eliminar_r.png" type="image/x-icon">

	<!-- <style type="text/css" media="screen">
	</style> -->
	<script language="javascript">
        function eliminar_carrera(idcarrera) {
            if (confirm("¿Estás seguro de eliminar esta carrera con codigo: " + idcarrera + "?") == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</head>

<body>

	<div id="wrapper">

		<div id="caja1">Licenciatura en Tecnolog&iacute;as de la Informaci&oacute;n</div>
		<div id="caja2">Programaci&oacute;n web</div>
		<div id="caja3">Reporte de Registro para ser Actualizados desde una pagina Web</div>

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
								<td><a onClick="return eliminar_carrera(<?php echo $row['id_carrera']; ?>);" href="eliminar_carreras.php?id=<?php echo $row['id_carrera']; ?>">
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