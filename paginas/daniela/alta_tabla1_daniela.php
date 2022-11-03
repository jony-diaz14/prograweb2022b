<?php
// Insertamos el código PHP donde nos conectamos a la base de datos *******************************
require_once "conexion.php";
$result = "";

// Escribimos la consulta para recuperar los departamentos de la tabla departamentos **************
$sql = 'SELECT * FROM televisora';
// Almacenamos los resultados de la consulta en una variable llamada $smtp a partir de la conexión
$stmt = $conn->query($sql);
// Recuperamos los valores de los registros de la tabla que ya están en la variable $stmt
$rows = $stmt->fetchAll();
// Verificamos si está vacia la variable $smtp, si es positivo imprimimos en pantalla que no trae
//
if (empty($rows)) {
	$result = "No se encontraron resultados !!";
}
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Regitro de Televisoras desde PHP hacia MySQL</title>
	<link href="../css/alta_tabla1.css" rel="stylesheet" type="text/css" media="screen">

    <style type="text/css" media="screen">
		body {
            background-color: #717D7E ;
        }

        #wrapper {
            margin: auto;
            width: 960px;
            height: 580px;
            background-color: #95A5A6 ;
        }

        #caja1 {
            width: 300px;
            height: 50px;
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 10px;
            background-color: #5499C7;
            float: left;
        }

        #caja2 {
            width: 300px;
            height: 50px;
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 10px;
            background-color: #5499C7 ;
            float: left;
        }

        #caja3 {
            width: 300px;
            height: 50px;
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 10px;
            background-color: #5499C7 ;
            float: left;
        }

        #caja4 {
            width: 940px;
            height: 470px;
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 40px;
            background-color: #717D7E  ;
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
            background-color: #7FB3D5  ;
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

<script language="javascript">
        function ValidaFormulario() {
            //
            var id_televisora = document.getElementById("combo_televisora").selectedIndex;
            //
            var id_programa = document.getElementById("txtprograma").value;
            //
            var nombre = document.getElementById("txtnombre").value;
            //
            var horario = document.getElementById("txthorario").value;
            //
            var clasificacion = document.getElementById("combo_clasificacion").selectedIndex;
            //
            var numCanal = document.getElementById("txtcanal").value;
            //VALIDACIONES ***********************
            //Caja de Texto **********************
            if (id_televisora == null || id_televisora == 0) {
                alert("Tienes que elegir la televisora del programa");
                document.getElementById("combo_televisora").focus();
                document.getElementById("combo_televisora").style.background = "#199C9920";
                return false;
            }  else if (id_programa == null || id_programa.length == 0 || !/^([0-9])*$/.test(id_programa)) {
                alert("Escribe la codigo del programa ");
                document.getElementById("txtprograma").value = "";
                document.getElementById("txtprograma").focus();
                document.getElementById("txtprograma").style.background = "#199C9920";
                return false;
            }else if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
                alert("Escribe el nombre del programa");
                document.getElementById("txtnombre").value = "";
                document.getElementById("txtnombre").focus();
                document.getElementById("txtnombre").style.background = "#199C9920";
                return false;
            } else if (horario == null || horario.length == 0 || /^(?:0?[1-9]|1[0-2]):[0-5][0-9]\s?(?:[aApP](\.?)[mM]1)?$/.test(horario)) {
                // Aqui es la validacion del horario, con formato de 12 horas, por eso cambie de date a tipo varchar en la tabla de phpmyadmin
                alert("Escribe el horario del programa");
                document.getElementById("txthorario").value = "";
                document.getElementById("txthorario").focus();
                document.getElementById("txthorario").style.background = "#199C9920";
                // /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/
                // /^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$/
                return false;
            } else if (clasificacion == null || clasificacion == 0) {
                alert("Escribe el tipo de Clasificacion");
                document.getElementById("combo_clasificacion").focus();
                document.getElementById("combo_clasificacion").style.background = "#199C9920";
                return false;
            } else if (numCanal == null || numCanal.length == 0 || !/^([0-9])*$/.test(numCanal)) {
                alert("Escribe el numero del canal");
                document.getElementById("txtcanal").value = "";
                document.getElementById("txtcanal").focus();
                document.getElementById("txtcanal").style.background = "#199C9920";
                return false;
            } //Cuando ya están contestadas todas las cajas de texto y seleccionados los combobox enviamos el form 
            return true;
        }
    </script>
</head>

<body>

	<div id="wrapper">

		<div id="caja1">Licenciatura en Tecnologías de la Información</div>
		<div id="caja2">Programación web</div>
		<div id="caja3">Formulario para grabar televisoras en la base de datos desde una página web</div>

		<div id="caja4">
			<div id="texto1"><br>
				<p><?php echo $result; ?></p>

				<fieldset style="width: 90%; font-weight: bold;">
					<legend>REGISTRAR UN NUEVO PROGRAMA</legend>



					<form action="grabar_datos.php" method="post" id="formulario1" onsubmit="return ValidaFormulario()">
						<div>
							<br />
                            <label for="televisora22">TELEVISORA:</label>
							<select name="combo_televisora" id="combo_televisora">
								<option value="0">-- Selecciona una Televisora --</option>
								<?php
                                foreach ($rows as $row) {
                                    echo '<option value="' . $row['id_televisora'] . '">' . $row['nombre_televisora'] . '</option>';
                                }
                                ?>
							</select>
							<br />
							<br />
							Codigo del Programa:
							<input type="text" name="txtprograma" id="txtprograma" size="10">
							<br />
							<br />      
							Nombre del Programa:
							<input type="text" name="txtnombre" id="txtnombre" size="35">
							<br />
							<br />
							Horario(formato 12hrs):
							<input type="text" name="txthorario" id="txthorario" placeholder="12:00 pm">
							<br />
							<br />
							<!-- Clasificacion:
							<input type="text" name="txtclasificacion" id="txtclasificacion" size="20"> -->
                            <label for="televisora22">Clasificacion:</label>
							<select name="combo_clasificacion" id="combo_clasificacion">
								<option value="0">-- Selecciona una clasificacion --</option>
								<option value="AA">AA</option>
								<option value="A">A+</option>
								<option value="B">B</option>
								<option value="BB"> BB </option>
								<option value="C">C</option>

							</select>
							<br />
							<br />
                            Numero de Canal:
							<input type="text" name="txtcanal" id="txtcanal" size="20">
							<br />
							<br />
							<input type="submit" name="AddPrograma" id="AddPrograma" value=" Registrar este Programa " />
							<br />
							<a href="Reporte.php" id ="">Reporte General</a>
                            <br />
							<a href="Actualiza_programa.php" id ="">Actualizar un programa</a>
                            <br />
							<a href="Reporte_Eliminar.php" id ="">Eliminar un programa</a>
						</div>
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