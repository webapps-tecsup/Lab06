<?php include 'template/headerMasc.php' ?>

<?php
include_once "model/conexionM.php";
$sentencia = $bd->query("select * from mascota");
$mascota = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($persona);
?>

<div class="container-fluid mt-5 " style="padding-top: 60px;">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Rellena todos los campos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>


            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Registrado!</strong> Se agregaron los datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>



            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Vuelve a intentar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>



            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Cambiado!</strong> Los datos fueron actualizados.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>


            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Eliminado!</strong> Los datos fueron borrados.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de mascotas
                </div>
                <div class="">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Propietario</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Mascota</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Color</th>
                                <th scope="col">F.Nacimiento</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($mascota as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->id; ?></td>
                                    <td><?php echo $dato->nombres_propietario; ?></td>
                                    <td><?php echo $dato->tipo_mascota; ?></td>
                                    <td><?php echo $dato->nombre_mascota; ?></td>
                                    <td><?php echo $dato->sexo_mascota; ?></td>
                                    <td><?php echo $dato->color_mascota; ?></td>
                                    <td><?php echo $dato->fecha_nacimiento; ?></td>
                                    <td><a class="text-success" href="editarM.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminarM.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrarM.php">
                    <div class="mb-3">
                        <label class="form-label">Propietario: </label>
                        <input type="text" class="form-control" name="txtPropietario" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de Mascota: </label>
                        <select class="form-select" name="txtTipoM" aria-label="Default select example">
                            <option selected>Seleccionar tipo</option>
                            <option value="Perro">Perro</option>
                            <option value="Gato">Gato</option>
                        </select>
                        <!-- <input type="text" class="form-control" name="txtTipoM" autofocus required> -->
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre de Mascota: </label>
                        <input type="text" class=" form-control" name="txtNombreM"  required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sexo: </label>
                        <input type="text" class=" form-control" name="txtSexoM" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Color: </label>
                        <input type="text" class=" form-control" name="txtColorM"  required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de Nacimiento: </label>
                        <input type="date" class="form-control" name="txtFechaNacimiento"  required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary " value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footerMasc.php' ?>