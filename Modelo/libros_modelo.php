<?php

class libros_modelo{


    public static function registrar($info){
        $i=new conexion();
        $con= $i->getConexion();
        $sql="INSERT INTO libros(lib_id, lib_nombre, lib_autor)
        VALUES
        (?,?,?)";
        $st=$con->prepare($sql);
        
        $v=array(

            $info['lib_id'],
            $info['lib_nombre'] , 
            $info['lib_autor'],
            
            );
        return $st->execute($v);
    }


    public static function listar($condicion=""){
        $i=new conexion();
        $con= $i -> getConexion();
        $sql="SELECT * FROM libros $condicion";
        $st=$con -> prepare($sql);
        $st -> execute();
        return $st -> FetchAll();
    }

    public static function actualizar($info){
        
        $i=new conexion();
        $con= $i->getConexion();
        $sql="UPDATE libros SET lib_nombre = ?, lib_autor = ? WHERE lib_id=?";
        
        $st=$con->prepare($sql);
        $v=array(
            $info['lib_nombre'] , 
            $info['lib_autor'],
            $info['lib_id']
        );
           
        return $st->execute($v);
    }

    public static function eliminar($id) {
        $i = new conexion();
        $con = $i->getConexion();
        $sql = "DELETE FROM libros WHERE lib_id = ?";
        $st = $con->prepare($sql);
        $v = array($id);
        return $st->execute($v);
    }
    

    public static function buscarXnombre($nombre){
        $i=new conexion();
        $con= $i -> getConexion();
        $sql="SELECT * FROM libros WHERE lib_nombre= ?";
        $st=$con -> prepare($sql);
        $v=array($nombre);
        $st -> execute($v);
        return $st -> fetch();
    }

    public static function buscarXid($id){
        $i=new conexion();
        $con= $i -> getConexion();
        $sql="SELECT * FROM libros WHERE lib_id= ?";
        $st=$con -> prepare($sql);
        $v=array($id);
        $st -> execute($v);
        return $st -> fetch();
    }

    
}


