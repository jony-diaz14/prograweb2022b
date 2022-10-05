<?php
// delcaracion de las 4 variables para la conexion de la base de date_offset_get
// $servername = "fdb33.atspace.me";      // *****servidor donde esta la BD
// $username ="3914247_prograweb2022";              // *****Usuario para entrar a la BD
// $password ="140120jd";           // *****Contraseña para entrar a la BD
// $BasedeDatos = "3914247_prograweb2022";     // ***** Nombre de la BD

$servername = "localhost";      // *****servidor donde esta la BD
$username ="3914247_prograweb2022";              // *****Usuario para entrar a la BD
$password ="140120jd";           // *****Contraseña para entrar a la BD
$BasedeDatos = "3914247_prograweb2022";     // ***** Nombre de la BD
// En un bloque try, escribimos la linea de conexion
try {
    /*
    Creamos la variable de $con que usaremos en todo el proyecto web
    En esat linea se usan 4 variables de la conexion a la BD
    PDO significa PHP DATA OBJECTS y es para conectarse a la BD
    */
    $con = new PDO("mysql:host=$servername;dbname=$BasedeDatos",$username,$password);
    // asignamos los atributos de conexion
    $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // imprimimos en pantalla en caso de que si se pueda conectar a la BD
    //echo "<div align = 'center'><h1>Si me conecte</h1></div>";
    //echo "<div align = 'center'><h3>Jonathan Jesus Diaz Jimenez</h3></div>";
} 
catch (PDOException $e) {
    // Imprimimos en pantalla en caso de que no se pueda conectar a la BD
    echo "<div align = 'center'><h1>No me conecte, vuelve a intentar</h1></div>".$e->getMessage();
}
?>