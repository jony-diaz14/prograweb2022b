<!doctype html>
<html>

<head>
    <style type="text/css" media="screen">
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        td,
        th {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    // Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "conn_mysql_jonathan.php";
    // Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
    $estudiante_elegido = $_GET['q'];

    // Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET

    // $sql = "SELECT E.numero, E.nombre, E.salario, E.categoria, E.sexo, D.descripcion FROM empleados E 
    // INNER JOIN departamentos D ON E.departamento = D.departamento AND E.departamento = '$departamento_elegido'";
    $sql = "SELECT E.codigo, E.nombre_estudiante, E.apeido,E.telefono, E.fecha_nac,E.genero, E.direccion, E.correo, C.nombre_carrera
    FROM estudiantes E INNER JOIN carrera C ON E.id_carrera = C.id_carrera AND E.id_carrera = '$estudiante_elegido'";
    // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql);
    // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
    $rows = $result->fetchAll();
    // El resultado se mostrará en la página, en el BODY ***************************************************

    echo "<table>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Apeido</th>
                <th>Celular</th>
                <th>fecha nacimiento</th>
                <th>genero</th>
                <th>direccion</th>
                <th>correo</th>
                <th>Nombre de Carrera</th>
            </tr>";

    foreach ($rows as $row) {
        //Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
        echo "<tr>";
        echo "<td>" . $row['codigo'] . "</td>";
        echo "<td>" . $row['nombre_estudiante'] . "</td>";
        echo "<td>" . $row['apeido'] . "</td>";
        echo "<td>" . $row['telefono'] . "</td>";
        echo "<td>" . $row['fecha_nac'] . "</td>";

        $sexo = $row['genero'];
        if ($sexo == "M") {
            $sexo2 = "Masculino";
        } else {
            $sexo2 = "Femenino";
        }

        echo "<td>" . ($sexo2) . "</td>";
        echo "<td>" . $row['direccion'] . "</td>";
        echo "<td>" . $row['correo'] . "</td>";
        echo "<td>" . $row['nombre_carrera'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    $conn = null;
    ?>
</body>

</html>