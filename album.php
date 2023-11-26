<?php include("header.php"); ?>
<?php include("conexion.php"); ?>

<?php

if(isset($_POST['submitEnviarAlbum'])) {

    $nombres = $_POST['nombresPersonal'];
    $apellidos = $_POST['apellidosPersonal'];
    $curp = $_POST['curpPersonal'];
    $rfc = $_POST['rfcPersonal'];
    $nss = $_POST['nssPersonal'];
    $email = $_POST['emailPersonal'];
    $telefono = $_POST['telefonoPersonal'];
    $telefonoEmergencia = $_POST['telefonoEmergenciaPersonal'];
    $sangre = $_POST['sangrePersonal'];
    $area = $_POST['areaPersonal'];
    $trabajo = $_POST['trabajoPersonal'];

    $fecha = new DateTime();

    $imagen = $fecha->getTimestamp()."_".$_FILES['fotoPersonal']['name'];
    $imagen_temporal = $_FILES['fotoPersonal']['tmp_name'];
    move_uploaded_file($imagen_temporal,"imagenes/".$imagen);

    $objConexion = new conexion();
    $sql = "INSERT INTO `personal` (`id`, `nombres`, `apellidos`, `curp`, `rfc`, `nss`, `email`, `telefono`, `telefono_emergencia`, `sangre`, `area`, `trabajo`, `imagen`) VALUES (NULL, '$nombres', '$apellidos', '$curp', '$rfc', '$nss', '$email', '$telefono', '$telefonoEmergencia', '$sangre', '$area', '$trabajo', '$imagen');";
    $objConexion->ejecutarPruebaConexion($sql);
    header("location:album.php");

}

$objConexion = new conexion();
$personal = $objConexion->consultarPruebaConexion("SELECT * FROM `personal`");

?>

<br/>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="class-header fw-bolder bg-info">
                    Datos del Empleado
                </div>
                <div class="card-body">
                    <form action="album.php" method="post" enctype="multipart/form-data">
                        Nombres: <input class="form-control" id="" type="text" name="nombresPersonal" required>
                        <br/>
                        Apellidos: <input class="form-control "id="" type="text" name="apellidosPersonal" required>
                        <br/>
                        CURP: <input class="form-control" id="" type="text" name="curpPersonal" required>
                        <br/>
                        RFC: <input class="form-control" id="" type="text" name="rfcPersonal" required>
                        <br/>
                        NSS: <input class="form-control" id="" type="text" name="nssPersonal" required>
                        <br/>
                        Correo Electronico: <input class="form-control" id="" type="email" name="emailPersonal" required>
                        <br/>
                        Telefono: <input class="form-control" id="" type="text" name="telefonoPersonal" required>
                        <br/>
                        Telefono Emergencia: <input class="form-control" id="" type="text" name="telefonoEmergenciaPersonal" required>
                        <br/>
                        Sangre: <input class="form-control" id="" type="text" name="sangrePersonal" required>
                        <br/>
                        Area: <input class="form-control" id="" type="text" name="areaPersonal" required>
                        <br/>
                        Trabajo: <input class="form-control" id="" type="text" name="trabajoPersonal" required>
                        <br/>
                        Fotografia: <input class="form-control" id="" type="file" name="fotoPersonal" required>
                        <br/>
                        <input class="btn btn-success" type="submit" value="Enviar Informacion" name="submitEnviarAlbum">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <table class="table">
                <thead class="bg-info">
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>CURP</th>
                        <th>RFC</th>
                        <th>NSS</th>
                        <th>Em@il</th>
                        <th>Telefono</th>
                        <th>Tel Emergencia</th>
                        <th>Sangre</th>
                        <th>Area</th>
                        <th>Trabajo</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($personal as $empleado) { ?>
                    <tr>
                        <td><?php echo $empleado['nombres']; ?></td>
                        <td><?php echo $empleado['apellidos']; ?></td>
                        <td><?php echo $empleado['curp']; ?></td>
                        <td><?php echo $empleado['rfc']; ?></td>
                        <td><?php echo $empleado['nss']; ?></td>
                        <td><?php echo $empleado['email']; ?></td>
                        <td><?php echo $empleado['telefono']; ?></td>
                        <td><?php echo $empleado['telefono_emergencia']; ?></td>
                        <td><?php echo $empleado['sangre']; ?></td>
                        <td><?php echo $empleado['area']; ?></td>
                        <td><?php echo $empleado['trabajo']; ?></td>
                        <td>
                            <img width="100" src="imagenes/<?php echo $empleado['imagen']; ?>" alt="">
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
