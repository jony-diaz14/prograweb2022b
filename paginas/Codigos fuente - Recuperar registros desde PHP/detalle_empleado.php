<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "conexion.php";
    $result;
	
	// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
	$idempleado= $_GET["id"];
	
	// Conversión explicita de CARACTER a ENTERO mediante el forzado de (int), 
	// los valores por GET son tipo STRING ************************************************************
	$idempleado = (int)$idempleado; //*****************************************************************
	
    //Verificamos que SI VENGA EL NUMERO DE EMPLEADO **************************************************
	if($idempleado == "")
	{
		header("Location: empleado_no_encontrado.php"); //Este archivo lo tienes que generar //////////
		exit;
	}
	if(is_null($idempleado))
	{
		header("Location: empleado_no_encontrado.php"); //Este archivo lo tienes que generar //////////
		exit;
	}
	if(!is_int($idempleado))
	{
		header("Location: empleado_no_encontrado.php"); //Este archivo lo tienes que generar //////////
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
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reporte de PHP conectado a MySQL</title>
</head>
<body>
    <h2>Reporte de detalle del empleado seleccionado</h2>
    <div align="center">
    <table border="1" width="90%">
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
            <td>&nbsp;</td>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
            <td>&nbsp;</td>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
    		<td><a href="reporte_con_enlaces_pdo.php">
				        <<< --- Regresar al reporte completo (Maestro)
                </a>
            </td>
    		<td>&nbsp;</td>
            <td>&nbsp;</td>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
        </tr>
        </tbody>
    </table>
    </div>
    
     <?php
			//Cerramos la oonexion a la base de datos **********************************************
			$conn = null;
     ?>
      
      <br />
      <br />
      
</body>
</html>