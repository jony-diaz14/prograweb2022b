<!doctype html>
<html>
<head>
<style type="text/css" media="screen">
		table {
			width:100%;
			border-collapse: collapse;
		}
		
		table, td, th {
			border: 1px solid black;
			padding: 5px;
		}
		
		th {text-align: center;}
</style>
</head>
<body>
<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "conexion.php";
	// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
	$departamento_elegido = $_GET['q'];

    // Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
	
	$sql = "SELECT E.numero, E.nombre, E.salario, E.categoria, E.sexo, D.descripcion FROM empleados E ";
	$sql2 = $sql . "INNER JOIN departamentos D ON E.departamento = D.departamento AND E.departamento=";
	$sql3 = $sql2 . "'$departamento_elegido'";

    // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql3);
      
    // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
    $rows = $result->fetchAll();
    // El resultado se mostrará en la página, en el BODY ***************************************************
	
echo "<table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Salario</th>
                <th>Categoria</th>
                <th>Sexo</th>
                <th>Departamento</th>
            </tr>";
		
		 foreach ($rows as $row) {
			  //Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
			  echo "<tr>";
						echo "<td>" . $row['numero'] . "</td>";
						echo "<td>" . $row['nombre'] . "</td>";
						echo "<td>" . $row['salario'] . "</td>";
						echo "<td>" . $row['categoria'] . "</td>";
						
							$sexo = $row['sexo'];
							if ($sexo == "M"){
								$sexo2 = "Masculino";
							} else {
								$sexo2 = "Femenino";
							}
							
						echo "<td>" . ($sexo2) . "</td>";
						echo "<td>" . $row['descripcion'] . "</td>";
			  echo "</tr>";
         }
		 
echo "</table>";
         //Cerramos la oonexion a la base de datos **********************************************
		 $conn = null;
?>
</body>
</html>