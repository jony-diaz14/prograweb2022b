<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sentencia IF</title>
</head>

<body>
    <?php

    $contenedor = "noche";

    if ($contenedor == "noche") // <---- Esto es TRUE o FALSE
    {
        //Se ejecuta si es verdadero **************
        $saludo = "Buenos días mortal !!!";
        echo ("<marquee>" . $saludo . "</marquee>");
    } else { // <--- Esto se ejecuta si es FALSO lo del paréntesis ( )

        $saludo = "No te quiero saludar !!!!!!";
        echo ("<marquee>" . $saludo . "</marquee>");
    }
    // Enciende el WAMP Server
    // Abre el navegador web (Firefox)
    // Visualiza la práctica en
    // http://localhost/prograweb2020b/paginas/if.php

    ?>
</body>

</html>