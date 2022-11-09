<?php
 // Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conn_mysql_eber.php";
	
 //Recuperamos los valores de las cajas de texto y de los demás objetos de formulario
 //Como los valores vienen desde un FORMULARIO web, se debe usar la supervariable de PHP -- $_POST[ ];
$noserie = $_POST["txt_no_serie_oculto"];
$tipo_sistema = trim($_POST["txt_tipo_sistema"]);
$id_dispositivo = trim($_POST["txt_id_dispositivo"]);
$id_dispositivo = (int)$id_dispositivo;
$ram = trim($_POST["txtram"]);
$precio = trim($_POST["txtprecio"]);
$modelo = trim($_POST["txtmodelo"]);
$marca = trim($_POST["combo_marca"]);
 // Escribimos la consulta para ACTUALIZAR LOS DATOS EN LA TABLA de departamentos (PDO)
 // Debido a que en esta tabla los 2 campos son de tipo STRING se encierran en '' las 2 variables de PHP
 // Al ser una sentecia UPDATE de SQL es OBLIGATORIO usar la sentecia WHERE apuntando al campo Llave Primario
	$sqlUPDATE = "UPDATE computadoras SET id_marca = '$marca', tipo_sistema = '$tipo_sistema', id_dispositivo = $id_dispositivo, 
	ram = $ram, precio = $precio, modelo = '$modelo' WHERE no_serie= $noserie";
	
 // Ejecutamos la sentencia UPDATE de SQL a partir de la conexión usando PDO 
 // mediante la propiedad EXEC de la linea de conexión ***************************
	$conn->exec($sqlUPDATE);
	$mensaje = "MARCA ACTUALIZADA SATISFACTORIAMENTE";
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Regitro de Marcas desde PHP hacia MySQL</title>
	<style type="text/css" media="screen">


body { background-color:#9B59B6;}

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

#imagen1 { position:relative; top:10px; right:-10px; }

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

#AddEmpleado{
    position: absolute;
    right: 50px;
    border:3px solid #009;
    padding: 10px;
}

</style>
</head>

<body>

	<div id="wrapper">

		<div id="caja1">Licenciatura en Tecnologías de la Información</div>
		<div id="caja2">Programación web</div>
		<div id="caja3">Formulario para alta de marcas en la base de datos desde una página web</div>

		<div id="caja4">
			<div id="texto1"><br>
				<p></p>

				<fieldset style="width: 90%;">
					<legend><?php echo $mensaje; ?></legend>
					<div>
						<br />
						<b>Marca:</b> <?php echo ($marca); ?>
						<br />
						<br />
						<b>No. de serie:</b> <?php echo ($noserie); ?>
						<br />
						<br />
						<b>Tipo de sistema:</b> <?php echo ($tipo_sistema); ?>
						<br />
						<br />
						<b>Id Dispositivo:</b> <?php echo ($id_dispositivo); ?>
						<br />
						<br />
						<b>Ram:</b> <?php echo ($ram); ?>
						<br />
						<br />
						<b>Precio:</b> <?php echo ($precio); ?>
						<br />
						<br />
						<b>Modelo:</b> <?php echo ($modelo); ?>
						<br />
						<br />
						<a href="http://eber2022b.atspace.cc/paginas/alta_tabla2_eber.php">REGISTRAR OTRA MARCA</a>
						<br />
						<br />
						<a href="http://eber2022b.atspace.cc/paginas/reporte_para_editar_relacionado_eber.php">REPORTE DE LAS MARCAS</a>
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