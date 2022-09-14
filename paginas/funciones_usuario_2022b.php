<?php
//Recuperamos los valores de variables de página previa, mediante variables SUPERGLOBALES de PHP
// Se recuperan con $_POST["  "];
$num = $_POST["BoxNumbers"];
$miNombre = $_POST["txtjesus"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Funcion Usuario Practica Tarea 5</title>
</head>
<body>
<div align='center'>
        <table align="center" border="1px" width = 90%>
        <?php

        function CrearTabla($num){
            for ($i = 1; $i <= $num; $i++){
                echo "<tr>";
                echo "<td align = 'center' style = 'background-color:#9ad051'>" . $num . "</td>";
                echo "<th >" . $num . "</td>";
                echo "<td align = 'center'  style = 'background-color:#9ad051'>" . $num . "</td>";
                echo "</tr>";
            }
        }
        CrearTabla($num);
        echo "<br /><br />";
        echo "<h3>Este reto de PHP lo programo: " . $miNombre . "</h3>";
        echo "<br />";
        ?>
        </table>
        </div>
</body>
</html>