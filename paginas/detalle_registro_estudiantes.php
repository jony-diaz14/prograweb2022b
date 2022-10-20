<?php
// Insertamos el código PHP donde nos conectamos a la base de datos
require_once "conn_mysql2.php";
$result;
// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET y lo almacenamos en una variable
$idestudiante = $_GET["id"];
// Conversión de CARACTER a ENTERO mediante el forzado de (int)
// *los valores por GET son tipo STRING*
$idestudiante = (int)$idestudiante; 
//Verificamos que SI VENGA el codigo del estudiante
if ($idestudiante == "") {
    header("Location: estudiante_no_encontrado.php"); //Este archivo lo tienes que generar 
    exit;
}
if (is_null($idestudiante)) {
    header("Location: estudiante_no_encontrado.php"); //Este archivo lo tienes que generar 
    exit;
}
if (!is_int($idestudiante)) {
    header("Location: estudiante_no_encontrado.php"); //Este archivo lo tienes que generar 
    exit;
}

// Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
$sql = 'SELECT E.codigo, E.nombre_estudiante, E.apeido,E.telefono, E.fecha_nac,E.genero, E.direccion, E.correo, C.nombre_carrera FROM estudiantes E ';
$sql3 = $sql . 'INNER JOIN carrera C ON E.id_carrera = C.id_carrera WHERE E.codigo=' . $idestudiante;


// Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
$result = $conn->query($sql3);

// Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
$rows = $result->fetchAll();
// El resultado se mostrará en la página, en el BODY ***************************************************
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Reporte de PHP conectado a MySQL</title>
    <link href="../css/reporte_general.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
    <h2>Reporte de detalle del empleado seleccionado</h2>
    <div align="center">
        <table border="1" width="90%">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Apeido</th>
                    <th>telefono</th>
                    <th>Genero</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Direccion</th>
                    <th>Correo</th>
                    <th>Nombre de la Carrera</th>

                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($rows as $row) {
                    //Imprimimos en la página EL UNICO REGISTRO de MySQL en un renglon de HTML
                ?>
                    <tr>
                        <td><?php echo $row['codigo']; ?></td>
                        <!-- Creamos una celda con un enlace HTML que apunta a otro archivo PHP -->
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
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>

                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><a href="reporte_general_jonathand2.php">
                            <<< --- Regresar al reporte completo </a>
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>

                </tr>
            </tbody>
        </table>
    </div>

    <?php
    //Cerramos la oonexion a la base de datos **********************************************
    $conn = null;
    ?>

    <br />
    <br />

</body>

</html>