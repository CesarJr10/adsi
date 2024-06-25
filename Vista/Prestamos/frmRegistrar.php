<?php
    require_once 'Modelo/usuario_modelo.php';
    require_once 'Modelo/libros_modelo.php';
    $usuarios = usuario_modelo::listar();
    $libros = libros_modelo::listar();
?>

<div class="container-fluid p-5">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Registrar Prestamo</h6>
        <form method="POST" action="?controlador=prestamos&accion=registrar" id="frm" onsubmit="return false">
            <div class="row">
                <!-- <div class="col-lg-6">
                    <label for="id" class="form-label">ID</label>
                    <input type="number" class="form-control" id="id" name="id">
                </div> -->
                <div class="col-lg-6">
                    <label for="idusuario" class="form-label">ID usuario</label>
                    <select name="idusuario" id="idusuario" class="form-select" aria-label="Default select example">
                        <option value="" selected>Seleccione un id de usuario</option>
                        <?php foreach ($usuarios as $usuario) { ?>
                            <option value="<?php echo $usuario["id"]; ?>"><?php echo $usuario["id"]; ?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <div class="col-lg-6">
                    <label for="idlibro" class="form-label">ID libro</label>
                    <select name="idlibro" id="idlibro" class="form-select" aria-label="Default select example">
                        <option value="" selected>Seleccione un id de libro</option>
                        <?php foreach ($libros as $libro) { ?>
                            <option value="<?php echo $libro["lib_id"]; ?>"><?php echo $libro["lib_id"]; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label for="fechaprestamo" class="form-label">Fecha prestamo</label>
                    <input type="date" class="form-control" id="fechaprestamo" name="fechaprestamo" value="<?php echo $prestamo['fecha_prestamo'] ?? ''; ?>">
                </div>
                <div class="col-lg-6">
                    <label for="fechadevolucion" class="form-label">Fecha devolucion</label>
                    <input type="date" class="form-control" id="fechadevolucion" name="fechadevolucion" value="<?php echo $prestamo['fecha_devolucion'] ?? ''; ?>">
                </div>
                <div class="col-lg-12 mt-4">
                    <button type="submit" class="btn btn-outline-success" onclick="regisPres()">
                        Guardar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>