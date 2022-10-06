<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "conexion.php";
    $result;

// Estas son las opciones que se muestran al principio sin que hayas seleccionado nada aun
	$resultado = "<option value='0'>Estos son los platillos de los restaurantes</option>";

	$resultado2 = "<option value='0'>No se encontraron los platillos!!</option>";
	
	// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
	$restaurante_elegido = $_POST["restaurante_seleccionado"];
	
    // Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
    $sql2 = "SELECT  * FROM platillos WHERE id_restaurante=$restaurante_elegido";

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
           echo '<option value="'.$row['id_platillo'].'">'.$row['nombre_platillo'].'</option>';
        }
	}
?>