<?php
    //Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "conn_mysql_eber.php";
    $result;
    // Escribimos la consulta para recuperar los registros de la tabla de MySQL
    //$sql = 'SELECT * FROM empleados';
   
    $sql = 'SELECT C.no_serie, C.id_marca, C.tipo_sistema, C.id_dispositivo, C.ram, C.precio, C.modelo FROM computadoras C';
    //$sql2 = $sql . "INNER JOIN computadoras c ON M.id_marca = C.id_marca";
    // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql);
         
    // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
    $rows = $result->fetchAll();
       
    // Los valores que tendrá la variable $rows se organizan en un arreglo asociativo
    // (Variable con varias valores)
    // y se usará un ciclo foreach para recuper los valores uno a uno de ese arreglo
    // El resultado se mostrará en una tabla HTML ***************************************************
 ?>
<!doctype html>
<html>

<head>


    <meta charset="utf-8">
    <title>Practica de la sesion 7</title>
</head>
<body  bgcolor="#C39BD3">
    <h2>Reporte de Registros</h2>


    <div align="center">
        <table border="2" width="90%" bgcolor="#BFE8F9">
            <thead>
                <tr>
                    <th>no_serie</th>
                    <th>id_marca</th>
                    <th>tipo_sistema</th>
                    <th>id_dispositivo</th>
                    <th>ram</th>
                    <th>precio</th>
                    <th>modelo</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>

            <?php
            foreach($rows as $row){

        ?>
                <tr>
                <td><?php echo $row['no_serie']; ?></td>
                <td><?php echo $row['id_marca']; ?></td>
                <td><?php echo $row['tipo_sistema'];?></td>
                <td><?php echo $row['id_dispositivo'];?></td>
                <td><?php echo $row['ram'];?></td>
                <td><?php echo $row['precio'];?></td>
                <td><?php echo $row['modelo'];?></td>
                <td><a href="eliminar_departamentos.php?id=<?php echo $row['no_serie']; ?>">
				       eliminar
                    </a>
                                </td>
                <td><a href="editar_registro_relacionado.php?id=<?php echo $row['no_serie']; ?>">
				       editar
                    </a>
                 </td>
              </tr>

            <?php }?>
        </tbody>
    </table>
    <br />
    <a href="http://eber2022b.atspace.cc/paginas/alta_tabla1_eber.php">REGISTRAR MARCA</a> 
</div>
<?php
    $conn = null;
?>

</body>

</html>