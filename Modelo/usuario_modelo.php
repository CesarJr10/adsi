<?php

class usuario_modelo{


    public static function registrar($info){
        $i=new conexion();
        $con= $i->getConexion();
        $sql="INSERT INTO usuarios(id, nombre, usuario, clave)
        VALUES
        (?,?,?,?)";
        $st=$con->prepare($sql);
        
        $v=array(

            $info['id'],
            $info['nombre'] , 
            $info['usuario'],
            $info['password'],
            );
        return $st->execute($v);
    }


    public static function listar($condicion=""){
        $i=new conexion();
        $con= $i -> getConexion();
        $sql="SELECT * FROM usuarios $condicion";
        $st=$con -> prepare($sql);
        $st -> execute();
        return $st -> FetchAll();
    }

    public static function actualizar($info){
        
        $i=new conexion();
        $con= $i->getConexion();
        $sql="UPDATE usuarios SET nombre = ?, usuario = ? WHERE id=?";
        
        $st=$con->prepare($sql);
        $v=array(
            $info['nombre'] , 
            $info['usuario'],
            $info['id']
        );
           
        return $st->execute($v);
    }

    public static function eliminar($id){
        $i=new conexion();
        $con = $i -> getConexion();
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $st = $con -> prepare($sql);
        $v = array($id);
        return $st -> execute($v);
    }

    public static function buscarXusuario($usuario){
        $i=new conexion();
        $con= $i -> getConexion();
        $sql="SELECT * FROM usuarios WHERE usuario= ?";
        $st=$con -> prepare($sql);
        $v=array($usuario);
        $st -> execute($v);
        return $st -> fetch();
    }

    public static function buscarXid($id){
        $i=new conexion();
        $con= $i -> getConexion();
        $sql="SELECT * FROM usuarios WHERE id= ?";
        $st=$con -> prepare($sql);
        $v=array($id);
        $st -> execute($v);
        return $st -> fetch();
    }

    
}


