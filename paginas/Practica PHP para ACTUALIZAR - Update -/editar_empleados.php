<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos 
    require_once "conexion.php";
    $result = "";
	$result2 = "";

    // Escribimos la consulta para recuperar los departamentos de la tabla departamentos
    $sqlDptos = 'SELECT departamento, descripcion FROM departamentos';
    // Almacenamos los resultados de la consulta en una variable llamada $smtp a partir de la conexión
    $stmt2 = $conn->query($sqlDptos);
    // Recuperamos los valores de los registros de la tabla que ya están en la variable $stmt
    $rows2 = $stmt2->fetchAll();
	// Verificamos si está vacia la variable $smtp, si es positivo imprimimos en pantalla que no trae
    if (empty($rows2)) {
        $result2 = "No se encontraron departamentos !!";
    }
	
	// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
	$idempleado= $_GET["id"];
	
	// Conversión explicita de CARACTER a ENTERO mediante el forzado de (int), 
	// los valores por GET son tipo STRING ************************************************************
	$idempleado = (int)$idempleado; //*****************************************************************
	
    //Verificamos que SI VENGA EL NUMERO DE EMPLEADO **************************************************
	if($idempleado == "")
	{
		header("Location: reporte_para_editar_pdo.php");
		exit;
	}
	if(is_null($idempleado))
	{
		header("Location: reporte_para_editar_pdo.php");
		exit;
	}
	
    // Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
    $sql3 = 'SELECT E.numero, E.nombre, E.salario, E.categoria, E.sexo, 
	         E.departamento, D.descripcion FROM empleados E 
	         INNER JOIN departamentos D ON E.departamento = D.departamento 
	         WHERE E.numero=' . $idempleado;
	
    //echo ($sql3);
	//die();

    // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql3);
      
    // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
    $rows = $result->fetchAll();
	
    // El resultado se mostrará en la página, en el BODY ***************************************************
    if (empty($rows)) {
        $result = "No se encontraron empleados !!";
		header("Location: reporte_para_editar_pdo.php");
		exit;
    }
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Regitro de empleados desde PHP hacia MySQL</title>

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

<script language="javascript">
  <!--
	  function ValidaFormulario()
	  {
		 //Recuperamos lo elegido en el combo de los departamento
		 var departamento = document.getElementById("combo_departamento").selectedIndex;
		 //Recuperamos lo escrito en la caja del número de empleado:
		 var valorNumero = document.getElementById("txtnumero").value;
		 //Recuperamos lo escrito en la caja del nombre del empleado:
		 var valorNombre = document.getElementById("txtnombre").value;
		 //Recuperamos lo escrito en la caja del salario del empleado:
		 var valorSalario = document.getElementById("txtsalario").value;
		 //Recuperamos lo escrito en la caja de la categoría del empleado:
		 var valorCategoria = document.getElementById("txtcategoria").value;
		 //Recuperamos lo elegido en el combo de los sexos
		 var sexo = document.getElementById("combo_sexo").selectedIndex;	
		 //VALIDACIONES *****************************************************************
		 //Caja de Texto ****************************************************************
         if(valorNumero == null || valorNumero.length == 0 || /^\s+$/.test(valorNumero)) 
		 {
			 alert("Debes escribir el número de empleado");
			 document.getElementById("txtnumero").focus();
             return false;
		 } else if (valorNombre == null || valorNombre.length == 0 || /^\s+$/.test(valorNombre)){
			 alert("Debes escribir el nombre del empleado");
			 document.getElementById("txtnombre").focus();
             return false;	 
	     } else if (valorSalario == null || valorSalario.length == 0 || /^\s+$/.test(valorSalario)){
			 alert("Debes escribir el salario del empleado");
			 document.getElementById("txtsalario").focus();
             return false;
		 } else if (valorCategoria == null || valorCategoria.length == 0 || /^\s+$/.test(valorCategoria)){
			 alert("Debes escribir la categoría del empleado");
			 document.getElementById("txtcategoria").focus();
             return false;	 
		 //Cajas de Selección (Combo Box) ****************************************************************
         } else if (sexo == null || sexo == 0){
			 alert("Debes elegir un sexo");
			 document.getElementById("combo_sexo").focus();
             return false;
		 } else if (departamento == null || departamento == 0){
			 alert("Debes elegir un departamento");
			 document.getElementById("combo_departamento").focus();
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
   <div id="caja3">Formulario para editar la información de los empleados en la BD desde una página web</div>
 
   <div id="caja4">
     <div id="texto1"><br>
 
        <fieldset style="width: 90%; font-weight: bold;"    >
            <legend>EDITAR EL EMPLEADO SELECCIONADO</legend>
          <form action="actualizar_empleado.php" method="post" id="formulario1" onsubmit="return ValidaFormulario()">
		  <?php
            foreach ($rows as $row) {
			//Imprimimos en la página EL UNICO REGISTRO de MySQL en un renglon de HTML
          ?>
                <div>
                    <br />
                      <label for="departamento">Departamento:</label>

                      <select name="combo_departamento" id="combo_departamento">
                      <option value="0">-- Selecciona un departamento --</option>
                      
							<?php 
								 foreach ($rows2 as $row2) 
								 {
									echo '<option value="'.$row2['departamento'].'">'.$row2['descripcion'].'</option>';
								 }
							?>
                                        
						  <option value="<?php echo $row['departamento']; ?>" selected>
							 <?php echo $row['descripcion']; ?>
						  </option>
                      </select>
                           
                      
                    <br />
                    <br />
                    Número de empleado: 
                    <input type="text" name="txtnumero" id="txtnumero" size="10" 
                    value="<?php echo $row['numero']; ?>" disabled />
                    <br />
                    <br />
                         Nombre de empleado: 
                    <input type="text" name="txtnombre" id="txtnombre" size="40" 
                    value="<?php echo $row['nombre']; ?>" />
                    <br />
                    <br />
                         Salario de empleado_: 
                    <input type="text" name="txtsalario" id="txtsalario" size="15" 
                    value="<?php echo $row['salario']; ?>" />
                    <br />
                    <br />
                         Categoría de empleado: 
                    <input type="text" name="txtcategoria" id="txtcategoria" size="40" value="<?php echo $row['categoria']; ?>" />
                    <br />
                    <br />
                        Sexo:<!-- Caja de Selección o ComboBox -->
						<?php
							$sexo = $row['sexo'];
							if ($sexo == "M"){
								$sexo2 = "Masculino";
							} else {
								$sexo2 = "Femenino";
							}
						?>
                        <select name="combo_sexo" id="combo_sexo">
                          <option value="0">-- Selecciona un sexo --</option>
                          <option value="M">Masculino</option>
                          <option value="F">Femenino</option>
                          <option value="<?php echo ($sexo); ?>" selected><?php echo ($sexo2); ?></option>
                        </select>
                    <br />
                    <br />
                      <input type="hidden" name="txtnumeroOCULTO" id="txtnumeroOCULTO" value="<?php echo $row['numero']; ?>" />
                      <input type="submit" name="AddEmpleado" id="AddEmpleado" value="  Guardar cambios " />
                    <br />
                </div>
			<?php } ?>
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