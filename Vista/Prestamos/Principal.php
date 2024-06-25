<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="bg-light rounded p-4">
            <?php
           
                echo "<h3>PRESTAMOS</h3>
                <a href='?controlador=prestamos&accion=frmRegistrar' class='btn btn-outline-primary'><span class='material-symbols-outlined'>
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
                            <th scope="col">ID</th>
                            <th scope="col">ID usuario</th>
                            <th scope="col">Nombre usuario</th>
                            <th scope='col'>ID libro</th>
                            <th scope="col">Nombre libro</th>
                            <th scope='col'>Fecha prestamo</th>
                            <th scope='col'>Fecha devolucion</th>
                            <th scope='col'></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($this->prestamos as $info) {
                            $id = $info["pres_id"];
                            echo "<tr>";
                            echo "<td>" . $info["pres_id"] . "</td>";
                            echo "<td>" . $info["usu_idFK"] . "</td>";
                            echo "<td>" . $info["nombre"] . "</td>";
                            echo "<td>" . $info["lib_idFK"] . "</td>";
                            echo "<td>" . $info["lib_nombre"] . "</td>";
                            echo "<td>" . $info["fecha_prestamo"] . "</td>";
                            echo "<td>" . $info["fecha_devolucion"] . "</td>";
                                echo "<td class='text-center' > <button class='btn btn-outline-danger' onclick='EliminarPrestamo(\"$id\", this)'><span class='material-symbols-outlined'>
                                delete
                                </span></button>  
                            <a class='btn btn-outline-primary' href='?controlador=prestamos&accion=frmEditar&id=$id' ><span class='material-symbols-outlined'>
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