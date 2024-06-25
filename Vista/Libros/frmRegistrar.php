<div class="container-fluid p-5">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Registrar Libro</h6>
            <form method="POST" action="?controlador=libro&accion=registrar" id="frm" onsubmit="return false">
                <div class="row">
                <div class="col-lg-6">
                        <label for="nombre" class="form-label">ID</label>
                        <input type="number" class="form-control" id="id" name="id">
                    </div>
                    <div class="col-lg-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                     <div class="col-lg-6">
                        <label for="apellidos" class="form-label">Autor</label>
                        <input type="text" class="form-control" id="autor" name="autor">
                    </div>

                    <br><br><br><br>
                </div>     
                <button type="submit" class="btn btn-outline-success mt-4" onclick='regisLib()'>Guardar</button>                
            </form>
        </div>     
</div>