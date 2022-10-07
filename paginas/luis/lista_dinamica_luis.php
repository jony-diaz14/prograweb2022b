<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "conexion.php";
    $result = "";

    // Escribimos la consulta para recuperar los departamentos de la tabla departamentos **************
    $sql = 'SELECT  *  FROM  restaurantes';
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
<title>Combobox Enlazados con PHP AJAX y MySQL</title>

<style type="text/css" media="screen">

body { background-color:#999;}

#wrapper { 
    margin:auto; 
	width:960px; 
	height:500px; 
	background-color:#CCC;
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

#texto1 { width:500px; 
          height:290px; 
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
/* Se define la función que se usará para instanciar objetos XMLHttpRequest */
	function crear_objeto_XMLHttpRequest() {
		try {
			objeto = new XMLHttpRequest();
		} catch(err1) {
			try {
				objeto = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (err2) {
				try {
					objeto = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (err3) {
					objeto = false;
				}
			}
		}
		return objeto;
	}
/* Aquí acaba la definición de la función que se usará para instaciar objetos XMLHttpRequest */
	var objeto_AJAX = crear_objeto_XMLHttpRequest();

/* La siguiente función se ejecuta cuando es invocada por un cambio en el control de la lista de departamentos. */
	function pedirPlatillo(){
		var URL = "obtener_platillos.php";
		objeto_AJAX.open("POST", URL, true);
		objeto_AJAX.onreadystatechange = muestraResultado;
		objeto_AJAX.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		objeto_AJAX.send("restaurante_seleccionado="+document.getElementById("Comborestaurante").value);
	}

/* La siguiente función se ejecuta cuando se recibe una respuesta del servidor. */
	function muestraResultado(){
		if (objeto_AJAX.readyState == 4 && objeto_AJAX.status == 200) 
		{
		   document.getElementById("comboplatillos").innerHTML = objeto_AJAX.responseText;
		}
	}
</script>

</head>

<body>

<div id="wrapper">

   <div id="caja1">Licenciatura en Tecnologías de la Información</div>
   <div id="caja2">Programación web</div>
   <div id="caja3">Cajas de selección o combobox dinámicos</div>
 
   <div id="caja4">
     <div id="texto1"><br>
      <p><?php echo $result;?></p>
 
        <fieldset style="width:90%"    >
            <legend>Restaurantes de la zona</legend>
          <br />
          <form action="detalle_registro.php" method="post" id="formulario1">
                <div>
                    <p>
                      <label for="Comborestaurante">Id del Restaurante:</label>
					  
                      <select name="Comborestaurante" id="Comborestaurante" onChange="javascript:pedirPlatillo();">
                      
					  <option value="0">-- Selecciona un restaurante --</option>
					  
                        <?php 
						     foreach ($rows as $row) 
						     {
                                echo '<option value="'.
								$row['id_restaurante'].'">'.
								$row['nombre_restaurante'].'</option>';
                             }
					    ?>
                      </select>
                    </p>
                    <p>
                    
                    <label for="comboplatillos">Platillos del restaurante seleccionado:</label>
                      <select name="comboplatillos" id="comboplatillos">
                       
                      </select>
                    </p>
                    <p>
                    
                      <input type="submit" name="buscarplatillos" value="  Buscar platillos de los restaurantes " />
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