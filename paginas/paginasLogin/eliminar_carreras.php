<?php
//Inicializamos el uso de las sesiones 
session_start();
if ($_SESSION["validado"] != "true") {
    //Redireccionamos a la página de firma de usuarios (LOGIN)
    header("Location: ../index.php");
    exit;
}
if ($_SESSION["tipo_usuario"] == 2) {
    //Redireccionamos a la página de firma de usuarios (LOGIN)
    header("Location: ../index.php");
    exit;
}
// Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conn_mysql_jonathan.php";
// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET
$idcarrera = $_GET["id"];
// Conversión de CARACTER a ENTERO mediante el forzado de (int) ya quelos valores por GET son tipo STRING
$idcarrera = (int)$idcarrera; 
// Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por GET
$sql = 'SELECT * FROM carrera WHERE id_carrera =' . $idcarrera;
// Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
$result = $conn->query($sql);
// Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
$rows = $result->fetchAll();
// El resultado se mostrará en la página, en el BODY 
// Escribimos la consulta para eliminar el registro de la tabla de la base de datos MySQL 
$sqlBorrar = "DELETE From carrera WHERE id_carrera=" . $idcarrera;
// Ejecutamos la sentencia DELETE de SQL a partir de la conexión usando PDO 
$conn->exec($sqlBorrar);
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Regitro de Carreras a eliminar</title>
    <link href="../css/reporte_borrar_registro.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="icon" href="/imagenes/eliminar_r.png" type="image/x-icon">

    <!-- <style type="text/css" media="screen">
    </style> -->

</head>

<body>

    <div id="wrapper">

        <div id="caja1">Licenciatura en Tecnologías de la Información</div>
        <div id="caja2">Programación web</div>
        <div id="caja3">Datos de la Carrera que se ha eliminado Correctamente</div>

        <div id="caja4">
            <div id="texto1"><br>
                <h2>Registro eliminado correctamente</h2>

                <table border="1" width="100%">
                    <thead>
                    <tr>
                            <th>Codigo de Carrera</th>
                            <th>Nombre de Carrera</th>
                            <th>Coordinador</th>
                            <th>Universidad</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($rows as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row['id_carrera']; ?></td>
                                <td><?php echo $row['nombre_carrera']; ?></td>
                                <td><?php echo $row['coordinador']; ?></td>
                                <td><?php echo $row['nom_uni']; ?></td>
                            </tr>
                        <?php } ?>
                        <tr>

                            <td colspan="4">&nbsp;</td>

                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><a href="reporte_editar_catalogojd.php">
                                    Regresar al reporte editar/borrar carreras </a>
                            </td>
                            <td>&nbsp;</td>
                            <td><a href="alta_tabla1_jonathand.php">Agregar otra Carrera</a></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><a href="reporte_general_jonathand1.php">
                                    Regresar al Reporte General</a></td>
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