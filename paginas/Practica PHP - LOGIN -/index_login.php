<?php
//Inicializamos el uso de las sesiones ****
session_start();
// Quitamos todas las variables de sesiones
if($_SESSION["aviso"]=="")
{	$aviso = "";

}else{	$aviso = $_SESSION["aviso"];

}

$_SESSION["validado"] = "";
session_unset();

// Eliminamos la sesion
session_destroy();
?>
<!doctype html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Validación de usuarios con PHP y MySQL</title>

	<!-- <style type="text/css" media="screen">
		body {
			background-color: #999;
		}

		#wrapper {
			margin: auto;
			width: 960px;
			height: 360px;
			background-color: #CCC;
		}

		#caja1 {
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #FFC;
			float: left;
		}

		#caja2 {
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #FFC;
			float: left;
		}

		#caja3 {
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #FFC;
			float: left;
		}

		#caja4 {
			width: 940px;
			height: 280px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 40px;
			background-color: #333;
			clear: both;
			/*
		 position:absolute; 
		 top:200px;
		 */
			position: relative;
			top: 10px;
		}

		#imagen1 {
			position: relative;
			top: 10px;
			right: -10px;
		}

		#texto1 {
			width: 500px;
			height: 250px;
			margin-left: 5px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #CCC;
			padding: 5px;
			float: right;
			right: -10px;
			top: 10px;
		}

		#btn_aceptar {
			position: absolute;
			right: 50px;
			border: 3px solid #009;
			padding: 10px;
		}
	</style> -->

	<script>
		function ValidaFormulario() {
			//Recuperamos lo escrito en la caja del usuario:
			var valorUsuario = document.getElementById("txtusuario").value;

			//Recuperamos lo escrito en la caja del password:
			var valorClave = document.getElementById("txtpassword").value;

			//VALIDACIONES *****************************************************************
			//Caja de Texto ****************************************************************
			if (valorUsuario == null || valorUsuario.length == 0 || /^\s+$/.test(valorUsuario)) {
				alert("Debes escribir el usuario");
				document.getElementById("txtusuario").style.background = 'pink';
				document.getElementById("txtusuario").focus();
				return false;
			} else if (valorClave == null || valorClave.length == 0 || !/^([0-9])*$/.test(valorClave)) {
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
		<div id="caja3">Formulario validación de usuarios</div>
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
							<input type="submit" name="btn_aceptar" id="btn_aceptar" value="      Aceptar     " />
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