<?php
require_once "Modelo/libros_modelo.php";
class libros_controlador
{
    public function __construct()
    {
        if (!isset($_SESSION["id"]))
            header("location:/adsi");
        $this->obj = new Plantilla();
    }

    public function principal()
    {
        $this->obj->libros = libros_modelo::listar();
        $this->obj->unirPagina("Libros/Principal");
    }

    public function frmRegistrar()
    {
        $this->obj->unirPagina("Libros/frmRegistrar");
    }

    public function frmLogin()
    {
        $this->obj->unirPagina("Libros/Principal");
    }

    public function registrar()
    {
        if (isset($_POST['id']) && isset($_POST['nombre'])  && isset($_POST['autor'])) {
            extract($_POST);
            if (trim($id) == "" or trim($nombre) == ""  or trim($autor) == "") {
                echo json_encode(array("estado" => 3, "mensaje" => "Debe completar los campos", "icon" => "error"));
            } else {
                $datos['lib_id'] = $id;
                $datos['lib_nombre'] = $nombre;
                $datos['lib_autor'] = $autor;
                


                $res = libros_modelo::buscarXnombre($nombre);
                $res = libros_modelo::buscarXid($id);
                if (is_array($res)) {
                    echo json_encode(array("estado" => 2, "mensaje" => "Ese libro ya existe", "icon" => "error"));
                } else {
                    $res = libros_modelo::registrar($datos);
                    if ($res > 0) {
                        echo json_encode(array("estado" => 1, "mensaje" => "Registrado", "icon" => "success"));
                    } else {
                        echo json_encode(array("estado" => 2, "mensaje" => "Error No se pudo Registrar", "icon" => "error"));
                    }
                }
            }
        }
    }
    public function frmEditar()
    {
        $id = $_GET['id'];
        $this->obj->infoLibros = libros_modelo::buscarXid($id);
        $this->obj->unirPagina("Libros/frmEditar");
    }

    public function editar()
    {
        
        if (isset($_POST['nombre']) && isset($_POST['autor']) && isset($_POST['id'])) {
            extract($_POST);
            if (trim($nombre) == "" or trim($autor) == "") {
                echo json_encode(array("estado" => 3, "mensaje" => "Debe completar los campos", "icon" => "error"));
            } else {
                $datos['lib_nombre'] = $nombre;
                $datos['lib_autor'] = $autor;
                $datos['lib_id'] = $id;

                $res = libros_modelo::actualizar($datos);
                if ($res > 0) {
                    echo json_encode(array("estado" => 1, "mensaje" => "Editado", "icon" => "success"));
                } else {
                    echo json_encode(array("estado" => 2, "mensaje" => "Error No se pudo Editar", "icon" => "error"));
                }
            }
        }
    }

    public function eliminar() {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $r = libros_modelo::eliminar($id);
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
