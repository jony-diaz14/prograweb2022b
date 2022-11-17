<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "conexion.php";
    // Escribimos la consulta para recuperar los departamentos de la tabla departamentos **************
    $sql = 'SELECT departamento, descripcion FROM departamentos';
    // Almacenamos los resultados de la consulta en una variable llamada $smtp a partir de la conexión
    $stmt = $conn->query($sql);
    // Recuperamos los valores de los registros de la tabla que ya están en la variable $stmt
    $rows = $stmt->fetchAll();
	// Verificamos si está vacia la variable $smtp, si es positivo imprimimos en pantalla que no trae
    if (empty($rows)) {
        $result = "No se encontraron resultados !!";
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ajax con PHP y MySQL</title>

<style type="text/css" media="screen">

body { background-color:#999;}

#wrapper { 
    margin:auto; 
	width:960px; 
	height:500px; 
	background-color:#333;
	}
	
#caja1 { width:300px; 
         height:50px; 
		 margin-left:10px; 
		 margin-right:10px; 
		 margin-top:10px; 
		 background-color:#69F; 
		 float:left;}

#caja2 { width:300px; 
         height:50px; 
		 margin-left:10px; 
		 margin-right:10px; 
		 margin-top:10px; 
		 background-color:#F60; 
		 float:left;}

#caja3 { width:300px; 
         height:50px; 
		 margin-left:10px; 
		 margin-right:10px; 
		 margin-top:10px; 
		 background-color:#C99; 
		 float:left;}

#caja4 { width:940px;
         height:350px;
		 margin-left:10px;
		 margin-right:10px;
		 margin-top:40px;
		 background-color:#FF9; 
		 clear:both; 
		 /*
		 position:absolute; 
		 top:200px;
		 */
		 
		 position:relative; 
		 top:10px;
	}
	
#imagen1 { position:relative; top:10px; right:-10px; }

#texto1 { width:900px; 
          height:auto;
		  margin-left:5px; 
		  margin-right:10px; 
		  margin-top:10px; 
		  background-color:#CCC;
		  padding:5px;
		  float:right;
		  right:-10px; 
		  top:10px;
		}
</style>

<script language="JavaScript" type="text/javascript">
		function showUser(str) {
			if (str == "") {
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else {
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
					}
				};
				xmlhttp.open("GET","get_empleados.php?q="+str,true);
				xmlhttp.send();
			}
		}
</script>

</head>
<body>
<div id="wrapper">
   <div id="caja1">Licenciatura en Tecnologías de la Información</div>
   <div id="caja2">Programación web</div>
   <div id="caja3">AJAX con PHP y MySQL</div>
   <div id="caja4">
     <div id="texto1"><br>
        <fieldset style="width:auto;"    >
            <legend>Departamentos de la empresa y sus empleados</legend>
          <br />
          <form id="formulario1">
                <div>
                    <p>
                      <label for="Combodepartamento">Departamento:</label>
					  
                      <select name="Combodepartamento" id="Combodepartamento" 
                      onChange="showUser(this.value);">
					  
                      <option value="0">-- Selecciona un departamento --</option>
                        <?php 
						     foreach ($rows as $row) 
						     {
                                echo '<option value="'.$row['departamento'].'">'.$row['descripcion'].'</option>';
                             }
					    ?>
                      </select>
                    </p>
                    <p> 
                    <label for="ComboEmpleados">Empleados del departamento seleccionado:</label>
                      <div id="txtHint"><b>En esta parte aparecerán los empleados del departamento seleccionado</b></div>
                    </p>
                    <p>
                    </p>
                </div>
            </form>
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