<?php
//ESTA ES UNA PAGINA DE REPORTE PARA BORRAR ESTUDIANTES
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
// (Variable con varias valores) y se usará un ciclo foreach para recuper los valores uno a uno de ese arreglo
// El resultado se mostrará en una tabla HTML 
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Borrar Registro de Estudiantes</title>
    <link href="../css/reporte_borrar.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="icon" href="/imagenes/eliminar_r.png" type="image/x-icon">

    <!-- <style type="text/css" media="screen">
		
	</style> -->

    <script language="javascript">
        function eliminar_estudiante(idestudiante) {
            if (confirm("¿Estás seguro de eliminar este estudiante con codigo: " + idestudiante + "?") == true) {
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
        <div id="caja3">Reporte para borrar registros de la tabla estudiantes(PHP con PDP y MySQL)</div>

        <div id="caja4">
            <div id="texto1"><br>

                <table border="1" style="width:100%;">
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
                                    <a onClick="return eliminar_estudiante(<?php echo $row['codigo']; ?>);" href="eliminar_registro.php?id=<?php echo $row['codigo']; ?>">
                                        <?php echo $row['nombre_estudiante']; ?>
                                    </a>
                                </td>
                                <td><?php echo $row['apeido']; ?></td>
                                <td><?php echo $row['telefono']; ?></td>
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
                        <tr>
                            <th>&nbsp;</th>
                            <th><a href="alta_tabla2_jonathand.php">Agregar otro estudiante</a></th>
                            <th>&nbsp;</th>
                            <th><a href="reporte_general_jonathand1.php">Reporte general de carreras</a></th>
                            <th>&nbsp;</th>
                            <th><a href="alta_tabla1_jonathand.php">Agregar Carrera</a></th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
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