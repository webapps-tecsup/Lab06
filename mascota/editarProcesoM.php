<?php
print_r($_POST);
if (!isset($_POST['codigo'])) {
    header('Location: index.php?mensaje=error');
}

include 'model/conexionM.php';
$codigo = $_POST['codigo'];
$nombres_propietario = $_POST['txtPropietario'];
$tipo_mascota = $_POST['txtTipoM'];
$nombre_mascota = $_POST['txtNombreM'];
$sexo_mascota = $_POST['txtSexoM'];
$color_mascota = $_POST['txtColorM'];
$fecha_nacimiento = $_POST['txtFechaNacimiento'];


$sentencia = $bd->prepare("UPDATE mascota SET nombres_propietario = ?, tipo_mascota = ?, nombre_mascota = ?, sexo_mascota = ?, color_mascota = ?, fecha_nacimiento = ? where id = ?;");
$resultado = $sentencia->execute([$nombres_propietario, $tipo_mascota, $nombre_mascota, $sexo_mascota, $color_mascota, $fecha_nacimiento, $codigo]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=editado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
