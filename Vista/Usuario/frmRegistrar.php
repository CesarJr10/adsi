<div class="container-fluid p-5">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Registrar</h6>
            <form method="POST" action="?controlador=usuario&accion=registrar" id="frm" onsubmit="return false">
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
                        <label for="apellidos" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario">
                    </div>
                     <div class="col-lg-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <br><br><br><br>
                </div>     
                <button type="submit" class="btn btn-outline-success mt-4" onclick='regisUsu()'>Guardar</button>                
            </form>
        </div>     
</div>