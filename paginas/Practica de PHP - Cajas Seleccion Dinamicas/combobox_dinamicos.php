<?php
// Insertamos el código PHP donde nos conectamos a la base de datos
require_once "conexion.php";

// Escribimos la consulta para recuperar los departamentos de la 
// tabla departamentos
$sql = 'SELECT departamento, descripcion FROM departamentos';
// Almacenamos los resultados de la consulta en una variable llamada 
// $smtp a partir de la conexión
$stmt = $conn->query($sql);
// Recuperamos los valores de los registros de la tabla que ya están 
// en la variable $stmt
$rows = $stmt->fetchAll();
// Verificamos si está vacia la variable $smtp, si es positivo imprimimos 
// en pantalla lo que trae de contenido
if (empty($rows)) {
	$result = "No se encontraron resultados !!";
}
?>
<!doctype html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Combobox Dinamicos con PHP y MySQL</title>

	<style type="text/css" media="screen">
		body {
			background-color: #999;
		}

		#wrapper {
			margin: auto;
			width: 960px;
			height: 500px;
			background-color: #CCC;
		}

		#caja1 {
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #69F;
			float: left;
		}

		#caja2 {
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #F60;
			float: left;
		}

		#caja3 {
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #C99;
			float: left;
		}

		#caja4 {
			width: 940px;
			height: 350px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 40px;
			background-color: #FF9;
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
			height: 290px;
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

		<div id="caja1">Licenciatura en Tecnologías de la Información</div>
		<div id="caja2">Programación web</div>
		<div id="caja3">Cajas de selección o combobox dinámicos</div>

		<div id="caja4">
			<div id="texto1"><br>
				<fieldset style="width:90%">
					<legend>Departamentos de la empresa</legend>
					<br />
					<form action="detalle_departamento.php" method="post" id="formulario1">
						<div>
							<p>
								<label for="departamento">Id del departamento:</label>

								<select name="departamento" id="departamento">

									<option value="0">Selecciona una departamento...</option>

									<?php
									foreach ($rows as $row) {
										echo '<option value="' .
											$row['departamento'] . '">' .
											$row['descripcion'] . '</option>';
									}
									?>
								</select>
							</p>
							<p>&nbsp;</p>
							<p>
								<input type="submit" name="buscarDpto" value="  Buscar datos del departamento " />
							</p>
						</div>
					</form>
				</fieldset>
			</div>
		</div>
	</div>
	<?php
	//Cerramos la oonexion a la base de datos ***************
	$conn = null;
	?>
</body>

</html>