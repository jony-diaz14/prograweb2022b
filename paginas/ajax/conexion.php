<?php
    //Declaramos las 4 variables para la conexión a la Base de Datos
    $servername = "localhost";  // ------ Servidor donde está la BD
    $username = "root";         // ------ Usuario para entrar a la BD
    $password = "";      // ------ Password para entrar a la BD
	$BasedeDatos = "prograweb22"; // ------ Nombre de tu base de datos
try {
    $conn = new PDO("mysql:host=$servername;dbname=$BasedeDatos", $username, $password);
	// Asignamos los atributos de conexión *********************************
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {	
	//Imprimimos en pantalla cuando NO nos pudimos conectar a la Base de Datos
    //echo "<div align='center'><h1>Nooooo me conecte: </h1></div> " . $e->getMessage();
    }
?>