<?php
    //Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "conexion.php";
    // Escribimos la consulta para recuperar los registros de la tabla de MySQL
    //$sql = 'SELECT departamento, descripcion FROM departamentos';
    $sql = 'SELECT id_televisora,nombre_televisora FROM televisora';
    // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql);
    // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
    $rows = $result->fetchAll();
	
	// Los valores que tendrá la variable $rows se organizan en un arreglo asociativo
	// (Variable con varias valores)
	// y se usará un ciclo foreach para recuper los valores uno a uno de ese arreglo
    // El resultado se mostrará en una tabla HTML ****************************************************
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Regitro de registros a eliminar</title>

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
	/*
		 position:absolute; 
		 top:200px;
    */
		 
	position: relative;
	top: 10px;
	}
	
#imagen1 { position:relative; top:10px; right:-10px; }

#texto1 {
	width: 900px;
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

   <div id="caja1">Licenciatura en Tecnolog&iacute;as de la Informaci&oacute;n</div>
   <div id="caja2">Programaci&oacute;n web</div>
   <div id="caja3">Reporte de registros de una tabla para ser ACTUALIZADOS en l&iacute;nea (PHP con PDP y MySQL)</div>
 
   <div id="caja4">
     <div id="texto1"><br>
 
        <table border="1" style="width:100%;">
        <thead>
            <tr>
                <th>ID del programa</th>
                <th>Nombre del Programa</th>
				<th>Eliminar</th>
				<th>Editar</th>
            </tr>
        </thead>
        <tbody>
        
        <?php
            foreach ($rows as $row) {
			//Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
        ?>
            <tr>
			    <!-- En estas celdas de HTML se muestran los valores recuperados de la consulta SELECT de SQL -->
				<!-- En esta parte mostrarás tus propios campos de tu TABLA CATALOGO (todos los que conforman tu tabla) -->
                <td><?php echo $row['id_televisora']; ?></td>
                <td><?php echo $row['nombre_televisora']; ?></td>

                <!-- CELDA 1 para la ilga de BORRAR -->
                <td><a onClick="return borrar_televisora(<?php echo $row['id_televisora']; ?>);" href="eliminar_televisora.php?id=<?php echo $row['id_televisora']; ?>">eliminar</a>
                </td>
                
                <!-- CELDA 2 para la ilga de EDITAR -->
				<!-- Esta es la LIGA o LINK para enviar el valor del campo llave al archivo 2 de la práctica -->
                 <td><a href="Editar_programa.php?id=<?php echo $row['id_televisora']; ?>">
				        editar
                     </a>
                </td>
                    
            </tr>
			
	    <!-- Aqui se cierra el ciclo foreach de PHP que se usó para mostrar en pantalla los valores de los campos de la consulta SQL tipo SELECT -->
        <?php } ?>
        
         <tr>
                <td colspan="4">&nbsp;</td>
         </tr>
         <tr>
                <td>&nbsp;</td>
                <td><a href="alta_tabla1_daniela.php">Agregar otro programa</a></td>
                <td>&nbsp;</td>
                <td colspan="4">&nbsp;</td>
         </tr>   
        </tbody>
    </table>
     </div>
  </div>
</div>
     <?php
			//Cerramos la oonexion a la base de datos **********************************************
			$conn = null;
     ?>
</body>
</html>