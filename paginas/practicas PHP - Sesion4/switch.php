<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sentencia Switch</title>
</head>
<body>
<?php
    $contenedor = "DIA";
	switch ($contenedor) {
		case "dia": // <<<<< --- Estos son 2 puntos
		   echo "<h1>Buenos dias !!!</h1>";
		   break;
		case "DIA": // <<<<< --- Estos son 2 puntos
		   echo "<h1>Buenos dias !!!</h1>";
		   break;   
		case "tarde": // <<<<< --- Estos son 2 puntos
		   echo "<h1>Buenas tardes !!!</h1>";
		   break;
		case "noche": // <<<<< --- Estos son 2 puntos
		   echo "<h1>Buenas noches !!!</h1>";
		   break;
		default: // <<<<< --- Estos son 2 puntos
		   echo "<h1>No te quiero saludar !!!</h1>";
		   break;
		}	
?>
</body>
</html>





