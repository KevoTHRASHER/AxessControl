<?php include("header.php"); ?>
<br/>
<?php include("conexion.php"); ?>

<?php

$objConexion = new conexion();
$personal = $objConexion->consultarPruebaConexion("SELECT * FROM `personal`");

?>

<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display 3">Bienvenid@s compañeros Axess Control</h1>
        <p class="lead">Album privado de Axess Control</p>
        <hr class="my-2">
        <p>Album de personal actual de la empresa Axess Control SA de CV, con la finalidad de mostrar los diferentes datos principales de contacto del personal conformado por la empresa.</p>
    </div>
</div>
<br/>
<div class="row row-cols-1 row-cols-md-3 g-4">

<?php foreach($personal as $empleado) { ?>
    <div class="col">
        <div class="card">
            <img src="imagenes/<?php echo $empleado['imagen']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $empleado['nombres']." ".$empleado['apellidos']; ?></h5>
                <p class="card-text"><?php echo $empleado['telefono']." -- ".$empleado['trabajo']; ?></p>
            </div>
        </div>
    </div>
<?php } ?>

</div>

<?php include("footer.php"); ?>
