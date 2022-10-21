<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos 
    require_once "conexion.php";
	
	// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
	$idDepartamento = $_GET["id"];
	$idDepartamento = trim($idDepartamento);
	
	// Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
    $sql = "SELECT * FROM departamentos WHERE departamento='$idDepartamento'";
	
	// Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql);
      
    // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
    $rows = $result->fetchAll();
	
    // El resultado se mostrará en la página, en el BODY ***************************************************
    if (empty($rows)) {
        $result = "No se encontraron empleados !!";
		header("Location: reporte_editar_departamentos.php");
		exit;
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Regitro de departamentos desde PHP hacia MySQL</title>

<style type="text/css" media="screen">

body { background-color:#999;}

#wrapper {
	margin: auto;
	width: 960px;
	height: 350px;
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
	height: 260px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 40px;
	background-color: #333;
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
  <!--
	  function ValidaFormulario1()
	  {
		 var id_departamento = document.getElementById("txt_id_departamento").value;
		 var departamento = document.getElementById("txt_departamento").value;
		 //VALIDACIONES *****************************************************************
		 //Caja de Texto ****************************************************************
         if(id_departamento == null || id_departamento.length == 0 || /^\s+$/.test(id_departamento)) 
		 {
			 alert("Debes escribir la CLAVE del departamento usando solo 1 letra y 1 número");
			 document.getElementById("txt_id_departamento").value = "";
			 document.getElementById("txt_id_departamento").style.background = 'lightgreen';
			 document.getElementById("txt_id_departamento").focus();
             return false;
		 } else if (departamento == null || departamento.length == 0 || /^\s+$/.test(departamento)){
			 alert("Debes escribir el nombre del departamento");
			 document.getElementById("txt_departamento").style.background = 'lightgreen';
			 document.getElementById("txt_departamento").focus();
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
            <legend>ACTUALIZAR UN DEPARTAMENTO</legend>
          
          <form action="actualizar_departamento.php" method="post" id="formulario1" onsubmit="return ValidaFormulario1()">
		  <?php
            foreach ($rows as $row) {
			//Imprimimos en la página EL UNICO REGISTRO de MySQL en un renglon de HTML
          ?>
                <div>
                    <br />
                         Número de departamento: 
                         <input type="text" 
						 name="txt_id_departamento" 
						 id="txt_id_departamento" 
						 size="10" maxlength="2" disabled
						 value="<?php echo $row['departamento']; ?>" />
						 
						 <input type="hidden" 
						 name="txt_id_departamento_oculto" 
						 id="txt_id_departamento_oculto" 
						 size="10" maxlength="2"
						 value="<?php echo $row['departamento']; ?>" />
						 
                    <br />
                    <br />
                         Nombre de departamento: 
                         <input type="text" 
						 name="txt_departamento" 
						 id="txt_departamento" 
						 size="40" 
						 maxlength="50" 
						 value="<?php echo $row['descripcion']; ?>" />
                    <br />
                    <br />
                      <input type="submit" name="AddDepartamento" id="AddDepartamento" value="  Actualizar este departamento " />
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