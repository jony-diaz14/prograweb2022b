<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos 
    require_once "conexion.php";
	
	// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
	$id_televisora = $_GET["id"];
	//Eliminamos los posibles espacios en blanco que tenga a ambos lados la variable $idDepartamento usando trim()
	// $id_televisora = trim($id_televisora);
	
	// Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
	// Debido a que el campo llave en este ejemplo es de tipo STRING la variable en SQL va encerrada entre ''
    $sql = "SELECT * FROM televisora WHERE id_televisora = $id_televisora";
	
	// Ejecutamos la consulta SQL y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql);
    // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
    $rows = $result->fetchAll();
	
    // El resultado se mostrará en la página, en el BODY del HTML **********************************************
    if (empty($rows)) {
        $result = "No se encontraron televisoras con esa información !!";
		header("Location: Reporte_editar_televisora.php");
		exit;
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Regitro de televisoras desde PHP hacia MySQL</title>

<style type="text/css" media="screen">

body { background-color:#999;}

#wrapper {
	margin: auto;
	width: 960px;
	height:auto;
	background-color: #95A5A6;
	}
	
#caja1 {
	width: 300px;
	height: 60px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 10px;
	background-color: #5499C7;
	float: left;
}

#caja2 {
	width: 300px;
	height: 60px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 10px;
	background-color: #5499C7;
	float: left;
}

#caja3 {
	width: 300px;
	height: 60px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 10px;
	background-color: #5499C7;
	float: left;
}

#caja4 {
	width: 940px;
	height:400px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 40px;
	background-color: #717D7E;
	clear: both;

	position: relative;
	top: 10px;
	}
	
#imagen1 { position:relative; top:10px; right:-10px; }

#texto1 {
	width: 500px;
	height: 230px;
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

<script language="javascript">
	  function ValidaFormulario1(){
	  //Recuperamos lo elegido en el combo de los departamento
	  var codigo_televisora = document.getElementById("txttelevisora").value;
			//Recuperamos lo escrito en la caja del número de empleado:
			var nombre_televisora = document.getElementById("txtnombre").value;
			//Recuperamos lo escrito en la caja del nombre del empleado:
			var sede = document.getElementById("txtsede").value;
			//Recuperamos lo escrito en la caja del salario del empleado:
			var fecha_estreno = document.getElementById("txtestreno").value;

			var tipo_televsiora = document.getElementById("txttipo").value;
			//Recuperamos lo escrito en la caja de la categoría del empleado:
			//VALIDACIONES ***********************
			//Caja de Texto **********************
			if (codigo_televisora == null || codigo_televisora == 0 ||  !/^([0-9])*$/.test(codigo_televisora)) {
				alert("Tienes que elegir el nombre de la televisora");
				document.getElementById("txttelevisora").value = "";
				document.getElementById("txttelevisora").focus();
				document.getElementById("txttelevisora").style.background = "#bfedbe20";
				return false;
			} else if (nombre_televisora == null || nombre_televisora.length == 0 || /^\s+$/.test(nombre_televisora)) {
				alert("Escribe la sede de la televisora");
				document.getElementById("txtnombre").value = "";
				document.getElementById("txtnombre").focus();
				document.getElementById("txtnombre").style.background = "#199C9920";
				return false;
			} else if (sede == null || sede.length == 0 || /^\s+$/.test(sede)) {
				alert("Escribe la fecha de estreno ");
				document.getElementById("txtsede").value = "";
				document.getElementById("txtsede").focus();
				document.getElementById("txtsede").style.background = "#199C9920";
				return false;
			} else if (fecha_estreno == null || fecha_estreno.length == 0 || /^\d{4}([\-/.])(0?[1-9]|1[1-2])([\-/.])1(3[01]|[12][0-9]|0?[1-9])$/.test(fecha_estreno)) {
				alert("Escribe el tipo de televisora");
				document.getElementById("txtestreno").value = "";
				document.getElementById("txtestreno").focus();
				document.getElementById("txtestreno").style.background = "#199C9920";
				return false;
			} //Cuando ya están contestadas todas las cajas de texto y seleccionados los combobox enviamos el form 
			else if (tipo_televsiora == null || tipo_televsiora.length == 0 || /^\s+$/.test(tipo_televsiora)) {
				alert("Escribe el tipo de televisora");
				document.getElementById("txttipo").value = "";
				document.getElementById("txttipo").focus();
				document.getElementById("txttipo").style.background = "#199C9920";
				return false;
			} //Cuando ya están contestadas todas las cajas de texto y seleccionados los combobox enviamos el form 
			return true;
		}
  //-->
</script>

</head>

<body>

<div id="wrapper">

   <div id="caja1">Licenciatura en Tecnologías de la Información</div>
   <div id="caja2">Programación web</div>
   <div id="caja3">Formulario para modificar departamentos en la base de datos desde una página web</div>
 
   <div id="caja4">
     <div id="texto1"><br>
      <p></p>
 
        <fieldset style="width: 90%; font-weight: bold;"    >
            <legend>ACTUALIZAR EL PROGRAMA</legend>
          
		  <!-- el atributo ACTION del Formulario apunta al archivo 3 de esta práctica: actualizar_departamento.php -->
          <form action="Actualiza_Televisora.php" method="post" id="formulario1" onsubmit="return ValidaFormulario1();">
		  <?php
            foreach ($rows as $row) {
			//Imprimimos en la página EL UNICO REGISTRO de MySQL en un renglon de HTML
          ?>
                <div>
                    <br />
					<!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->
                         Número de departamento: 
                         <input type="text"
						 name="txttelevisora" 
						 id="txttelevisora" 
						 size="10" maxlength="2" disabled
						 value="<?php echo $row['id_televisora']; ?>" />

						 <input type="hidden" name="txttelevisora_oculto" id="txttelevisora_oculto" size="10" maxlength="2" value="<?php echo $row['id_televisora']; ?>" />
						 
                    <br />
                    <br />
					    <!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->
                         Nombre de departamento: 
                         <input type="text" 
						 name="txtnombre" 
						 id="txtnombre" 
						 size="40" 
						 maxlength="50" 
						 value="<?php echo $row['nombre_televisora']; ?>" />
                    <br />
                    <br />
                         Nombre de departamento: 
                         <input type="text" 
						 name="txtsede" 
						 id="txtsede" 
						 size="40" 
						 maxlength="50" 
						 value="<?php echo $row['sede']; ?>" />
                    <br />
                    <br />
                         Nombre de departamento: 
                         <input type="text" 
						 name="txtestreno" 
						 id="txtestreno" 
						 size="40" 
						 maxlength="50" 
						 value="<?php echo $row['fecha_estreno']; ?>" />
                    <br />
                    <br />
                         Nombre de departamento: 
                         <input type="text" 
						 name="txttipo" 
						 id="txttipo" 
						 size="40" 
						 maxlength="50" 
						 value="<?php echo $row['tipo_televisora']; ?>" />
                    <br />
                    <br />
                      <input type="submit" name="AddPrograma" id="AddPrograma" value="  Actualizar este programa " />
                    <br />
                </div>
			<?php } ?>
            </form>
        </fieldset> 
     </div>
  </div>
</div>
</body>
</html>