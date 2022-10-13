<?php
require_once "conn_mysql_eber.php";
$result;
// $nombre_marca = $_POST["txtnombremarca"];
$idmarca = $_GET["id"];
// Conversión de CARACTER a ENTERO mediante el forzado de (int)
// *los valores por GET son tipo STRING*
$idmarca = (int)$idmarca; 
//$idmarca=$_GET["id_marca"];
//$idmarca=(int)$idmarca;

$sql2 = "SELECT C.no_serie, C.id_marca, C.tipo de sistema, C.id_dispositivo, C.ram, C.precio, C.modelo FROM computadoras C ";
$sql3 = $sql2 . "INNER JOIN marcas_computadoras M ON M.id_marca = C.id_marca=" . $idmarca;
$result = $conn->query($sql3);
$rows = $result->fetchAll();

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Practica de la sesion 7</title>
</head>
<h2>Reporte de Registros de Peliculas</h2>

<div align="center">
    <table border="2" width="90%" bgcolor="green">
        <thead>
            <tr>
                <th>no_serie</th>
                <th>id_marca</th>
                <th>tipo de sistema</th>
                <th>id_dispositivo</th>
                <th>ram</th>
                <th>precio</th>
                <th>modelo</th>

            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($rows as $row) {

            ?>
                <tr>
                    <td><?php echo $row['no_serie']; ?></td>
                    <td><?php echo $row['id_marca']; ?></td>
                    <td><?php echo $row['tipo de sistema']; ?></td>
                    <td><?php echo $row['id_dispositivo']; ?></td>
                    <td><?php echo $row['ram']; ?></td>
                    <td><?php echo $row['precio']; ?></td>
                    <td><?php echo $row['modelo']; ?></td>

                </tr>
                <?php ?>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td></td>
                    <td bgcolor='yellow'><a href="http://eber2022b.atspace.cc/paginas/reporte_general_eber.php">
                            clic para regresar al reporte
                        </a> </td>
                </tr>
    </table>
    </tbody>
    </body>
</div>
<?php }
            $conn = null;
?>
</br>
</body>

</html>
</head>

</html>