<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones con parárametros en PHP</title>

    <?php
    function saludo($nombre)
    {
        echo "Buenos dias " . $nombre;
        echo "<br />";
    }
    ?>
    <?php
    function saludoPersonalizado($param1,$param2)
    {
        if($param1 >= 1 && $param1 <=11){
            echo "Buenos dias". $param2 . "<br /><br />";
        }else{
            echo "Tus valores están fuera del parametro />";
        }
        }
    ?>

</head>

<body>

    <h1>ESto se ve en Pantalla</h1>
    <br />
    <?php
    saludo("Batman");
    saludo("Superman");
    
    saludoPersonalizado(9,"Batman");
    saludoPersonalizado(20,"Superman");
    
    ?>

</body>

</html>