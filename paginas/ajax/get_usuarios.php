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
	$tipousuario_elegido = $_GET['q'];

    // Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
	
	$sql = "SELECT * FROM usuarios WHERE tipousuario=" . $tipousuario_elegido;

    // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql);
      
    // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
    $rows = $result->fetchAll();
    // El resultado se mostrará en la página, en el BODY ***************************************************
	
echo "<table>
            <tr>
                <th>Código del usuario</th>
                <th>Usuario</th>
                <th>Clave</th>
                <th>Tipo de Usuario</th>
                <th>Nombre del usuario</th>
            </tr>";
		
		 foreach ($rows as $row) {
			  //Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
			  echo "<tr>";
						echo "<td>" . $row['id_usuario'] . "</td>";
						echo "<td>" . $row['usuario'] . "</td>";
						echo "<td>" . $row['pass'] . "</td>";
						echo "<td>" . $row['tipousuario'] . "</td>";
						echo "<td>" . $row['nombreU'] . "</td>";
			  echo "</tr>";
         }
		 
echo "</table>";
         //Cerramos la oonexion a la base de datos **********************************************
		 $conn = null;
?>
</body>
</html>