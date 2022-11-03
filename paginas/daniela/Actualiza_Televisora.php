<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos 
    require_once "conexion.php";
	
	//Recuperamos los valores de las cajas de texto y de los demás objetos de formulario
	//Como los valores vienen desde un FORMULARIO web, se debe usar la supervariable de PHP -- $_POST[ ];
$id_televisora = trim($_POST["id_televisora"]);
$nombre_televisora = trim($_POST["txtnombre"]);
$sede = trim($_POST["txtsede"]);
$fecha_estreno = trim($_POST["txtestreno"]);
$tipo_televisora = trim($_POST["txttipo"]);
    
    //$numero_progra = $_POST["txt_id_programa"];
	//$programa = strtoupper(trim($_POST["txt_programa"])); //Se convierte a MAYUSCULAS usando la función  strtoupper()

    // Escribimos la consulta para ACTUALIZAR LOS DATOS EN LA TABLA de departamentos (PDO)
	// Debido a que en esta tabla los 2 campos son de tipo STRING se encierran en '' las 2 variables de PHP
	// Al ser una sentecia UPDATE de SQL es OBLIGATORIO usar la sentecia WHERE apuntando al campo Llave Primario
       $sqlUPDATE = "UPDATE televisora SET nombre_televisora = '$nombre_televisora', sede = '$sede', fecha_estreno  = '$fecha_estreno ', tipo_televisora = '$tipo_televisora', WHERE id_televisora = $id_televisora";
	   
    // Ejecutamos la sentencia UPDATE de SQL a partir de la conexión usando PDO 
	// mediante la propiedad "EXEC" de la linea de conexión ***************************
	
        $conn->exec($sqlUPDATE);
	    $mensaje = "PROGRAMA ACTUALIZADO SATISFACTORIAMENTE";



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Actualización de programas desde PHP hacia MySQL</title>

<style type="text/css" media="screen">

body { background-color:#999;}

#wrapper {
	margin: auto;
	width: 960px;
	height:auto;
	background-color: #95A5A6;
	}
	
#caja1 {
	width: 300px;
	height: 60px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 10px;
	background-color: #5499C7;
	float: left;
}

#caja2 {
	width: 300px;
	height: 60px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 10px;
	background-color: #5499C7;
	float: left;
}

#caja3 {
	width: 300px;
	height: 60px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 10px;
	background-color: #5499C7;
	float: left;
}

#caja4 {
	width: 940px;
	height:400px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 40px;
	background-color: #717D7E;
	clear: both;

	position: relative;
	top: 10px;
	}
	
#imagen1 { position:relative; top:10px; right:-10px; }

#texto1 {
	width: 500px;
	height: 270px;
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
   <div id="caja3">Formulario para modificar departamentos en la base de datos desde una página web</div>
 
   <div id="caja4">
     <div id="texto1"><br>
      <p></p>
 
        <fieldset style="width: 90%;"    >
            <legend><?php echo ($mensaje); ?></legend>
                <div>
                    <br />
						<b>ID televisora:</b> <?php echo ($id_televisora); ?>
						<br />
						<br />
						<b>Nombre de la Televisora:</b> <?php echo ($nombre_televisora); ?>
						<br />
						<br />
						<b>Sede:</b> <?php echo ($sede); ?>
						<br />
						<br />
						<b>Fecha de su estreno:</b> <?php echo ($fecha_estreno); ?>
						<br />
						<br />
						<b>Tipo de televisora:</b> <?php echo ($tipo_televisora); ?>
						<br />
                    <a href="alta_tabla1_daniela.php">REGISTRAR OTRO PROGRAMA</a>
				    <br />
					<br />
                    <a href="Reporte_editar_programa.php">REPORTE GENERAL DE PROGRAMAS</a>
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