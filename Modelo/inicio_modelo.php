<?php 
class inicio_modelo{

    public static function validarUsuario($usuario,$password){
        $i=new conexion();
        $con=$i->getConexion();
        $sql="SELECT id, nombre FROM usuarios WHERE usuario =? AND clave =? ";
        $st=$con->prepare($sql);
        $v=array($usuario, $password);
        $st->execute($v);
        return $st->fetch();
    }
}










?>