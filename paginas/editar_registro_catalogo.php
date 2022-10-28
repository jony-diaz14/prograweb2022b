<?php
// Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conn_mysql_jonathan.php";

// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
$idCarrera = $_GET["id"];
//Eliminamos los posibles espacios en blanco que tenga a ambos lados la variable $idDepartamento usando trim()
// $idCarrera = trim($idCarrear);

// Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
// Debido a que el campo llave en este ejemplo es de tipo STRING la variable en SQL va encerrada entre ''
$sql = "SELECT * FROM carrera WHERE id_carrera = $idCarrera";

// Ejecutamos la consulta SQL y asignamos el resultado a la variable llamada $result
$result = $conn->query($sql);

// Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
$rows = $result->fetchAll();

// El resultado se mostrará en la página, en el BODY del HTML **********************************************
if (empty($rows)) {
	$result = "No se encontraron carreras con esa información !!";
	header("Location: ");
	exit;
}
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Regitro de Carreras desde PHP hacia MySQL</title>

	<style type="text/css" media="screen">
		body {
			background-color: #999;
		}

		#wrapper {
			margin: auto;
			width: 960px;
			height: 470px;
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
			height: 370px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 40px;
			background-color: #333;
			clear: both;

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
			height: 340px;
			margin-left: 5px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #CCC;
			padding: 5px;
			float: right;
			right: -10px;
			top: 10px;
		}

		#AddEmpleado {
			position: absolute;
			right: 50px;
			border: 3px solid #009;
			padding: 10px;
		}
	</style>

	<script language="javascript">
		function ValidaFormulario1() {
            // Validaciones con JavaScript
			var codigo = document.getElementById("txtcodigo").value;
			var nombre = document.getElementById("txtnombre").value;
			var cordi = document.getElementById("txtcordi").value;
			var nomUni = document.getElementById("txtuni").value;
			
            if (codigo == null || codigo.length == 0 || /^\s+$/.test(codigo)) {
				alert("Escribe un codigo con numero enteros");
				document.getElementById("txtcodigo").value = "";
				document.getElementById("txtcodigo").style.background = 'lightgreen';
				document.getElementById("txtcodigo").focus();
				return false;
			} else if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
				alert("Escribe el nombre de la Carrera");
				document.getElementById("txtnombre").value = "";
				document.getElementById("txtnombre").style.background = 'lightgreen';
				document.getElementById("txtnombre").focus();
				return false;
			} else if (cordi == null || cordi.length == 0 || /^\s+$/.test(cordi)) {
				alert("Escribe el nombre del Coordinador de la Carrera");
				document.getElementById("txtcordi").value = "";
				document.getElementById("txtcordi").style.background = 'lightgreen';
				document.getElementById("txtcordi").focus();
				return false;
			} else if (nomUni == null || nomUni.length == 0 || /^\s+$/.test(nomUni)) {
				alert("Escoge una Universidad");
				document.getElementById("txtuni").value = "";
				document.getElementById("txtuni").style.background = 'lightgreen';
				document.getElementById("txtuni").focus();
				return false;
			}
			return true;
		}
		//-->
	</script>

</head>

<body>

	<div id="wrapper">

		<div id="caja1">Licenciatura en Tecnologías de la Información</div>
		<div id="caja2">Programación web</div>
		<div id="caja3">Formulario para modificar empleados en la base de datos desde una página web</div>

		<div id="caja4">
			<div id="texto1"><br>
				<p></p>

				<fieldset style="width: 90%; font-weight: bold;">
					<legend>ACTUALIZAR UN EMPLEADO</legend>

					<!-- el atributo ACTION del Formulario apunta al archivo 3 de esta práctica: actualizar_departamento.php -->
					<form action="actualizar_carrera.php" method="post" id="formulario1" onsubmit="return ValidaFormulario1();">
						<?php
						foreach ($rows as $row) {
							//Imprimimos en la página EL UNICO REGISTRO de MySQL en un renglon de HTML
						?>
							<div>
								<br />
								<!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->
								Codigo de la Carrera:
								<input type="text" name="txtcodigo" id="txtcodigo" size="10" maxlength="2" disabled value="<?php echo $row['id_carrera']; ?>" />
								<!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->
								<input type="hidden" name="txtcodigo_oculto" id="txtcodigo_oculto" size="10" maxlength="2" value="<?php echo $row['id_carrera']; ?>" />
								<br />
								<br />
								<!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->
								Nombre de la Carrera:
								<input type="text" name="txtnombre" id="txtnombre" size="40" maxlength="50" value="<?php echo $row['nombre_carrera']; ?>" />
								<br />
								<br />
								Nombre del Coordinador:
								<input type="text" name="txtcordi" id="txtcordi" size="40" maxlength="50" value="<?php echo $row['coordinador']; ?>" />
								<br />
								<br />
								Nombre de la Univseridad:
								<input type="text" name="txtuni" id="txtuni" size="40" maxlength="50" value="<?php echo $row['nom_uni']; ?>" />
								<br />
								<br />
								<input type="submit" name="AddEmpleado" id="AddEmpleado" value="  Actualizar esta Carrera " />
								<br />
							</div>
						<?php } ?>
					</form>
				</fieldset>
			</div>
		</div>
	</div>
</body>

</html>