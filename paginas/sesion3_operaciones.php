<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mi primer PHP</title>
</head>
<body>
    <h1>Operaciones Basicas en PHP</h1>
    <?php
    //en php la suma es con uso de +
    //SUMA
    $num1 = 9;
    $num2 = 3;
    $result = ($num1 + $num2);
    echo "El resultado de la suma es: " . $result;
    echo "<br />";
    echo "El resultado de sumar $num1 mas $num2 es: $result";
    echo "<br /><br />";

    //RESTA
    $result = ($num1 - $num2);
    echo "El resultado de la resta es: " . $result;
    echo "<br />";
    echo "El resultado de restar $num1 menos $num2 es: $result";
    echo "<br /><br />";

    //DIVISION
    $result = ($num1 / $num2);
    echo "El resultado de la division es: " . $result;
    echo "<br />";
    echo "El resultado de dividir $num1 entre $num2 es: $result";
    echo "<br /><br />";

    //MULTIPLICACION
    $result = ($num1 * $num2);
    echo "El resultado de la multiplicación es: " . $result;
    echo "<br />";
    echo "El resultado de multiplicar $num1 por $num2 es: $result";
    echo "<br /><br />";

    echo "<h4>Jonathan Jesus Diaz Jimenez<h4>";

    date_default_timezone_set('America/Mexico_City');

    $hoy = date("Y-m-d H:i:s"); 
    echo "<h4>FECHA $hoy <h4>";

    ?>
    
</body>
</html>