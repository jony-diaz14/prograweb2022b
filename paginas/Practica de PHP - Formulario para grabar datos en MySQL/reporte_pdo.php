<?php
//Insertamos el código PHP donde nos conectamos a la base de datos *********************
require_once "conexion.php";
$result;
// Escribimos la consulta para recuperar los registros de la tabla de MySQL
//$sql = 'SELECT * FROM empleados';
$sql = 'SELECT E.numero, E.nombre, E.salario, E.categoria, E.sexo, D.descripcion FROM empleados E ';
$sql2 = $sql . 'INNER JOIN departamentos D ON E.departamento = D.departamento';
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
    <meta charset="utf-8">
    <title>Reporte de PHP conectado a MySQL</title>
</head>

<body>
    <h2>Reporte de la tabla de MySQL en tabla de HTML</h2>
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
                    //Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
                ?>
                    <tr>
                        <td><?php echo $row['numero']; ?></td>
                        <td>
                            <a href="detalle_empleado.php?id=<?php echo $row['numero']; ?>">
                                <?php echo $row['nombre']; ?>
                            </a>
                    </td>

                        <td><?php echo $row['salario']; ?></td>
                        <td><?php echo $row['categoria']; ?></td>
                        <td><?php echo $row['sexo']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <h2>Jonathan Jesus Diaz Jimenez</h2>
    </div>

    <?php
    //Cerramos la oonexion a la base de datos 
    $conn = null;
    ?>

</body>

</html>