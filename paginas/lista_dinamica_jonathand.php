<?php
// Insertamos el código PHP donde nos conectamos a la base de datos *******************************
require_once "conn_mysql_jonathan.php";
$result = "";
// Escribimos la consulta para recuperar los nombres de la universidad de la tabla de carrera 
$sql = 'SELECT * FROM carrera';
// Almacenamos los resultados de la consulta en una variable llamada $smtp
$stmt = $conn->query($sql);
// Recuperamos los valores de los registros de la tabla que ya están en la variable $stmt
$rows = $stmt->fetchAll();
// Verificamos si está vacia la variable $smtp, si es positivo imprimimos en pantalla que no trae nada
if (empty($rows)) {
	$result = "No se encontraron resultados !!";
}
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Combobox Enlazados con PHP AJAX y MySQL</title>
	<!-- Aqui mando a llamar el CSS para darle diseño a las cajas y las letras -->
	<link href="../css/lista_dinamica.css" rel="stylesheet" type="text/css" media="screen">

	<!--Esto es para codigo CSS el que le da el diseño pero lo puse en un archivo externo y en la parte de arriba lo mando a llamar
		<style type="text/css" media="screen">
		body{
			background-color: #1535eb;
		}
	</style> -->

	<script language="JavaScript" type="text/javascript">
		/* Se define la función que se usará para instanciar objetos XMLHttpRequest */
		function crear_objeto_XMLHttpRequest() {
			try {
				objeto = new XMLHttpRequest();
			} catch (err1) {
				try {
					objeto = new ActiveXObject("Msxml2.XMLHTTP");
				} catch (err2) {
					try {
						objeto = new ActiveXObject("Microsoft.XMLHTTP");
					} catch (err3) {
						objeto = false;
					}
				}
			}
			return objeto;
		}
		/* Aquí acaba la definición de la función que se usará para instaciar objetos XMLHttpRequest */
		var objeto_AJAX = crear_objeto_XMLHttpRequest();

		/* La siguiente función se ejecuta cuando es invocada por un cambio en el control de la lista de nombres de la universidad. */
		function pedirEstudiantes() {
			var URL = "obtener_estudiantes.php";
			objeto_AJAX.open("POST", URL, true);
			objeto_AJAX.onreadystatechange = muestraResultado;
			objeto_AJAX.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			objeto_AJAX.send("carrera_seleccionada=" + document.getElementById("ComboCarrera").value);
		}

		/* La siguiente función se ejecuta cuando se recibe una respuesta del servidor. */
		function muestraResultado() {
			if (objeto_AJAX.readyState == 4 && objeto_AJAX.status == 200) {
				document.getElementById("ComboEstudiante").innerHTML = objeto_AJAX.responseText;
			}
		}
	</script>

</head>

<body>

	<div id="wrapper">

		<div id="caja1">Licenciatura en Tecnologías de la Información</div>
		<div id="caja2">Programación web</div>
		<div id="caja3">Cajas de selección o combobox dinámicos</div>

		<div id="caja4">
			<div id="texto1"><br>
				<p><?php echo $result; ?></p>

				<fieldset style="width:90%">
					<legend>Nombres de la Carrera</legend>
					<br />
					<form action="detalle_carrera.php" method="post" id="formulario1">
						<div>
							<p>
								<label for="ComboCarrera">Id de la Carrera:</label>

								<select name="ComboCarrera" id="ComboCarrera" onChange="javascript:pedirEstudiantes();">

									<option value="0">-- Selecciona un nombre de carrera --</option>

									<?php
									foreach ($rows as $row) {
										echo '<option value="' .
											$row['id_carrera'] . '">' .
											$row['nombre_carrera'] . '</option>';
									}
									?>
								</select>
							</p>
							<p>

								<label for="ComboEstudiante">Estudiantes de la carrera seleccionada:</label>
								<select name="ComboEstudiante" id="ComboEstudiante">

								</select>
							</p>
							<p>

								<input type="submit" name="buscarCarrera" value="  Buscar datos de la Carrera " />
							</p>
						</div>
					</form>
				</fieldset>
    			</div>
		</div>
        <h3 align="center">Jonathan Diaz</h3>
	</div>
	<?php
	//Cerramos la oonexion a la base de datos **********************************************
	$conn = null;
	?>
</body>

</html>