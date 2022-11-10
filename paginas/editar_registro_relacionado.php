<?php
// Insertamos el código que nos hace conectarnos a la BD
require_once "conn_mysql_jonathan.php";
$result = "";
$result2 = "";

// Escribimos la consulta para recuperar los departamentos de la tabla departamentos
$sqlDptos = 'SELECT id_carrera,nombre_carrera FROM carrera';
$stmt2 = $conn->query($sqlDptos);
$rows2 = $stmt2->fetchAll();
if (empty($rows2)) {
	$result2 = "No se encontraron estudiantes !!";
}
// Recuperamos los valores de los objetos que vienen desde la URL mediante GET
$idestudiante = $_GET["id"];
$idestudiante = (int)$idestudiante;//conversion de string a entero

// Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por GET
$sql3 = 'SELECT E.codigo, E.nombre_estudiante, E.apeido,E.telefono, E.fecha_nac,E.genero, E.direccion, E.correo, C.nombre_carrera, C.nom_uni
FROM estudiantes E INNER JOIN carrera C ON E.id_carrera = C.id_carrera WHERE E.codigo=' . $idestudiante;

// Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
$result = $conn->query($sql3);

// Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
$rows = $result->fetchAll();


?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Regitro de estudiantes desde PHP hacia MySQL</title>
    <link href="../css/editarr2.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="icon" href="/imagenes/estudiante1.png" type="image/x-icon">
    <!-- <style type="text/css" media="screen">
	</style> -->

    <script language="javascript">
		function ValidaFormulario() {
			//Recuperamos lo elegido en el combo de los departamento
			var carrera = document.getElementById("combo_carrera").selectedIndex;
			//Recuperamos lo escrito en la caja del número de empleado:
			var codigo = document.getElementById("txtcodigo").value;
			//Recuperamos lo escrito en la caja del nombre del empleado:
			var nombre = document.getElementById("txtnombre").value;
			//Recuperamos lo escrito en la caja del salario del empleado:
			var apeido = document.getElementById("txtapeido").value;
			//Recuperamos lo escrito en la caja de la categoría del empleado:
			var celular = document.getElementById("txtcel").value;
			//Fecha de nacimiento
			var fecha = document.getElementById("txtfecha").value;
			//Recuperamos lo elegido en el combo de los sexos
			var genero = document.getElementById("combo_genero").selectedIndex;
			//Direccion 
			var direccion = document.getElementById("txtdireccion").value;
			//Correo
			var correo = document.getElementById("txtcorreo").value;

			//VALIDACIONES *****************************************************************
			//Caja de Texto ****************************************************************
			if (carrera == null || carrera == 0) {
				alert("Tienes que elegir la carrea");
				document.getElementById("combo_carrera").focus();
				document.getElementById("combo_carrera").style.background = "#bd373790";
				return false;
			} else if (codigo == null || codigo.length == 0 || !/^([0-9])*$/.test(codigo)) {
				alert("Tienes que escribir el codigo del alumno usando solo números enteros");
				document.getElementById("txtcodigo").value = "";
				document.getElementById("txtcodigo").focus();
				document.getElementById("txtcodigo").style.background = "#bd373790";
				return false;
			} else if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
				alert("Escribe el nombre del alumno");
				document.getElementById("txtnombre").value = "";
				document.getElementById("txtnombre").focus();
				document.getElementById("txtnombre").style.background = "#bd373790";
				return false;
			} else if (apeido == null || apeido.length == 0 || /^\s+$/.test(apeido)) {
				alert("Escribe el Apeido del alumno");
				document.getElementById("txtapeido").value = "";
				document.getElementById("txtapeido").focus();
				document.getElementById("txtapeido").style.background = "#bd373790";
				return false;
			} else if (celular == null || celular.length == 0 || !/^([0-9])*$/.test(celular)) {
				alert("Escribe el numero de celular del alumno");
				document.getElementById("txtcel").value = "";
				document.getElementById("txtcel").focus();
				document.getElementById("txtcel").style.background = "#bd373790";
				return false;
			} else if (fecha == null || fecha.length == 0 || /^\d{4}([\-/.])(0?[1-9]|1[1-2])([\-/.])1(3[01]|[12][0-9]|0?[1-9])$/.test(fecha)) {
				alert("Escribe la Fecha (Año/Mes/Dia)");
				document.getElementById("txtfecha").value = "";
				document.getElementById("txtfecha").focus();
				document.getElementById("txtfecha").style.background = "#bd373790";
				return false;
			} else if (genero == null || genero == 0) {
				alert("Elige un genero");
				document.getElementById("combo_genero").focus();
				document.getElementById("combo_genero").style.background = "#bd373790";
				return false;
			} else if (direccion == null || direccion.length == 0 || /^\s+$/.test(direccion)) {
				alert("Escribe la direccion");
				document.getElementById("txtdireccion").value = "";
				document.getElementById("txtdireccion").focus();
				document.getElementById("txtdireccion").style.background = "#bd373790";
				return false;
			} else if (!(/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/.test(correo)) || correo.length > 30) {
				alert("Ingresa bien el correo, ejemplo: example@gmail.com");
				document.getElementById("txtcorreo").value = "";
				document.getElementById("txtcorreo").focus();
				document.getElementById("txtcorreo").style.background = "#bd373790";
				return false;
			}

			//Cuando ya están contestadas todas las cajas de texto y seleccionados los combobox enviamos el form
			return true;
		}
		//
	</script>

</head>

<body>

	<div id="wrapper">

		<div id="caja1">Licenciatura en Tecnologías de la Información</div>
		<div id="caja2">Programación web</div>
		<div id="caja3">Formulario para editar los estudiantes en la BD desde una página web</div>

		<div id="caja4">
		<div id="texto2"> <br />
							<a id="carrera" href="reporte_general_jonathand1.php">REPORTE GENERAL DE CARRERAS</a>
							<br />
							<a id="estudiante" href="reporte_general_jonathand2.php">REPORTE GENERAL DE ESTUDIANTES</a>
							<br />
							<a id="carrera" href="alta_tabla1_jonathand.php">REGISTRAR CARRERA</a>
							<br />
							<!-- <a id="carrera" href="reporte_borrar_jonathand2.php">ELIMINAR ESTUDIANTE</a>
							<br /> -->
							<a id="carrera" href="reporte_editar_catalogojd.php" >REPORTE EDITAR/BORRAR CARRERAS</a>
							<br />
							<a id="carrera" href="reporte_editar_relacionadojd.php" >REPORTE EDITAR/BORRAR ESTUDIANTES</a>
		</div>
			<div id="texto1"><br>
				<fieldset style="width: 90%; font-weight: bold;">
					<legend>EDITAR EL EMPLEADO SELECCIONADO</legend>
					<form action="actualizar_estudiantes.php" method="post" id="formulario1" onsubmit="return ValidaFormulario()">
						<?php
						foreach ($rows as $row) {
							//Imprimimos en la página EL UNICO REGISTRO de MySQL en un renglon de HTML
						?>
							<div>
								<br />
                                Codigo del Alumno:
                                <input type="text" name="txtcodigo" id="txtcodigo" size="10" value="<?php echo $row['codigo']; ?>" disabled >
                                <br />
                                <br />
								<label for="carrera">Carrera:</label>

								<select name="combo_carrera" id="combo_carrera">
									<option value="0">-- Selecciona un departamento --</option>

									<?php
									foreach ($rows2 as $row2) {
										echo '<option value="' . $row2['id_carrera'] . '">' . $row2['nombre_carrera'] . '</option>';
									}
									?>

									<option value="<?php echo $row2['id_carrera']; ?>" selected>
										<?php echo $row['nombre_carrera']; ?>
									</option>
								</select>

                                <br />
                                <br />
                                Nombre del Alumno:
                                <input type="text" name="txtnombre" id="txtnombre" size="35" value="<?php echo $row['nombre_estudiante']; ?>"  >
                                <br />
                                <br />
                                Apeido del Alumno:
                                <input type="text" name="txtapeido" id="txtapeido" size="25" value="<?php echo $row['apeido']; ?>"  >
                                <br />
                                <br />
                                Numero de Celular:
                                <input type="text" name="txtcel" id="txtcel" size="16" value="<?php echo $row['telefono']; ?>"  >
                                <br />
                                <br />
                                Fecha de Nacimiento:
                                <input type="date" name="txtfecha" id="txtfecha" value="<?php echo $row['fecha_nac']; ?>"  />
                                <br />
                                <br />
                                Direccion:
                                <input type="text" name="txtdireccion" id="txtdireccion" value="<?php echo $row['direccion']; ?>"  />
                                <br />
                                <br />
                                correo:
                                <input type="text" name="txtcorreo" id="txtcorreo" value="<?php echo $row['correo']; ?>" />
                                <br />
                                <br />
                                Genero:
                                <!-- Caja de Selección o ComboBox -->
                                <?php
                                $genero = $row['genero'];
                                if ($genero == "M") {
                                    $genero2 = "Masculino";
                                } else {
                                    $genero2 = "Femenino";
                                }
                                ?>
                                <select name="combo_genero" id="combo_genero">
                                    <option value="0">-- Selecciona un sexo --</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                    <option value="<?php echo ($genero); ?>" selected><?php echo ($genero2); ?></option>
                                </select>
                                <br />
                                <br />
                                
                                <input type="hidden" name="txtnumeroOCULTO" id="txtnumeroOCULTO" value="<?php echo $row['codigo']; ?>" />
                                <input type="submit" name="AddEstudiante" id="AddEstudiante" value="  Guardar este Alumno " />
                                <br />
                            </div>
                        <?php } ?>
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