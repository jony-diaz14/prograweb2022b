<?php
// Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conn_mysql_jonathan.php";
// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET
$idestudiante = $_GET["id"];
// Conversión de CARACTER a ENTERO mediante el forzado de (int) ya quelos valores por GET son tipo STRING
$idestudiante = (int)$idestudiante; 
// Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por GET
$sql = 'SELECT E.codigo, E.nombre_estudiante, E.apeido,E.telefono, E.fecha_nac,E.genero, E.direccion, E.correo, C.nombre_carrera, C.nom_uni
FROM estudiantes E INNER JOIN carrera C ON E.id_carrera = C.id_carrera WHERE E.codigo=' . $idestudiante;
// Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
$result = $conn->query($sql);
// Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
$rows = $result->fetchAll();
// El resultado se mostrará en la página, en el BODY 
// Escribimos la consulta para eliminar el registro de la tabla de la base de datos MySQL 
$sqlBorrar = "DELETE From estudiantes WHERE codigo=" . $idestudiante;
// Ejecutamos la sentencia DELETE de SQL a partir de la conexión usando PDO 
$conn->exec($sqlBorrar);
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Regitro de estudiantes a eliminar</title>
    <link href="../css/reporte_borrar_registro.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="icon" href="/imagenes/eliminar_r.png" type="image/x-icon">

    <!-- <style type="text/css" media="screen">
    </style> -->

</head>

<body>

    <div id="wrapper">

        <div id="caja1">Licenciatura en Tecnologías de la Información</div>
        <div id="caja2">Programación web</div>
        <div id="caja3">Datos del Estudiante que se ha eliminado Correctamente</div>

        <div id="caja4">
            <div id="texto1"><br>
                <h2>Registro eliminado correctamente</h2>

                <table border="1" width="100%">
                    <thead>
                    <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Apeido</th>
                            <th>Telefono</th>
                            <th>Genero</th>
                            <th>Fecha de nacimiento</th>
                            <th>Direccion</th>
                            <th>Correo</th>
                            <th>Nombre de la carrera</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($rows as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row['codigo']; ?></td>
                                <td><?php echo $row['nombre_estudiante']; ?></td>
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

                            <td colspan="9">&nbsp;</td>

                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><a href="reporte_borrar_jonathand2.php">
                                    Regresar al reporte borrar Estudiantes </a>
                            </td>
                            <td>&nbsp;</td>
                            <td><a href="reporte_general_jonathand2.php">
                                    Regresar al reporte general Estudiantes </a>
                            </td>
                            <td>&nbsp;</td>
                            <th><a href="alta_tabla2_jonathand.php">Agregar otro Estudiante</a></th>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
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