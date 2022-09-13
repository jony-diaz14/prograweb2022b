<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../css/tarea_sesion4.css" rel="stylesheet" type="text/css" media="screen">
    <title>Practica Web Sesion 5</title>
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
</body>
</html>