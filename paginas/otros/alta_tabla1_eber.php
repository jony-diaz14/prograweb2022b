<!-- <?php
// Insertamos el código PHP donde nos conectamos a la base de datos *******************************
require_once "conn_mysql_eber.php";
$result = "";
// Escribimos la consulta para recuperar los departamentos de la tabla departamentos **************
$sql = 'SELECT * FROM marcas_computadoras';
// Almacenamos los resultados de la consulta en una variable llamada $smtp a partir de la conexión
$stmt = $conn->query($sql);
// Recuperamos los valores de los registros de la tabla que ya están en la variable $stmt
$rows = $stmt->fetchAll();
// Verificamos si está vacia la variable $smtp, si es positivo imprimimos en pantalla que no trae
if (empty($rows)) {
	$result = "No se encontraron resultados !!";
}
?> -->
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Regitro de Marcas desde PHP hacia MySQL</title>

	<style type="text/css" media="screen">
		body {
			background-color: #9B59B6;
		}

		#wrapper {
			margin: auto;
			width: 960px;
			height: 550px;
			background-color: #EC7063;
		}

		#caja1 {
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #5DADE2;
			float: left;
		}

		#caja2 {
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #5DADE2;
			float: left;
		}

		#caja3 {
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #5DADE2;
			float: left;
		}

		#caja4 {
			width: 940px;
			height: 450px;
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
			height: 400px;
			margin-left: 5px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #76D7C4;
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
		function ValidaFormulario() {
			//Recuperamos lo escrito en el id de la marca:
			var idmarca = document.getElementById("txtmarca").value;
			//Recuperamos lo escrito en el combo de la marca:
			var nombre_marcas = document.getElementById("txtnombre").value;
			//Recuperamos lo escrito en el numero del rfc:
			var rfc = document.getElementById("txtrfc").value;
			//Recuperamos lo escrito en la caja del domicilio de la marca:
			var domicilio = document.getElementById("txtdomicilio").value;
			//Recuperamos lo escrito en la caja del número de la marca:
			var telefono = document.getElementById("txtcodigo").value;
			//Recuperamos lo escrito en la caja de la ciudad de la marca:
			var ciudad = document.getElementById("txtciudad").value;
			//Recuperamos lo escrito en la caja del estado de la marca:
			var estado = document.getElementById("txtestado").value;
			//Recuperamos lo escrito en la caja del pais de la marca:
			var pais = document.getElementById("txtpais").value;
			//VALIDACIONES *****************************************************************
			//Caja de Texto ****************************************************************
			if (idmarca == null || idmarca.length == 0 || /^\s+$/.test(idmarca)) {
				alert("Escribe el id correspondiente");
				document.getElementById("txtmarca").value = "";
				document.getElementById("txtmarca").focus();
				document.getElementById("txtmarca").style.background = "#F01717";
				return false;

			} else if (nombre_marcas == null || nombre_marcas.length == 0 || /^\s+$/.test(nombre_marcas)) {
				alert("Tienes que elegir la marca");
				document.getElementById("txtmarca").focus();
				document.getElementById("txtmarca").style.background = "#F01717";
				return false;
			} else if (rfc == null || rfc.length == 0 || !/^([0-9])*$/.test(rfc)) {
				alert("Tienes que escribir el rfc de la marca usando solo números enteros");
				document.getElementById("txtrfc").value = "";
				document.getElementById("txtrfc").focus();
				document.getElementById("txtrfc").style.background = "#F01717";
				return false;
			} else if (domicilio == null || domicilio.length == 0 || /^\s+$/.test(domicilio)) {
				alert("Escribe el nombre del domicilio");
				document.getElementById("txtdomicilio").value = "";
				document.getElementById("txtdomicilio").focus();
				document.getElementById("txtdomicilio").style.background = "#F01717";
				return false;
			} else if (telefono == null || telefono.length == 0 || !/^([0-9])*$/.test(telefono)) {
				alert("Escribe el telefono");
				document.getElementById("txttelefono").value = "";
				document.getElementById("txttelefono").focus();
				document.getElementById("txttelefono").style.background = "#F01717";
				return false;
			} else if (ciudad == null || ciudad.length == 0 || /^\s+$/.test(ciudad)) {
				alert("Escribe la ciudad correspondiente");
				document.getElementById("txtciudad").value = "";
				document.getElementById("txtciudad").focus();
				document.getElementById("txtciudad").style.background = "#F01717";
				return false;
			} else if (estado == null || estado.length == 0 || /^\s+$/.test(estado)) {
				alert("Escribe el estado correspondiente");
				document.getElementById("txtestado").value = "";
				document.getElementById("txtestado").focus();
				document.getElementById("txtestado").style.background = "#F01717";
				return false;
			} else if (pais == null || pais.length == 0 || /^\s+$/.test(pais)) {
				alert("Escribe el pais correspondiente");
				document.getElementById("txtpais").value = "";
				document.getElementById("txtpais").focus();
				document.getElementById("txtpais").style.background = "#F01717";
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
		<div id="caja3">Formulario para guardar marcas</div>

		<div id="caja4">
			<div id="texto1"><br>
				<p><?php echo $result; ?></p>

				<fieldset style="width: 90%; font-weight: bold;">
					<legend>REGISTRAR UNA NUEVA MARCA</legend>



					<form action="grabar_datos.php" method="post" id="formulario1" onsubmit="return ValidaFormulario()">
						<div>
							<br />
							Id Marca:
							<input type="text" name="txtmarca" id="txtmarca" size="5">
							<br />
							<br />
							Nombre Marca:
							<input type="text" name="txtnombre" id="txtnombre" size="20">
							<br />
							<br />
							RFC:
							<input type="text" name="txtrfc" id="txtrfc" size="10">
							<br />
							<br />
							Domicilio:
							<input type="text" name="txtdomicilio" id="txtdomicilio" size="40">
							<br />
							<br />
							Telefono:
							<input type="text" name="txttelefono" id="txttelefono" size="15">
							<br />
							<br />
							Ciudad:
							<input type="text" name="txtciudad" id="txtciudad" size="25">
							<br />
							<br />
							Estado:
							<input type="text" name="txtestado" id="txtestado" size="25">
							<br />
							<br />
							Pais:
							<input type="text" name="txtpais" id="txtpais" size="20">
							<br />
							<br />
							<input type="submit" name="AddMarca" id="AddMarca" value="  Registrar Marca " />
							<br />
							<a href="http://eber2022b.atspace.cc/paginas/reporte_general_eber.php" id="">Reporte General</a>
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