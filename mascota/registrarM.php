<?php
//print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["txtPropietario"]) || empty($_POST["txtTipoM"]) || empty($_POST["txtNombreM"]) || empty($_POST["txtSexoM"]) || empty($_POST["txtColorM"]) || empty($_POST["txtFechaNacimiento"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'model/conexionM.php';
$nombres_propietario = $_POST['txtPropietario'];
$tipo_mascota = $_POST['txtTipoM'];
$nombre_mascota = $_POST['txtNombreM'];
$sexo_mascota = $_POST['txtSexoM'];
$color_mascota = $_POST['txtColorM'];
$fecha_nacimiento = $_POST['txtFechaNacimiento'];

$sentencia = $bd->prepare("INSERT INTO mascota(nombres_propietario,tipo_mascota,nombre_mascota, sexo_mascota, color_mascota,fecha_nacimiento) VALUES (?,?,?,?,?,?);");
$resultado = $sentencia->execute([$nombres_propietario, $tipo_mascota, $nombre_mascota, $sexo_mascota, $color_mascota, $fecha_nacimiento]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
