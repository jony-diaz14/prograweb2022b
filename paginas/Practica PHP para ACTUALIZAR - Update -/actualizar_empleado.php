<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos 
    require_once "conexion.php";
	
	//Recuperamos los valores de las cajas de texto y de los demás objetos de formulario
    $numero = $_POST["txtnumeroOCULTO"];
	$numero = (int)$numero;
	$nombre = strtoupper(trim($_POST["txtnombre"]));
	$salario = $_POST["txtsalario"];
	$categoria = trim($_POST["txtcategoria"]);
    $sexo = $_POST["combo_sexo"];
	$departamento = $_POST["combo_departamento"];
	
    // Escribimos la consulta para ACTUALIZAR LOS DATOS EN LA TABLA de empleados
    $sqlUPDATE  = "UPDATE empleados SET nombre = '$nombre', salario = $salario, 
	               categoria = '$categoria', sexo = '$sexo', 
				   departamento = '$departamento' WHERE numero = " . $numero;
    // Ejecutamos la sentencia UPDATE de SQL a partir de la conexión usando PDO
    $conn->exec($sqlUPDATE);
	
	// Escribimos la consulta para recuperar el nombre del Departamento del Empleado editado
	// Y no mostrar en pantalla el ID de departamento que no es entendible para el usuario
    $sqlDptos = "SELECT departamento, descripcion FROM departamentos WHERE departamento='" . $departamento . "'";
    // Almacenamos los resultados de la consulta en una variable llamada $smtp a partir de la conexión
    $stmt2 = $conn->query($sqlDptos);
    // Recuperamos los valores de los registros de la tabla que ya están en la variable $stmt
    $rows2 = $stmt2->fetchAll();
	// Verificamos si está vacia la variable $smtp, si es positivo imprimimos en pantalla que no trae
    if (empty($rows2)) {
        $result2 = "No se encontró ese departamento !!";
    } else {
		foreach ($rows2 as $row2) 
		{
			//Esta será la variable que se mostrará en pantalla con el Nombre Descriptivo del Departamento
			//En lugar de mostrar el ID de departamento que no es entendible para el usuario final
			$NombreDepartamento = $row2['descripcion'];
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Actualización de empleados desde PHP hacia MySQL</title>

<style type="text/css" media="screen">

body { background-color:#999;}

#wrapper {
	margin: auto;
	width: 960px;
	height: 550px;
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
	height: 450px;
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
	
#imagen1 { position:relative; top:10px; right:-10px; }

#texto1 {
	width: 500px;
	height: 400px;
	margin-left: 5px;
	margin-right: 10px;
	margin-top: 10px;
	background-color: #CCC;
	padding: 5px;
	float: right;
	right: -10px;
	top: 10px;
	}
	
#AddEmpleado{ 
    position: absolute;
    right: 50px;
    border:3px solid #009;
    padding: 10px;
}

</style>

</head>

<body>

<div id="wrapper">

   <div id="caja1">Licenciatura en Tecnologías de la Información</div>
   <div id="caja2">Programación web</div>
   <div id="caja3">Datos del empleado actualizados correctamente</div>
 
   <div id="caja4">
     <div id="texto1"><br>
 
        <fieldset style="width: 90%;"    >
            <legend>EMPLEADO ACTUALIZADO SATISFACTORIAMENTE</legend>
                <div>
                    <br />
                         <b>Departamento:</b> <?php echo ($NombreDepartamento); ?>
                    <br />
                    <br />
                         <b>Número de empleado:</b> <?php echo ($numero); ?>
                    <br />
                    <br />
                         <b>Nombre de empleado:</b> <?php echo ($nombre); ?>
                    <br />
                    <br />
                         <b>Salario de empleado_:</b> <?php echo ($salario); ?>
                    <br />
                    <br />
                         <b>Categoría de empleado:</b> <?php echo ($categoria); ?>
                    <br />
                    <br />
					 <?php
						if ($sexo == "M"){
							$sexo2 = "Masculino";
						} else {
							$sexo2 = "Femenino";
						}
					?>
                        <b>Sexo:</b> <?php echo ($sexo2); ?>
                    <br />
                    <br />
                    <a href="reporte_para_editar_pdo.php">EDITAR OTRO EMPLEADO</a>
                </div>
        </fieldset> 
     </div>
  </div>
</div>
     <?php
			//Cerramos la oonexion a la base de datos **********************************************
			$conn = null;
     ?>
</body>
</html>