<?php
//Recuperamos los valores de variables de página previa
//mediante variables SUPERGLOBALES de PHP
// Se recuperan con $_POST["  "]; o con $_GET["  "];

/*
$NumeroEmpleado = $_POST["txtnumero"];
$NombreEmpleado = $_POST["txtnombre"];
$SxoEmpleado = $_POST["combo_sexo"];


if ($NumeroEmpleado == "") {

	$NumeroEmpleado = "No trae nada la caja de texto";
}
if ($NombreEmpleado == "") {

	$NombreEmpleado = "No pusiste el nombre de tu Empleado";
}

*/
$CodigoEmpleado = $_GET["idempleado"];
if ($CodigoEmpleado == "") {
	$CodigoEmpleado = "No se hizo clic en la liga";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcion Usuario:tabla</title>
</head>

<body>
<div align='center'>
        <table width = 90% border="1">
        <?php
        function Mitabla($renglones){
            for ($fila = 1; $fila <= $renglones; $fila++){
                echo "<tr>";
                echo "<td align = 'center'>" . $fila . "</td>";
                echo "</tr>";
            }
        }

        Mitabla(18);
        echo "<h3>Jonathan Jesus Diaz Jimenez</h3>";
        echo "<br />";
        date_default_timezone_set('America/Mexico_City');
        $hoy = date("Y-m-d H:i:s");
        echo "<h4>FECHA $hoy <h4>";
        ?>
        </table>
                    </fieldset>
                </div>
            </div>
        </div>
    
</body>
</html>