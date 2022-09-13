<!DOCTYPE html> <html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 3: Operaciones con PHP</title>
</head>

<body>
    <?php
    //Declaracion de variables además, se les asigna un valor
    $operador1 = 58;
    $operador2 = 46;
    echo "<h3>número 1 = $operador1</h3>";
    echo "<h3>número 2 = $operador2</h3>";

    //OPERACIÓNES
    //SUMA
    echo "<h4> La suma de esos 2 número es: " . ($operador1 + $operador2) . "</h4>";
    echo "------------------------------------------------------";

    //RESTA
    echo "<h4> La resta de esos 2 número es: " . ($operador1 - $operador2) . "</h4>";
    echo "------------------------------------------------------";


    //MULTIPLICACION
    echo "<h4> La multiplicación de esos 2 número es: " . ($operador1 * $operador2) . "</h4>";
    echo "------------------------------------------------------";

    //DIVISION
    echo "<h4> La divivsión de esos 2 número es: " . ($operador1 / $operador2) . "</h4>";
    echo "------------------------------------------------------<br />";
    echo "------------------------------------------------------<br />";


    //Declarando una variable con mi nombre
    $miNombre = "Jonathan Jesus";

    //Función que diga la longitud del nombre y la imprime, y este tambien cuenta los espacios
    echo $miNombre;
    echo "<h4>Mi nombre tiene " . strlen($miNombre) . " caracteres.</h4>";
    //Función para contar el numero de palabras e imprimir cuantas son
    echo "<h4>Hay ".str_word_count($miNombre, 0). " palabras en mi nombre.</h4>";
    //Función para escribir el nombre de manera Inversa
    echo "<h4>". strrev($miNombre). "</h4>";
    //Función para buscar texto especifico dentro de más texto, en este caso es la "a"
    //Recordemos también que las posiciones no inician en 1, si no en 0, es por ello que se encuentra en la posición 3
    //J-0 O-1 N-2 A-3
    echo "<h4> La letra 'a' se encuentra en la posición número.... " . strpos($miNombre, "a", 0). "</h4>";
    //Reemplazar texto en especifico. Remplazar la "a" por la "z"
    echo str_replace("a", "z", $miNombre);

    //Para el final imprimir la fecha y la hora
    date_default_timezone_set('America/Mexico_City');
    $hoy = date("Y-m-d H:i:s");
    echo "<h4>FECHA $hoy <h4>";


    ?>
</body>

</html>