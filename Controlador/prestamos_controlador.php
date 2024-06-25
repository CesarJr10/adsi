<?php
require_once "Modelo/prestamos_modelo.php";
class prestamos_controlador
{
    public function __construct()
    {
        if (!isset($_SESSION["id"]))
            header("location:/adsi");
        $this->obj = new Plantilla();
    }

    public function principal()
    {
        $this->obj->prestamos = prestamos_modelo::listar();
        $this->obj->unirPagina("Prestamos/Principal");
    }

    public function frmRegistrar()
    {
        $this->obj->unirPagina("Prestamos/frmRegistrar");
    }

    public function frmLogin()
    {
        $this->obj->unirPagina("Prestamos/Principal");
    }

    public function registrar()
    {
        if (isset($_POST['idusuario'])  && isset($_POST['idlibro']) && isset($_POST['fechaprestamo']) && isset($_POST['fechadevolucion'])) {
            extract($_POST);
            if ( trim($idusuario) == ""  or trim($idlibro) == "" or trim($fechaprestamo) == "") {
                echo json_encode(array("estado" => 3, "mensaje" => "Debe completar los campos minimos", "icon" => "error"));
            } else {

                if (prestamos_modelo::usuarioTienePrestamoActivo($idusuario, $idlibro)) {
                    echo json_encode(array("estado" => 4, "mensaje" => "El usuario ya tiene un préstamo activo para este libro", "icon" => "error"));
                    return;
                }
                //$datos['pres_id'] = $id;
                $datos['usu_idFK'] = $idusuario;
                $datos['lib_idFK'] = $idlibro;
                $datos['fecha_prestamo'] = $fechaprestamo;

                $datos['fecha_devolucion'] = trim($fechadevolucion) == "" ? NULL : $fechadevolucion;


                $res = prestamos_modelo::registrar($datos);
                if ($res > 0) {
                    echo json_encode(array("estado" => 1, "mensaje" => "Registrado", "icon" => "success"));
                } else {
                    echo json_encode(array("estado" => 2, "mensaje" => "Error No se pudo Registrar", "icon" => "error"));
                }
            }
        }
    }
    public function frmEditar()
    {
        $id = $_GET['id'];
        $this->obj->infoPrestamos = prestamos_modelo::buscarXid($id);
        $this->obj->unirPagina("prestamos/frmEditar");
    }

    public function editar()
    {

        if (isset($_POST['fechaprestamo']) && isset($_POST['fechadevolucion'])) {
            extract($_POST);
            if (trim($fechaprestamo) == "") {
                echo json_encode(array("estado" => 3, "mensaje" => "Debe completar el campo minimo", "icon" => "error"));
            } else {
                $datos['fecha_prestamo'] = $fechaprestamo;

                $datos['fecha_devolucion'] = trim($fechadevolucion) == "" ? NULL : $fechadevolucion;
                $datos['pres_id'] = $id;

                $res = prestamos_modelo::actualizar($datos);
                if ($res > 0) {
                    echo json_encode(array("estado" => 1, "mensaje" => "Editado", "icon" => "success"));
                } else {
                    echo json_encode(array("estado" => 2, "mensaje" => "Error No se pudo Editar", "icon" => "error"));
                }
            }
        }
    }

    public function eliminar()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $r = prestamos_modelo::eliminar($id);
            if ($r) {
                echo json_encode(array("estado" => 1, "mensaje" => "Eliminado", "icon" => "success"));
            } else {
                echo json_encode(array("estado" => 2, "mensaje" => "Error No se pudo Eliminar", "icon" => "error"));
            }
        } else {
            echo json_encode(array("estado" => 3, "mensaje" => "ID no especificado", "icon" => "error"));
        }
    }


    public function buscar()
    {
    }
}
