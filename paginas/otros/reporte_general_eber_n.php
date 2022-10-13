<?php
    //Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "conn_mysql_eber.php";
    $result;
    // Escribimos la consulta para recuperar los registros de la tabla de MySQL
    //$sql = 'SELECT * FROM empleados';
    
    $sql = "SELECT M.id_marca, C.nombre_marca, M.rfc, M.domicilio, M.telefono, M.ciudad, M.estado M.pais FROM marcas_computadoras M";
    $sql2 = $sql . "INNER JOIN computadoras C ON C.id_marca = M.id_marca";
    // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql2);
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
    <h2>Reporte de Registros</h2>

    <div align="center">
        <table border="2" width="90%" bgcolor="#BFE8F9">
            <thead>
                <tr>
                    <th>id_marca</th>
                    <th>nombre_marca</th>
                    <th>rfc</th>
                    <th>domicilio</th>
                    <th>telefono</th>
                    <th>ciudad</th>
                    <th>estado</th>
                    <th>pais</th>
                </tr>
            </thead>
            <tbody>

            <?php
            foreach($rows as $row){

        ?>
                <tr>
                <td><?php echo $row['id_marca']; ?></td>
                <td>
                    <a href="detalle_registro.php?id_marca=<?php echo $row['id_marca']; ?>">
                        <?php echo $row['nombre_marca']; ?> </a>
                </td>

                <td><?php echo $row['rfc'];?></td>
                <td><?php echo $row['domicilio'];?></td>
                <td><?php echo $row['telefono'];?></td>
                <td><?php echo $row['ciudad'];?></td>
                <td><?php echo $row['estado'];?></td>
                <td><?php echo $row['pais'];?></td>
              </tr>

            <?php }?>
        </tbody>
    </table>
</div>
<?php
    $conn = null;
?>

</body>

</html>