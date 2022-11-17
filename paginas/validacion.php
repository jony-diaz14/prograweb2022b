<?php
session_start();
// Insertamos el código PHP donde nos conectamos a la base de datos 
require_once "conn_mysql_jonathan.php";
//Recuperamos los valores de las cajas de texto y de los demás objetos de formulario
$Pass = trim($_POST["txtpassword"]);
$Pass = (int)$Pass;
$User = trim($_POST["txtusuario"]);
// Escribimos la consulta para recuperar el UNICO usuario que se firmo en el LOGIN
$sqlLOGIN = "SELECT * FROM usuarios WHERE usuario='$User'and pass=$Pass";
// Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
$result = $conn->query($sqlLOGIN);
// Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
$rows = $result->fetchAll();
// Verificamos si la variable $rows trae el valor de 1 o de 0  
$cuantos = (int)$rows;
// SI $rows es igual a 1 es que SI encontro al usuario, si es igual a 0 es que no lo encontro
if ($cuantos > 0) {
	//Para saber si es usuario
	//Jonathan Jesus Diaz Jimenez
	foreach ($rows as $row) {
		$tipo_usuario = $row['tipousuario'];
	}
	//En caso de haber encontrado al usuario, le creamos una variable de SESION para su ingreso
	$_SESSION["validado"] = "true";
	$_SESSION["tipo_usuario"] = $tipo_usuario;
	//Redireccionamos a una de las páginas del sistema en linea
	$conn = null;
	echo'<script type="text/javascript">
	alert("Bienvenido!!");
	window.location.href="menu_principal.php";
	</script>';
	// header("Location: menu_principal.php");
	//Cerramos la oonexion a la base de datos ***
	exit;
} else {
	//En caso de NO haber encontrado al usuario y su contraseña lo mandamos a la página de LOGIN para que se vuelva a firmar
	$conn = null;
	echo'<script type="text/javascript">
        alert("Error. \nEl usuario o la contraseña que has introducido son incorrectas");
        window.location.href="../index_jesus.php";
        </script>';
	//header("Location: ../index_jesus");
	//Cerramos la conexion a la base de datos
	exit;
}
