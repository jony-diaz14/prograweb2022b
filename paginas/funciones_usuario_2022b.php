<?php
//Recuperamos los valores de variables de página previa
//mediante variables SUPERGLOBALES de PHP
// Se recuperan con $_POST["  "];
$num = $_POST["BoxNumbers"];
$miNombre = $_POST["txtjesus"];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcion Usuario Practica Tarea 5</title>
</head>

<body>
<div align='center'>
        <table width = 90% border="1">
        <?php

        function Mitabla($num){
            for ($i = 1; $i <= $num; $i++){
                echo "<tr>";
                echo "<td align = 'center'>" . $num . "</td>";
                echo "<td align = 'center'>" . $num . "</td>";
                echo "<td align = 'center'>" . $num . "</td>";
                echo "</tr>";
            }

        }
        Mitabla($num);
        echo "<br /><br />";
        echo "<h3>Este reto lo programo: " . $miNombre . "</h3>";
        echo "<br />";

        ?>
        </table>
        </div>
</body>
</html>