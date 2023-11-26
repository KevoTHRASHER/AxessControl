<?php include("headeradmin.php"); ?>
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
    header("location:albumadminborrapersonal.php");

}


$objConexion = new conexion();
$personal = $objConexion->consultarPruebaConexion("SELECT * FROM `personal`");

?>

<br/>
<h1 style=" display:flex; jusitfy-content: center">SECCION ADMINISTRADOR</h1>
<div class="container  justify-content-center align-items-center ">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="class-header">
                    Datos del Empleado
                </div>
                <div class="card-body">
                    <form action="albumadminborrapersonal.php" method="post" enctype="multipart/form-data">
                        Nombres: <input class="form-control" id="" type="text" name="nombresPersonal" required>

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
    </div>
</div>

<?php include("footer.php"); ?>
