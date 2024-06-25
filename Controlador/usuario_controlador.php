<?php
require_once "Modelo/usuario_modelo.php";
class usuario_controlador
{
    public function __construct()
    {
        if (!isset($_SESSION["id"]))
            header("location:/adsi");
        $this->obj = new Plantilla();
    }

    public function principal()
    {
        $this->obj->usuarios = usuario_modelo::listar();
        $this->obj->unirPagina("Usuario/Principal");
    }

    public function frmRegistrar()
    {
        $this->obj->unirPagina("Usuario/frmRegistrar");
    }

    public function frmLogin()
    {
        $this->obj->unirPagina("Usuario/Principal");
    }

    public function registrar()
    {
        if (isset($_POST['id']) && isset($_POST['nombre'])  && isset($_POST['usuario']) && isset($_POST['password'])) {
            extract($_POST);
            if (trim($id) == "" or trim($nombre) == ""  or trim($usuario) == "" or trim($password) == "") {
                echo json_encode(array("estado" => 3, "mensaje" => "Debe completar los campos", "icon" => "error"));
            } else {
                $datos['id'] = $id;
                $datos['nombre'] = $nombre;
                $datos['usuario'] = $usuario;
                $datos['password'] = $password;


                $res = usuario_modelo::buscarXusuario($usuario);
                $res = usuario_modelo::buscarXid($id);
                if (is_array($res)) {
                    echo json_encode(array("estado" => 2, "mensaje" => "Ese usuario ya existe", "icon" => "error"));
                } else {
                    $res = usuario_modelo::registrar($datos);
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
        $this->obj->infoUsuario = usuario_modelo::buscarXid($id);
        $this->obj->unirPagina("Usuario/frmEditar");
    }

    public function editar()
    {
        
        if (isset($_POST['nombre']) && isset($_POST['usuario']) && isset($_POST['id'])) {
            extract($_POST);
            if (trim($nombre) == "" or trim($usuario) == "") {
                echo json_encode(array("estado" => 3, "mensaje" => "Debe completar los campos", "icon" => "error"));
            } else {
                $datos['nombre'] = $nombre;
                $datos['usuario'] = $usuario;
                $datos['id'] = $id;

                $res = usuario_modelo::actualizar($datos);
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
            $r = usuario_modelo::eliminar($id);
        }
    }

    public function buscar()
    {
    }
}
