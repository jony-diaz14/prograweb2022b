<?php
	// Insertamos el código PHP donde nos conectamos a la base de datos 
    require_once "conn_mysql_eber.php";

	//Recuperamos los valores de las cajas de texto y de los demás objetos de formulario
    $idmarca = $_POST["txtmarca"];
    $nombre = $_POST["txtnombre"];
    $idmarca = (int)$idmarca;
	$rfc = $_POST["txtrfc"];
	$rfc = (int)$rfc;
	$domicilio = $_POST["txtdomicilio"];
    $telefono = $_POST["txttelefono"];
	$telefono = (int)$telefono;
    $ciudad = $_POST["txtciudad"];
    $estado = $_POST["txtestado"];
    $pais = $_POST["txtpais"];




	$sql = "SELECT * FROM marcas_computadoras WHERE id_marca= $idmarca";
	$result = $conn->query($sql);
    $rows = $result->fetchAll();
	
	if(empty($rows)) // Si detecta VACIO la consulta de busqueda del ID de empleado
	{
	
    // Escribimos la consulta para INSERTAR LOS DATOS EN LA TABLA de empleados (PDO)
	// Concatenando 2 strings armamos la sentencia INSERT INTO ******************
       $sqlINSERT1 = "INSERT INTO marcas_computadoras(id_marca, nombre_marca, rfc, domicilio, telefono, ciudad, estado, pais) ";
	   $sqlINSERT2 = $sqlINSERT1 . "VALUES ($idmarca, '$nombre', $rfc, '$domicilio', $telefono, '$ciudad', '$estado', '$pais')";
	   //echo($sqlINSERT2);
	   //die();
    // Ejecutamos la sentencia INSERT de SQL a partir de la conexión usando PDO 
	// mediante la propiedad "EXEC" de la linea de conexión *******************
	
        $conn->exec($sqlINSERT2);
	    $mensaje = "marca registrada REGISTRADA SATISFACTORIAMENTE";
	
	} else {
	
	// En caso de que si exista ya capturado ese empleado en la base de datos
	    $mensaje = "Ese ID de marca ya existe en la base de datos";
	
	}
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
 
        <fieldset style="width: 90%;"    >
            <legend><?php echo $mensaje; ?></legend>
                <div>
                         <b>Id:</b> <?php echo ($idmarca); ?>
                    <br />
                    <br />
                         <b>Marcas:</b> <?php echo ($nombre); ?>
                    <br />
                    <br />
                         <b>Rfc:</b> <?php echo ($rfc); ?>
                    <br />
                    <br />
                         <b>Domicilio:</b> <?php echo ($domicilio); ?> 
                    <br />
                    <br />
                         <b>Telefono:</b> <?php echo ($telefono); ?>  
                    <br />
                    <br />
                         <b>Ciudad:</b> <?php echo ($ciudad); ?>
                    <br />
                    <br />
                         <b>Estado:</b> <?php echo ($estado); ?>
                    <br />
                    <br />
                         <b>Pais:</b> <?php echo ($pais); ?>
                    <br />
                    <br />
                    <a href="http://eber2022b.atspace.cc/paginas/alta_tabla1_eber.php">REGISTRAR OTRA MARCA</a>
                    <br />
                    <a href="http://eber2022b.atspace.cc/paginas/reporte_general_eber.php" id="">Reporte General</a> 
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