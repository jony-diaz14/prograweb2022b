<?php
//Inicializamos el uso de las sesiones 
session_start();
if ($_SESSION["validado"] != "true"){
    //Redireccionamos a la página de firma de usuarios (LOGIN)
	echo'<script type="text/javascript">
        alert("ERROR!! LOGUEATE");
        window.location.href="../index_jesus.php";
        </script>';
    // header("Location: ../index_jesus.php");
    exit;
}
if ($_SESSION["tipo_usuario"] == 2) {
    //Redireccionamos a la página de firma de usuarios (LOGIN)
	echo'<script type="text/javascript">
        alert("ERROR!! tipo de usuario no valido");
        window.location.href="../index_jesus.php";
        </script>';
    //header("Location: ../index_jesus.php");
    exit;
}
?>
<?php
// Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conn_mysql_jonathan.php";
// a
//Recuperamos los valores de las cajas de texto y de los demás objetos de formulario
//Como los valores vienen desde un FORMULARIO web, se debe usar la supervariable de PHP -- $_POST[ ];
$idCarrera = $_POST["txtcodigo_oculto"];
// $idCarrea = (int)$idCarrea;
//Se convierte a MAYUSCULAS usando la función  strtoupper()
$nombre = trim($_POST["txtnombre"]);
$cordi = trim($_POST["txtcordi"]);
$nomUni = ($_POST["combo_uni"]);

// Escribimos la consulta para ACTUALIZAR LOS DATOS EN LA TABLA de Carreras (PDO)
// Debido a que en esta tabla los 2 campos son de tipo STRING se encierran en '' las 2 variables de PHP
// Al ser una sentecia UPDATE de SQL es OBLIGATORIO usar la sentecia WHERE apuntando al campo Llave Primario
$sqlUPDATE = "UPDATE carrera SET nombre_carrera = '$nombre', coordinador = '$cordi', nom_uni = '$nomUni'
WHERE id_carrera= $idCarrera";

// Ejecutamos la sentencia UPDATE de SQL a partir de la conexión usando PDO 
// mediante la propiedad "EXEC" de la linea de conexión ***************************

$conn->exec($sqlUPDATE);
$mensaje = "CARRERA ACTUALIZADA SATISFACTORIAMENTE";
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Actualización de Carreras desde PHP hacia MySQL</title>
    <link href="../css/editarc3.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="icon" href="/imagenes/update.png" type="image/x-icon">

    <!-- <style type="text/css" media="screen">
    </style> -->

</head>

<body>

    <div id="wrapper">

        <div id="caja1">Licenciatura en Tecnologías de la Información</div>
        <div id="caja2">Programación web</div>
        <div id="caja3">Datos de la tabla Carrera modificado en una paginas Web</div>

        <div id="caja4">
            <div id="texto1"><br>

                <fieldset style="width: 90%;">
                    <legend><?php echo ($mensaje); ?></legend>
                    <div>
                        <br />
                        <b>Código de Carrera:</b> <?php echo ($idCarrera); ?>
                        <br />
                        <br />
                        <b>Nombre de la Carrera:</b> <?php echo ($nombre); ?>
                        <br />
                        <br />
                        <b>Nombre del Cordi:</b> <?php echo ($cordi); ?>
                        <br />
                        <br />
                        <b>Nombre de la Uni:</b> <?php echo ($nomUni); ?>
                        <br />
                        <br />
                        <a href="alta_tabla1_jonathand.php">REGISTRAR OTRA CARRERA</a>
                        <br />
                        <br />
                        <a href="reporte_editar_catalogojd.php">REPORTE DE CARRERAS</a>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <?php
    //Cerramos la conexion a la base de datos *************************************
    $conn = null;
    ?>
</body>

</html>