<?php include("headeradmin.php"); ?>
<?php include("conexion.php"); ?>

<?php

if($_GET) {

    $id = $_GET['borrar'];
    $objConexion = new conexion();
    $imagen = $objConexion->consultarPruebaConexion("SELECT imagen FROM `personal` WHERE id=".$id);
    unlink("imagenes/".$imagen[0]['imagen']);
    $sql = "DELETE FROM `personal` WHERE `personal`.`id` =".$id;
    $objConexion->ejecutarPruebaConexion($sql);
    header("location:albumadminborrapersonal.php");

}

$objConexion = new conexion();
$personal = $objConexion->consultarPruebaConexion("SELECT * FROM `personal`");

?>

<br/>
<h1 style=" display:flex; jusitfy-content: center">SECCION ADMINISTRADOR</h1>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>RFC</th>
                        <th>NSS</th>
                        <th>Em@il</th>
                        <th>Telefono</th>
                        <th>Sangre</th>
                        <th>Trabajo</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($personal as $empleado) { ?>
                    <tr>
                        <td><?php echo $empleado['nombres']; ?></td>
                        <td><?php echo $empleado['apellidos']; ?></td>
                        <td><?php echo $empleado['rfc']; ?></td>
                        <td><?php echo $empleado['nss']; ?></td>
                        <td><?php echo $empleado['email']; ?></td>
                        <td><?php echo $empleado['telefono']; ?></td>
                        <td><?php echo $empleado['sangre']; ?></td>
                        <td><?php echo $empleado['trabajo']; ?></td>
                        <td>
                            <img width="100" src="imagenes/<?php echo $empleado['imagen']; ?>" alt="">
                        </td>
                        <td>
                            <a class="btn btn-danger" href="?borrar=<?php echo $empleado['id']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
