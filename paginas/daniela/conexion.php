<?php
// delcaracion de las 4 variables para la conexion de la base de date_offset_get
$servername = "localhost";      // ***servidor donde esta la BD
$username ="root";              // ***Usuario para entrar a la BD
$password ="";           // ***Contraseña para entrar a la BD
$BasedeDatos = "televisora22";     // *** Nombre de la BD
// En un bloque try, escribimos la linea de conexion
try {
    /*
    Creamos la variable de $con que usaremos en todo el proyecto web
    En esat linea se usan 4 variables de la conexion a la BD
    PDO significa PHP DATA OBJECTS y es para conectarse a la BD
    */
    $conn = new PDO("mysql:host=$servername;dbname=$BasedeDatos",$username,$password);
    // asignamos los atributos de conexion
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // imprimimos en pantalla en caso de que si se pueda conectar a la BD
    echo "<div align = 'center'><h1>Si me conecte</h1></div>";
    echo "<div align = 'center'><h3>Daniela</h3></div>";
} 
catch (PDOException $e) {
    // Imprimimos en pantalla en caso de que no se pueda conectar a la BD
    echo "<div align = 'center'><h1>No me conecte, vuelve a intentar</h1></div>".$e->getMessage();
}
?>