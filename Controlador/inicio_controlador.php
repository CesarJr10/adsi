<?php
require_once "Modelo/inicio_modelo.php";
class inicio_controlador{
    public function __construct(){
        $this-> obj= new Plantilla();
    }

    public function principal() {
        $this-> obj->unirPagina("Inicio/frmLogin",false);
    }

    public function dashboard() {
        if(!isset($_SESSION["id"]))
            header("location:/AppMVC");
        $this-> obj->unirPagina("Inicio/principal",true);
    }

    public function frmLogin() {
        $this-> obj->unirPagina("Inicio/frmLogin");
    }

    public function cerrarSession() {
        session_destroy();
        header("location:/adsi");
    }

    public function validarUsuario(){
        extract($_POST);
        if(isset($usuario) && isset($password)){
            $res= inicio_modelo::validarUsuario($usuario , $password);
            if(is_array($res)){
                $_SESSION['id']   = $res["id"];
                $_SESSION['nombre'] = $res["nombre"];
                echo json_encode(array("estado" =>1, "mensaje" => "Bienvenido"));
            }else{
                echo json_encode(array("estado" =>2, "mensaje" => "Usuario / Password errados"));
            }
        }else{
            echo json_encode(array("estado" =>2, "mensaje" => "Faltan Parametros"));
        }
    }
}
?>