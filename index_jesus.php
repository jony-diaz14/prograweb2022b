<?php
//Inicializamos el uso de las sesiones ****
session_start();
// Quitamos todas las variables de sesiones
$_SESSION["validado"] = "";
session_unset();
// Eliminamos la sesion *******************
session_destroy();
?>
<!doctype html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Vista Inicio Sesion</title>
	<link rel="icon" href="/imagenes/login.png" type="image/x-icon">
	<link href="css/index.css" rel="stylesheet" type="text/css" media="screen">


	<style type="text/css" media="screen">
		
	</style>

	<script>
		function ValidaFormulario() {
			//Recuperamos lo escrito en la cajas de texto y lo almacenamos en una variable
			var user = document.getElementById("txtusuario").value;
			var pass = document.getElementById("txtpassword").value;

			//Caja de Texto 
			if (user == null || user.length == 0 || /^\s+$/.test(user)) {
				alert("Debes escribir el usuario");
				document.getElementById("txtusuario").style.background = 'pink';
				document.getElementById("txtusuario").focus();
				return false;
			} else if (pass == null || pass.length == 0 || !/^([0-9])*$/.test(pass)) {
				alert("Debes escribir la contraseña con solo NUMEROS");
				document.getElementById("txtpassword").value = "";
				document.getElementById("txtpassword").style.background = 'pink';
				document.getElementById("txtpassword").focus();
				return false;
			} //Cuando ya están contestadas todas las cajas de texto y seleccionados los combobox enviamos el form
			return true;
		}
	</script>

</head>

<body>
	<div id="wrapper">
		<div id="caja1">Licenciatura en Tecnologías de la Información</div>
		<div id="caja2">Programación web</div>
		<div id="caja3">Formulario para Inicio de Sesion</div>
		<div id="caja4">
			<div id="texto1"><br>
				<fieldset style="width: 95%; font-weight: bold;">
					<legend>INGRESO AL SISTEMA</legend>
					<form action="paginas/validacion.php" method="post" id="formulario1" onSubmit="return ValidaFormulario()">
						<div>
							<br />
							Usuario:
							<input type="text" name="txtusuario" id="txtusuario" size="30">
							<br />
							<br />
							Password:
							<input type="password" name="txtpassword" id="txtpassword" size="28">
							<br />
							<br />
							<input type="submit" name="btn_aceptar" id="btn_aceptar" value="ENTER" />
							<br />
						</div>
						<br />
						<br />
					</form>
				</fieldset>
			</div>
		</div>
	</div>
</body>

</html>