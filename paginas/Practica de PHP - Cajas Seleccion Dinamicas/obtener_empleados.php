<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "conexion.php";
    $result;
	$resultado = "<option value='0'>Estos son los empleados del departamento</option>";
	$resultado2 = "No se encontraron empleados en ese departamento !!";
	
	// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
	$departamento_elegido = $_POST["departamento_seleccionado"];
	
    // Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
    $sql2 = "SELECT * FROM empleados WHERE departamento='$departamento_elegido'";

    // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql2);
      
    // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
    $rows = $result->fetchAll();
    // El resultado se mostrará en la página, en el BODY ***************************************************
	
	// Verificamos si está vacia la variable $smtp, si es positivo imprimimos en pantalla que no trae
    if (empty($rows)) {
        echo $resultado2;
		die();
    } else {
        echo $resultado;
        foreach ($rows as $row) 
	    {
           echo '<option value="'.$row['numero'].'">'.$row['nombre'].'</option>';
        }
	}
?>