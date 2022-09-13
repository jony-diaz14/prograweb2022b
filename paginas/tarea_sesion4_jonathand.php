<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link href="../css/tarea_sesion4.css" rel="stylesheet" type="text/css" media="screen">
    <title>Página web dinamica de la sesion 4</title>
</head>

<body>
    <div align='center'>

        <h1>Práctica Web Sesión 4</h1>
        <h3>Jonathan Jesus Díaz Jimenez</h3>

        <?php

        $num = 1;

        echo "<table border = 2, width = 80%>";
        echo "<tr>";
        echo "<th align='center'> Numero </th>";
        echo "<th align='center'> Cuadrado del numero</th>";
        echo "<th align='center'>Si es Par o Impar</th>";
        echo "</tr>";

        do {
            $cuadrado = $num * $num;
            echo "<tr>";
            echo "<td align='center'>" . $num . "</td>";
            echo "<td align='center'>" . $cuadrado . "</td>";

            if ($num % 2 == 0) {
                echo "<td>Es par</td>";
            } else {
                echo "<td>Es impar</td>";
            }
            echo "</tr>";
            $num++;
        } while ($num <= 200);

        echo "</table>"
        
        ?>
    </div>
</body>

</html>