<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica sesion 4</title>
</head>
<body>
    <div align ="center">
        <table border ="2" width ="75%">
            <?php
            for ($cuad=1; $cuad<=10; $cuad++) { 
                echo "<tr>";
                echo "<td align='center'>". $cuad . "</td>";
                echo "<td align='center'><img src='../imagenes/". $cuad . ".jpg'></td>";
                echo "</tr>";

            }
            
            ?>
        </table>


    </div>
    
</body>
</html>