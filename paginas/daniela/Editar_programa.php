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
	  function ValidaFormulario1()
	  {
		 var id_programa = document.getElementById("txt_id_programa").value;
		 var programa = document.getElementById("txt_programa").value;
		 //VALIDACIONES *****************************************************************
		 //Caja de Texto ****************************************************************
         if(id_programa == null || id_programa.length == 0 || /^\s+$/.test(id_programa)) 
		 {
			 alert("Debes escribir la CLAVE del programa usando solo 1 letra y 1 número");
			 document.getElementById("txt_id_programa").value = "";
			 document.getElementById("txt_id_programa").style.background = 'lightgreen';
			 document.getElementById("txt_id_programa").focus();
             return false;
		 } else if (programa == null || programa.length == 0 || /^\s+$/.test(programa)){
			 alert("Debes escribir el nombre del programa");
			 document.getElementById("txt_programa").style.background = 'lightgreen';
			 document.getElementById("txt_programa").focus();
             return false;	 
	     } 
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
          <form action="Actualizar_Televisora.php" method="post" id="formulario1" onsubmit="return ValidaFormulario1();">
		  <?php
            foreach ($rows as $row) {
			//Imprimimos en la página EL UNICO REGISTRO de MySQL en un renglon de HTML
          ?>
                <div>
                    <br />
					<!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->
                         Número de departamento: 
                         <input type="text" 
						 name="txt_id_departamento" 
						 id="txt_id_departamento" 
						 size="10" maxlength="2" disabled
						 value="<?php echo $row['id_televisora']; ?>" />
					
                        <!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->					
						 <input type="hidden" 
						 name="txt_id_departamento_oculto" 
						 id="txt_id_departamento_oculto" 
						 size="10" maxlength="2"
						 value="<?php echo $row['id_televisora']; ?>" />
						 
                    <br />
                    <br />
					    <!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->
                         Nombre de departamento: 
                         <input type="text" 
						 name="txt_departamento" 
						 id="txt_departamento" 
						 size="40" 
						 maxlength="50" 
						 value="<?php echo $row['nombre_televisora']; ?>" />
                    <br />
                    <br />
                         Nombre de departamento: 
                         <input type="text" 
						 name="txt_departamento" 
						 id="txt_departamento" 
						 size="40" 
						 maxlength="50" 
						 value="<?php echo $row['sede']; ?>" />
                    <br />
                    <br />
                         Nombre de departamento: 
                         <input type="text" 
						 name="txt_departamento" 
						 id="txt_departamento" 
						 size="40" 
						 maxlength="50" 
						 value="<?php echo $row['fecha_estreno']; ?>" />
                    <br />
                    <br />
                         Nombre de departamento: 
                         <input type="text" 
						 name="txt_departamento" 
						 id="txt_departamento" 
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