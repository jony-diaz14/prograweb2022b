<?php
//ESTE REPORTE ES PARA LA TABLA RELACIONADA-ESTUDIANTES
//Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conn_mysql_jonathan.php";
$result;
// Escribimos la consulta para recuperar los registros de la tabla de MySQL
$sql = 'SELECT E.codigo, E.nombre_estudiante, E.apeido,E.telefono, E.fecha_nac,E.genero, E.direccion, E.correo, C.nombre_carrera FROM estudiantes E ';
$sql2 = $sql . 'INNER JOIN carrera C ON E.id_carrera = C.id_carrera';
// Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
$result = $conn->query($sql2);
// Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
$rows = $result->fetchAll();
// Los valores que tendrá la variable $rows se organizan en un arreglo asociativo
// (Variable con varias valores)
// y se usará un ciclo foreach para recuper los valores uno a uno de ese arreglo
// El resultado se mostrará en una tabla HTML 
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Reporte de PHP conectado a MySQL</title>
    <link href="../css/reporte_general.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
    <div>

        <h2>Reporte de la tabla de MySQL en tabla de HTML</h2>
        <div align="center">
            <table border="1" width="90%">
                <thead>
                    <tr>
                        <!-- estos son los titulos de la primera fila de la tabla HTML -->
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
                        //Tenemos que tener mucho cuidado de llamar las tablas con exactamente el mismo nombre de la Base de Datos
                    ?>
                        <tr>
                            <td><?php echo $row['codigo']; ?></td>
                            <td>
                                <a href="detalle_registro_estudiantes.php?id=<?php echo $row['codigo']; ?>">
                                    <?php echo $row['nombre_estudiante']; ?>
                                </a>
                            </td>
                            <td><?php echo $row['apeido']; ?></td>
                            <td><?php echo $row['telefono']; ?></td>
                            <!-- <td><?php echo $row['genero']; ?></td> -->
                            <?php
                            $genero = $row['genero'];
                            if ($genero == "M") {
                                $sexo2 = "Masculino";
                            } else {
                                $sexo2 = "Femenino";
                            }
                            ?>
                            <td><?php echo ($sexo2); ?></td>
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
        //Cerramos la oonexion a la base de datos, limpiamos memoria
        $conn = null;
        ?>
        <br />
        <a id="carrera" href="reporte_general_jonathand1.php" >REPORTE GENERAL DE CARRERA</a>
        <br />
        <a id="estudiante" href="alta_tabla2_jonathand.php">REGISTRAR ESTUDIANTE</a>
        <br />
        <a id="carrera" href="alta_tabla1_jonathand.php">REGISTRAR CARRERA</a>
    </div>
</body>

</html>