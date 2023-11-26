<?php include("headeradmin.php"); ?>
<?php include("conexion.php"); ?>

<?php

if(isset($_POST['creaPersonal'])) {

    $usuarioPersonal = $_POST['usuarioPersonal'];
    $contrasenaPersonal = $_POST['contrasenaPersonal'];

    $objConexion = new conexion();
    $sql = "INSERT INTO `loginpersonal` (`id_loginpersonal`, `usuariopersonal`, `contrasenapersonal`) VALUES (NULL, '$usuarioPersonal', '$contrasenaPersonal');";
    $objConexion->ejecutarPruebaConexion($sql);
    header("location:admincreapersonal.php");

}

if($_GET) {

    $id = $_GET['borrarPersonal'];
    $objConexion = new conexion();
    $sql = "DELETE FROM `loginpersonal` WHERE `loginpersonal`.`id_loginpersonal` =".$id;
    $objConexion->ejecutarPruebaConexion($sql);
    header("location:admincreapersonal.php");

}

$objConexion = new conexion();
$personal = $objConexion->consultarPruebaConexion("SELECT * FROM `loginpersonal`");

?>

<br/>
<h1 style=" display:flex; jusitfy-content: center">SECCION ADMINISTRADOR</h1>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="class-header">
                    Datos de la cuenta Personal a crear
                </div>
                <div class="card-body">
                    <form action="admincreapersonal.php" method="post">
                        Usuario: <input class="form-control" id="" type="text" name="usuarioPersonal" required>
                        <br/>
                        Contraseña: <input class="form-control "id="" type="password" name="contrasenaPersonal" required >
                        <br/>
                        <input class="btn btn-success" type="submit" value="Crea Cuenta Personal" name="creaPersonal">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($personal as $empleado) { ?>
                    <tr>
                        <td><?php echo $empleado['id_loginpersonal']; ?></td>
                        <td><?php echo $empleado['usuariopersonal']; ?></td>
                        <td><?php echo $empleado['contrasenapersonal']; ?></td>
                        <td><a class="btn btn-danger" href="?borrarPersonal=<?php echo $empleado['id_loginpersonal']; ?>">Eliminar Personal</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
