<?php include 'template/headerMasc.php' ?>

<?php
if (!isset($_GET['codigo'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include_once 'model/conexionM.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("select * from mascota where id = ?;");
$sentencia->execute([$codigo]);
$mascota = $sentencia->fetch(PDO::FETCH_OBJ);

$perro = $mascota->tipo_mascota == "Perro" ? "selected" : "";
$gato = $mascota->tipo_mascota == "Gato" ? "selected" : "";

?>
<div class="container " style="margin-top: 120px">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProcesoM.php">
                    <div class="mb-2">
                        <label class="form-label">Propietario: </label>
                        <input type="text" class="form-control" name="txtPropietario" autofocus required value="<?php echo $mascota->nombres_propietario; ?>">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Tipo de Mascota: </label>
                        <select class="form-select" name="txtTipoM" aria-label="Default select example">
                            <option <?php echo $perro; ?> value="Perro">Perro</option>
                            <option <?php echo $gato; ?> value="Gato">Gato</option>
                        </select>
                        <!-- <input type="text" class="form-control" name="txtTipoM" required value="<?php echo $mascota->tipo_mascota; ?>"> -->
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Nombre de Mascota: </label>
                        <input type="text" class=" form-control" name="txtNombreM" required value="<?php echo $mascota->nombre_mascota; ?>">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Sexo: </label>
                        <input type="text" class=" form-control" name="txtSexoM" required value="<?php echo $mascota->sexo_mascota; ?>">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Color: </label>
                        <input type="text" class=" form-control" name="txtColorM" required value="<?php echo $mascota->color_mascota; ?>">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Fecha de Nacimiento: </label>
                        <input type="date" class="form-control" name="txtFechaNacimiento" required value="<?php echo $mascota->fecha_nacimiento; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $mascota->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footerMasc.php' ?>