<?php
//Insertamos el código PHP donde nos conectamos a la base de datos *******************************
require_once "conexion.php";
$result;
// Escribimos la consulta para recuperar los registros de la tabla de MySQL
//$sql = 'SELECT * FROM programa';
//$sql = 'SELECT * id_programa, id_televisora, nombre_programa, horario, clasificacion ,num_canal';
$sql = 'SELECT P.id_televisora,P.id_programa,P.nombre_programa,P.horario,P.clasificacion,P.num_canal, T.nombre_televisora, T.id_televisora  FROM programa P INNER JOIN televisora T ON P.id_televisora = T.id_televisora';

// Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
$result = $conn->query($sql);

// Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
$rows = $result->fetchAll();

// Los valores que tendrá la variable $rows se organizan en un arreglo asociativo
// (Variable con varias valores)
// y se usará un ciclo foreach para recuper los valores uno a uno de ese arreglo
// El resultado se mostrará en una tabla HTML ***************************************************
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
                    <th>ID del programa</th>
                    <th>Nombre del Programa</th>
                    <th>Nombre de la Televisora</th>
                    <th>horario</th>
                    <th>clasificacion</th>
                    <th>canal</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($rows as $row) {
                    //Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
                ?>
                    <tr>
                        <td><?php echo $row['id_programa']; ?></td>
                        <!-- Creamos una celda con un enlace HTML que apunta a otro archivo PHP -->
                        <td>

                            <a href="alta_tabla1_daniela.php?id=<?php echo $row['id_programa']; ?>">
                                <?php echo $row['nombre_programa']; ?>
                            </a>

                        </td>

                        <td><?php echo $row['nombre_televisora']; ?></td>
                        <td><?php echo $row['horario']; ?></td>
                        <td><?php echo $row['clasificacion']; ?></td>
                        <td><?php echo $row['num_canal']; ?></td>


                    </tr>
                <?php } ?>

                <br />
                <br />
                <a href="alta_tabla1_daniela.php" id="">Regresar para poder registrar otro programa</a>
                <br />
                <br />
            </tbody>
        </table>
    </div>

    <?php
    //Cerramos la oonexion a la base de datos **********************************************
    $conn = null;


    ?>

</body>

</html>