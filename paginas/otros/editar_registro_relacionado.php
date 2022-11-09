<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos 
    require_once "conn_mysql_eber.php";
	
    // Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
    // Debido a que el campo llave en este ejemplo es de tipo STRING la variable en SQL va encerrada entre ''
    // Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
	$noserie = $_GET["id"];
	//Eliminamos los posibles espacios en blanco que tenga a ambos lados la variable $idDepartamento usando trim()
	$noserie = trim($noserie);


$sql = "SELECT C.no_serie, C.id_marca, C.tipo_sistema, C.id_dispositivo, C.ram, C.precio,
            C.modelo FROM computadoras C INNER JOIN marcas_computadoras M
            ON C.id_marca = M.id_marca WHERE C.no_serie=$noserie";

    //echo $sql;
    //die();
    // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql);
    // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
    $rows = $result->fetchAll();
    //Recupera los datos de la tabla Catalogo para rellenar el combobox
    $sql2 = "SELECT * FROM marcas_computadoras";
    $result2 = $conn->query($sql2);
    $rows2 = $result2->fetchAll();
	// Los valores que tendrá la variable $rows se organizan en un arreglo asociativo
	// (Variable con varias valores)
	// y se usará un ciclo foreach para recuper los valores uno a uno de ese arreglo
    // El resultado se mostrará en una tabla HTML ***************************************************
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Regitro de Marcas desde PHP hacia MySQL</title>

<style type="text/css" media="screen">

body {
			background-color: #9B59B6;
		}

		#wrapper {
			margin: auto;
			width: 960px;
			height: 550px;
			background-color: #EC7063;
		}

		#caja1 {
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #5DADE2;
			float: left;
		}

		#caja2 {
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #5DADE2;
			float: left;
		}

		#caja3 {
			width: 300px;
			height: 50px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #5DADE2;
			float: left;
		}

		#caja4 {
			width: 940px;
			height: 450px;
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 40px;
			background-color: #FF9;
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
			height: 400px;
			margin-left: 5px;
			margin-right: 10px;
			margin-top: 10px;
			background-color: #76D7C4;
			padding: 5px;
			float: right;
			right: -10px;
			top: 10px;
		}

		#AddEmpleado {
			position: absolute;
			right: 50px;
			border: 3px solid #009;
			padding: 10px;
		}

</style>

<script language="javascript">
                  function ValidaFormulario1()
            {
	  //Recuperamos lo elegido en el combo de las computadoras
                        var marca = document.getElementById("combo_marca").selectedIndex;
			//Recuperamos lo escrito en la caja del número de marca:
			var no_serie = document.getElementById("txt_no_serie").value;
			//Recuperamos lo escrito en la caja del sistema:
			var tipo_sistema = document.getElementById("txt_tipo_sistema").value;
			//Recuperamos lo escrito en la caja del id de la computadora:
			var id_dispositivo = document.getElementById("txt_id_dispositivo").value;
			//Recuperamos lo escrito en la caja de texto:
			var ram = document.getElementById("txtram").value;
			//precio de la computadora
			var precio = document.getElementById("txtprecio").value;
			//Recuperamos lo elegido 
			var modelo = document.getElementById("txtmodelo").value;
			

			//VALIDACIONES *****************************************************************
			//Caja de Texto ****************************************************************
			if (marca == null || marca == 0) {
				alert("Tienes que elegir la marca");
				document.getElementById("combo_marca").focus();
				document.getElementById("combo_marca").style.background = "#bd373790";
				return false;
			}else if (no_serie == null || no_serie.length == 0 || !/^([0-9])*$/.test(no_serie)) {
				alert("Tienes que escribir el numero de serie de la marca usando solo números enteros");
				document.getElementById("txt_no_serie").value = "";
				document.getElementById("txt_no_serie").focus();
				document.getElementById("txt_no_serie").style.background = "#bd373790";
				return false;
			} else if (tipo_sistema == null || tipo_sistema.length == 0 || /^\s+$/.test(tipo_sistema)) {
				alert("Escribe el nombre del sistema");
				document.getElementById("txt_tipo_sistema").value = "";
				document.getElementById("txt_tipo_sistema").focus();
				document.getElementById("txt_tipo_sistema").style.background = "#bd373790";
				return false;
			} else if (id_dispositivo == null || id_dispositivo.length == 0 || /^\s+$/.test(id_dispositivo)) {
				alert("Escribe el id del dispositivo");
				document.getElementById("txt_id_dispositivo").value = "";
				document.getElementById("txt_id_dispositivo").focus();
				document.getElementById("txt_id_dispositivo").style.background = "#bd373790";
				return false;
			} else if (ram == null || ram.length == 0 || /^\s+$/.test(ram)) {
				alert("Escribe la ram de la marca");
				document.getElementById("txtram").value = "";
				document.getElementById("txtram").focus();
				document.getElementById("txtram").style.background = "#bd373790";
				return false;
			} else if (precio == null || precio.length == 0 || /^\s+$/.test(precio)) {
				alert("Escribe el precio");
				document.getElementById("txtprecio").value = "";
				document.getElementById("txtprecio").focus();
				document.getElementById("txtprecio").style.background = "#bd373790";
				return false;
			} else if (modelo == null || modelo.length == 0 || /^\s+$/.test(modelo)) {
				alert("Escribe el modelo");
				document.getElementById("txtmodelo").value = "";
				document.getElementById("txtmodelo").focus();
				document.getElementById("txtmodelo").style.background = "#bd373790";
				return false;
			}
			
			
			//Cuando ya están contestadas todas las cajas de texto y seleccionados los combobox enviamos el form
			return true;
		}
  //-->
</script>

</head>

<body>

<div id="wrapper">

   <div id="caja1">Licenciatura en Tecnologías de la Información</div>
   <div id="caja2">Programación web</div>
   <div id="caja3">Formulario para modificar marcas en la base de datos desde una página web</div>
 
   <div id="caja4">
     <div id="texto1"><br>
      <p></p>
 
        <fieldset style="width: 90%; font-weight: bold;"    >
            <legend>ACTUALIZAR MARCA</legend>
          
		  <!-- el atributo ACTION del Formulario apunta al archivo 3 de esta práctica: actualizar_departamento.php -->
          <form action="actualizar_relacionado.php" method="post" id="formulario1" onsubmit="return ValidaFormulario1();">
		  <?php
            foreach ($rows as $row) {
			//Imprimimos en la página EL UNICO REGISTRO de MySQL en un renglon de HTML
          ?>
                <div>
                    <br />
			<label for="marca">Marca</label>
							<select name="combo_marca" id="combo_marca">
								<option value="0">-- Selecciona una Marca --</option>
								<?php
								foreach ($rows2 as $row2) {
									echo '<option value="' . $row2['id_marca'] . '">' . $row2['nombre_marca'] . '</option>';
								}
								?>
                                                               
							</select>
						 
                    <br />
                    <br />
                        No. de serie: 
                         <input type="text" 
						 name="txt_no_serie" 
						 id="txt_no_serie" 
						 size="10" maxlength="2" disabled
						 value="<?php echo $row['no_serie']; ?>" />
					
                        <!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->					
						 <input type="hidden" 
						 name="txt_no_serie_oculto" 
						 id="txt_no_serie_oculto" 
						 size="10" maxlength="2"
						 value="<?php echo $row['no_serie']; ?>" />
						 
                    <br />
                    <br />
                         Tipo de Sistema: 
                         <input type="text" 
						 name="txt_tipo_sistema" 
						 id="txt_tipo_sistema" 
						 size="25" 
						 maxlength="50" 
						 value="<?php echo $row['tipo_sistema']; ?>" />
                    <br />
                    <br />
                         Id. Dispositivo: 
                         <input type="text" 
						 name="txt_id_dispositivo" 
						 id="txt_id_dispositivo" 
						 size="20" 
						 maxlength="50" 
						 value="<?php echo $row['id_dispositivo']; ?>" />
                    <br />
                    <br />
                         Ram: 
                         <input type="text" 
						 name="txtram" 
						 id="txtram" 
						 size="15" 
						 maxlength="50" 
						 value="<?php echo $row['ram']; ?>" />
                    <br />
                    <br />
                         Precio: 
                         <input type="text" 
						 name="txtprecio" 
						 id="txtprecio" 
						 size="25" 
						 maxlength="50" 
						 value="<?php echo $row['precio']; ?>" />
                    <br />
                    <br />
                         Modelo: 
                         <input type="text" 
						 name="txtmodelo" 
						 id="txtmodelo" 
						 size="25" 
						 maxlength="50" 
						 value="<?php echo $row['modelo']; ?>" />
                    <br />
                    <br />
                      <input type="submit" name="AddMarca" id="AddMarca" value="  Actualizar LA MARCA " />
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