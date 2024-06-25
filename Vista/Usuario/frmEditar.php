<div class="container-fluid p-5">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Editar</h6>
            <form method="POST" action="?controlador=usuario&accion=editar" id="frmEditar" onsubmit="return false">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="nombre" class="form-label">Nombres</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $this->infoUsuario["nombre"]?>"required>
                    </div>
                     <div class="col-lg-6">
                        <label for="apellidos" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $this->infoUsuario["usuario"]?>"required>
                    </div>
                </div> 
                <input type="hidden" name="id" id="id" value="<?php echo $this->infoUsuario["id"];?>">    
                <button type="submit" class="btn btn-outline-success mt-4" onclick='editarUsu()'>Guardar</button>                
            </form>
        </div>     
</div>