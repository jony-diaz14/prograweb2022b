<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "conexion.php";
	
	// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
	$idempleado= $_GET["id"];
	
	// Conversión explicita de CARACTER a ENTERO mediante el forzado de (int), 
	// los valores por GET son tipo STRING ************************************************************
	$idempleado = (int)$idempleado; //*****************************************************************
	
    //Verificamos que SI VENGA EL NUMERO DE EMPLEADO **************************************************
	if($idempleado == "")
	{
		//Esta página de empleado_no_encontrado.php se debe generar para dar aviso al usuario
		header("Location: empleado_no_encontrado.php");
		exit;
	}
	if(is_null($idempleado))
	{
		//Esta página de empleado_no_encontrado.php se debe generar para dar aviso al usuario
		header("Location: empleado_no_encontrado.php");
		exit;
	}
	if(!is_int($idempleado))
	{
		//Esta página de empleado_no_encontrado.php se debe generar para dar aviso al usuario
		header("Location: empleado_no_encontrado.php");
		exit;
	}
	
    // Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
    $sql2 = 'SELECT E.numero, E.nombre, E.salario, E.categoria, E.sexo, D.descripcion FROM empleados E ';
	$sql3 = $sql2 . 'INNER JOIN departamentos D ON E.departamento = D.departamento WHERE E.numero=' . $idempleado;

    // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql3);
      
    // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
    $rows = $result->fetchAll();
    // El resultado se mostrará en la página, en el BODY ***************************************************
	
	//Escribimos la consulta para eliminar el registro de la tabla de la base de datos MySQL ***************
	$sqlBorrar = "DELETE From empleados WHERE numero=" . $idempleado;
	
	// Ejecutamos la sentencia DELETE de SQL a partir de la conexión usando PDO ****************************
    $conn->exec($sqlBorrar);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Regitro de registros a eliminar</title>

<style type="text/css" media="screen">

body { background-color:#999;}

#wrapper {
	margin: auto;
	width: 960px;
	height:auto;
	background-color: #CCC;
	}
	
#caja1 {
	width: 300px;
	height: 60px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 10px;
	background-color: #FFC;
	float: left;
}

#caja2 {
	width: 300px;
	height: 60px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 10px;
	background-color: #FFC;
	float: left;
}

#caja3 {
	width: 300px;
	height: 60px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 10px;
	background-color: #FFC;
	float: left;
}

#caja4 {
	width: 940px;
	height:400px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 40px;
	background-color: #333;
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

   <div id="caja1">Licenciatura en Tecnologías de la Información</div>
   <div id="caja2">Programación web</div>
   <div id="caja3">Datos del empleado que se han eliminado satisfactoriamente</div>
 
   <div id="caja4">
     <div id="texto1"><br>
 
     <h2>Registro satisfactoriamente eliminado</h2>
 
        <table border="1" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Salario</th>
                <th>Categoria</th>
                <th>Sexo</th>
                <th>Departamento</th>
            </tr>
        </thead>
        <tbody>
        
        <?php
            foreach ($rows as $row) {
			//Imprimimos en la página EL UNICO REGISTRO de MySQL en un renglon de HTML
        ?>
            <tr>
                <td><?php echo $row['numero']; ?></td>
                <!-- Creamos una celda con un enlace HTML que apunta a otro archivo PHP -->
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['salario']; ?></td>
                <td><?php echo $row['categoria']; ?></td>
                <?php
					$sexo = $row['sexo'];
					if ($sexo == "M"){
						$sexo2 = "Masculino";
					} else {
						$sexo2 = "Femenino";
					}
				?>
                <td><?php echo ($sexo2); ?></td>
                <td><?php echo $row['descripcion']; ?></td>
            </tr>
        <?php } ?>
        <tr>
		
            <td colspan="6">&nbsp;</td>

        </tr>
        <tr>
            <td>&nbsp;</td>
    		<td><a href="reporte_para_borrar_pdo.php">
				        <<< --- Regresar al reporte completo (Para eliminar mas registros)
                </a>
            </td>
    		<td>&nbsp;</td>
            <td>&nbsp;</td>
    		<td>&nbsp;</td>
    		 <th><a href="alta_empleados.php">Agregar otro empleado</a></th>
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