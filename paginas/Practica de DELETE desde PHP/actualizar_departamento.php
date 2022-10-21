<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos 
    require_once "conexion.php";
	
	//Recuperamos los valores de las cajas de texto y de los demás objetos de formulario
    $numero_dpto = $_POST["txt_id_departamento_oculto"];
	$departamento = strtoupper(trim($_POST["txt_departamento"])); //Se convierte a MAYUSCULAS

    // Escribimos la consulta para ACTUALIZAR LOS DATOS EN LA TABLA de departamentos (PDO)
	// Concatenando 2 strings armamos la sentencia INSERT INTO ************************
       $sqlUPDATE = "UPDATE departamentos SET descripcion = '$departamento' WHERE departamento='$numero_dpto'";
	   
    // Ejecutamos la sentencia INSERT de SQL a partir de la conexión usando PDO 
	// mediante la propiedad "EXEC" de la linea de conexión ***************************
	
        $conn->exec($sqlUPDATE);
	    $mensaje = "DEPARTAMENTO ACTUALIZADO SATISFACTORIAMENTE";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Actualización de departamentos desde PHP hacia MySQL</title>

<style type="text/css" media="screen">

body { background-color:#999;}

#wrapper {
	margin: auto;
	width: 960px;
	height: 390px;
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
	height: 300px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 40px;
	background-color: #333;
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
            <legend><?php echo $mensaje; ?></legend>
                <div>
                    <br />
                         <b>Código de Departamento:</b> <?php echo ($numero_dpto); ?>
                    <br />
					<br />
                         <b>Número de Departamento:</b> <?php echo ($departamento); ?>
                    <br />
					<br />
                    <a href="alta_departamentos.php">REGISTRAR OTRO DEPARTAMENTO</a>
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