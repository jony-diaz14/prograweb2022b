<?php
    //Declaramos las 4 variables para la conexión a la Base de Datos
    $servername = "localhost";  // ------ Servidor donde está la BD
    $username = "root";         // ------ Usuario para entrar a la BD
    $password = "";      // ------ Password para entrar a la BD
	$BasedeDatos = "restaurantes"; // ------ Nombre de tu base de datos
	
    //En un bloque try - catch escribimos la línea de conexión ************
	// Los bloques try - catch ya los viste en tus materias de programación
try {
	// Creamos la variable $conn que usaremos en todo el proyecto web
	// En esta línea de abajo se usan las 4 variables de la conexión a la BD
	// PDO significa PHP DATA OBJECTS y es para conectarnos a las bases de datos
    $conn = new PDO("mysql:host=$servername;dbname=$BasedeDatos", $username, $password);
	
	// Asignamos los atributos de conexión *********************************
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//Imprimimos en pantalla en caso de que si nos pudimos conectar a la Base de Datos
    echo "<div align='center'><h1>Si me conecte</h1></div>";
    }
	
catch(PDOException $e)
    {
		
	//Imprimimos en pantalla cuando NO nos pudimos conectar a la Base de Datos
    echo "<div align='center'><h1>Nooooo me conecte: </h1></div> " . $e->getMessage();
    }
	//http://localhost/prograweb2020b/paginas/conexion.php
?> 