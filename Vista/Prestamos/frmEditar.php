<div class="container-fluid p-5">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Editar Prestamos</h6>
        <form method="POST" action="?controlador=prestamos&accion=editar" id="frmEditar" onsubmit="return false">
            <div class="row">
                <div class="col-lg-6">
                    <label for="fechaprestamo" class="form-label">Fecha Prestamo</label>
                    <input type="date" class="form-control" id="fechaprestamo" name="fechaprestamo" value="<?php echo date('Y-m-d', strtotime($this->infoPrestamos["fecha_prestamo"])); ?>">
                </div>
                <div class="col-lg-6">
                    <label for="fechadevolucion" class="form-label">Fecha Devolucion</label>
                    <input type="date" class="form-control" id="fechadevolucion" name="fechadevolucion" value="<?php echo date('Y-m-d', strtotime($this->infoPrestamos["fecha_devolucion"])); ?>">
                </div>
            </div> 
            <input type="hidden" name="id" id="id" value="<?php echo $this->infoPrestamos["pres_id"]; ?>">    
            <button type="submit" class="btn btn-outline-success mt-4" onclick='editarPres()'>Guardar</button>                
        </form>
    </div>     
</div>
