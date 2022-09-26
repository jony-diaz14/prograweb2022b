<?php
//Insertamos el código PHP donde nos conectamos a la base de datos *********************
require_once "conn_mysql2.php";
$result;
// Escribimos la consulta para recuperar los registros de la tabla de MySQL
//$sql = 'SELECT * FROM empleados';
$sql = 'SELECT E.codigo, E.nombre_estudiante, E.apeido,E.telefono, E.fecha_nac,E.genero, E.direccion, E.correo, C.nombre_carrera FROM estudiantes E ';
$sql2 = $sql . 'INNER JOIN carrera C ON E.id_carrera = C.id_carrera';
// Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
$result = $conn->query($sql2);
// Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
$rows = $result->fetchAll();
// Los valores que tendrá la variable $rows se organizan en un arreglo asociativo
// (Variable con varias valores)
// y se usará un ciclo foreach para recuper los valores uno a uno de ese arreglo
// El resultado se mostrará en una tabla HTML ********************************************
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Reporte de PHP conectado a MySQL</title>
</head>

<body>
    <h2>Reporte de la tabla de MySQL en tabla de HTML</h2>
    <div align="center">
        <table border="1" width="90%">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>apeido</th>
                    <th>telefono</th>
                    <th>genero</th>
                    <th>fecha de nacimiento</th>
                    <th>direccion</th>
                    <th>correo</th>
                    <th>nombre de la carrera</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($rows as $row) {
                    //Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
                ?>
                    <tr>
                        <td><?php echo $row['codigo']; ?></td>
                        <td>
                            <a href="detalle_registro.php?id=<?php echo $row['codigo']; ?>">
                                <?php echo $row['nombre_estudiante']; ?>
                            </a>
                    </td>

                        <td><?php echo $row['apeido']; ?></td>
                        <td><?php echo $row['telefono']; ?></td>
                        <td><?php echo $row['genero']; ?></td>
                        <td><?php echo $row['fecha_nac']; ?></td>
                        <td><?php echo $row['direccion']; ?></td>
                        <td><?php echo $row['correo']; ?></td>
                        <td><?php echo $row['nombre_carrera']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
    //Cerramos la oonexion a la base de datos 
    $conn = null;
    ?>

</body>

</html>