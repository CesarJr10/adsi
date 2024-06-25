<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="bg-light rounded p-4">
            <?php
           
                echo "<h3>LIBROS</h3>
                <a href='?controlador=libros&accion=frmRegistrar' class='btn btn-outline-primary'><span class='material-symbols-outlined'>
                person_add
                </span></a>";
            ?>

        </div>
    </div>


    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-lg- 12">
                <table class="table table-striped table-hover table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">autor</th>
                            <th scope='col'>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($this->libros as $info) {
                            $id = $info["lib_id"];
                            echo "<tr>";
                            echo "<td>" . $info["lib_nombre"] . "</td>";
                            echo "<td>" . $info["lib_autor"] . "</td>";
                                echo "<td class='text-center' > <button class='btn btn-outline-danger' onclick='EliminarLibro(\"$id\", this)'><span class='material-symbols-outlined'>
                                delete
                                </span></button>  
                            <a class='btn btn-outline-primary' href='?controlador=libros&accion=frmEditar&id=$id' ><span class='material-symbols-outlined'>
                            edit
                            </span></a></td>";
                                echo "</tr>";
                            
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
    </style>