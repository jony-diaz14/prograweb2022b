<?php
// Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conn_mysql_jonathan.php";

//Recuperamos los valores de las cajas de texto y de los demás objetos de formulario
//Como los valores vienen desde un FORMULARIO web, se debe usar la supervariable de PHP -- $_POST[ ];
$idCarrera = $_POST["txtcodigo_oculto"];
// $idCarrea = (int)$idCarrea;
//Se convierte a MAYUSCULAS usando la función  strtoupper()
$nombre = trim($_POST["txtnombre"]);
$cordi = trim($_POST["txtcordi"]);
$nomUni = strtoupper(trim($_POST["txtuni"]));

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

    <style type="text/css" media="screen">
        body {
            background-color: #999;
        }

        #wrapper {
            margin: auto;
            width: 960px;
            height: 410px;
            background-color: #CCC;
        }

        #caja1 {
            width: 300px;
            height: 50px;
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 10px;
            background-color: #FFC;
            float: left;
        }

        #caja2 {
            width: 300px;
            height: 50px;
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 10px;
            background-color: #FFC;
            float: left;
        }

        #caja3 {
            width: 300px;
            height: 50px;
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 10px;
            background-color: #FFC;
            float: left;
        }

        #caja4 {
            width: 940px;
            height: 330px;
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 40px;
            background-color: #333;
            clear: both;

            position: relative;
            top: 10px;
        }

        #imagen1 {
            position: relative;
            top: 10px;
            right: -10px;
        }

        #texto1 {
            width: 500px;
            height: 290px;
            margin-left: 5px;
            margin-right: 10px;
            margin-top: 10px;
            background-color: #CCC;
            padding: 5px;
            float: right;
            right: -10px;
            top: 10px;
        }
    </style>

</head>

<body>

    <div id="wrapper">

        <div id="caja1">Licenciatura en Tecnologías de la Información</div>
        <div id="caja2">Programación web</div>
        <div id="caja3">Formulario de tabla de carreras modificado en una pagina web hacia MySQL</div>

        <div id="caja4">
            <div id="texto1"><br>
                <p></p>

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
                        <a href="alta_tabla2_jonathand.php">REGISTRAR OTRA CARRERA</a>
                        <br />
                        <br />
                        <a href="reporte_editar_catalogojd.php">REPORTE GENERAL DE CARRERAS</a>
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