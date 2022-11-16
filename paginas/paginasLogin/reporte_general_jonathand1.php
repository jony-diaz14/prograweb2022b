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
//ESTE REPORTE ES PARA LA TABLA CATALOGO-CARRERA
// ***********************************************
//Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conn_mysql_jonathan.php";
$result;
// Escribimos la consulta para recuperar los registros de la tabla de MySQL
$sql = 'SELECT * FROM carrera';
// Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
$result = $conn->query($sql);
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
    <link rel="icon" href="/imagenes/registro1.png" type="image/x-icon">
</head>

<body>
<div>

    <h2>Reporte de la tabla de MySQL en tabla de HTML</h2>
    <div align="center">
        <table border="1" width="90%">
            <thead>
                <tr>
                    <!-- estos son los titulos de la primera fila de la tabla HTML -->
                    <th>Codigo de la Carrera</th>
                    <th>Nombre de la Carrera</th>
                    <th>Nombre del Coordinador</th>
                    <th>Nombre de la Universidad</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($rows as $row) {
                    //Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
                    //Tenemos que tener mucho cuidado de llamar las tablas con exactamente el mismo nombre de la Base de Datos
                ?>
                    <tr>
                        <td><?php echo $row['id_carrera']; ?></td>
                        <td><?php echo $row['nombre_carrera']; ?></td>
                        <td><?php echo $row['coordinador']; ?></td>
                        <td><?php echo $row['nom_uni']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
    //Cerramos la Coonexion a la base de datos, limpiamos memoria
    $conn = null;
    ?>
    <br />
							<a id="carrera" href="reporte_editar_catalogojd.php" >REPORTE EDITAR/BORRAR CARRERAS</a>
							<a id="estudiante" href="reporte_general_jonathand2.php" >REPORTE GENERAL DE ESTUDIANTES</a>
							<a id="estudiante" href="alta_tabla2_jonathand.php">REGISTRAR ESTUDIANTE</a>
							<a id="carrera" href="alta_tabla1_jonathand.php">REGISTRAR CARRERA</a>
                            <a id="carrera" href="reporte_editar_relacionadojd.php" >REPORTE EDITAR/BORRAR ESTUDIANTES</a>
                            <!-- <a id="carrera" href="reporte_borrar_jonathand2.php">ELIMINAR ESTUDIANTE</a> -->

</div>
</body>

</html>