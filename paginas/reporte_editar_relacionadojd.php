<?php
//Insertamos el codigo PHP donde nos conectamos a la base de datos 
require_once "conn_mysql_jonathan.php";
// Escribimos la consulta para recuperar los registros de la tabla de MySQL
$sql = 'SELECT E.codigo, E.nombre_estudiante, E.apeido,E.telefono, E.fecha_nac,E.genero, E.direccion, E.correo, C.nombre_carrera FROM estudiantes E
INNER JOIN carrera C ON E.id_carrera = C.id_carrera';

// Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
$result = $conn->query($sql);

// Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
$rows = $result->fetchAll();

?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Regitro de registros a eliminar</title>
    <link href="../css/editarc1.css" rel="stylesheet" type="text/css" media="screen">
	<link rel="icon" href="/imagenes/eliminar_r.png" type="image/x-icon">

    <!-- <style type="text/css" media="screen">
    </style> -->
    <script language="javascript">
        function eliminar_estudiante(idestudiante) {
            if (confirm("¿Estás seguro de eliminar esta carrera con codigo: " + idestudiante + "?") == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>

</head>

<body>

    <div id="wrapper">

        <div id="caja1">Licenciatura en Tecnologías de la Información</div>
        <div id="caja2">Programación web</div>
        <div id="caja3">Reporte de los registros Estudiantes para ser Actualizados en linea</div>

        <div id="caja4">
            <div id="texto1"><br>

                <table border="1" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Codigo Estudiante</th>
                            <th>Nombre</th>
                            <th>Apeido</th>
                            <th>Carrera</th>
                            <th>Eliminar</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($rows as $row) {
                            //Imprimimos en la pagina un renglon de tabla HTML por cada registro de tabla de MySQL
                        ?>
                            <tr>
                                <td><?php echo $row['codigo']; ?></td>
                                <td><?php echo $row['nombre_estudiante']; ?></td>
                                <td><?php echo $row['apeido']; ?></td>
                                <td><?php echo $row['nombre_carrera']; ?></td>
                                <!-- <?php
                                $sexo = $row['genero'];
                                if ($sexo == "M") {
                                    $sexo2 = "Masculino";
                                } else {
                                    $sexo2 = "Femenino";
                                }
                                ?> -->
                                <!-- <td><?php echo ($sexo2); ?></td>
                                <td><?php echo $row['direccion']; ?></td> -->


                                <!-- CELDA 1 para la ilga de BORRAR -->
                                <td><a onClick="return eliminar_estudiante(<?php echo $row['codigo']; ?>);"
                                href="eliminar_registro.php?id=<?php echo $row['codigo']; ?>">
                                        eliminar
                                    </a>
                                </td>

                                <!-- CELDA 2 para la ilga de EDITAR -->
                                <td><a href="editar_registro_relacionado.php?id=
                                <?php echo $row['codigo'];?>">
                                        editar
                                    </a>
                                </td>


                            </tr>

                        <?php } ?>

                        <tr>
                            <td colspan="8">&nbsp;</td>
                        </tr>
                        <tr>
                            <td><a href="reporte_general_jonathand2.php">Rerporte General Estudiantes</a></td>
                            <td><a href="alta_tabla2_jonathand.php">Agregar otro Estudiante</a></td>
                            <td>&nbsp;</td>
                            <td colspan="5">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    //Cerramos la oonexion a la base de datos **********************************************
    $conn = null;
    ?>
</body>

</html>