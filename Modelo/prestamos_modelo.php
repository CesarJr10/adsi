<?php

class prestamos_modelo
{


    public static function registrar($info)
    {
        $i = new conexion();
        $con = $i->getConexion();

        $sql = "INSERT INTO prestamos( usu_idFK, lib_idFK, fecha_prestamo, fecha_devolucion) 
                VALUES (?, ?, ?, ?)";

        $st = $con->prepare($sql);

        //$st->bindValue(1, $info['pres_id'], PDO::PARAM_INT);
        $st->bindValue(1,$info['usu_idFK'],PDO::PARAM_INT);
        $st->bindValue(2,$info['lib_idFK'],PDO::PARAM_INT);
        $st->bindValue(3,$info['fecha_prestamo'],PDO::PARAM_STR);
        $st->bindValue(4,$info['fecha_devolucion'],$info['fecha_devolucion'] ===NULL? PDO::PARAM_NULL : PDO::PARAM_STR);

        return $st->execute();
    }


    public static function listar($condicion = "")
    {
        $i = new conexion();
        $con = $i->getConexion();
        $sql = "SELECT pres_id, lib_nombre, nombre, fecha_prestamo, fecha_devolucion, usu_idFK, lib_idFK 
              FROM prestamos 
              INNER JOIN usuarios ON usu_idFK = id
              INNER JOIN libros ON lib_idFK = lib_id $condicion ";
        $st = $con->prepare($sql);
        $st->execute();
        return $st->FetchAll();
    }

    public static function actualizar($info)
    {
        $i = new conexion();
        $con = $i->getConexion();
        $sql = "UPDATE prestamos SET fecha_prestamo = ?, fecha_devolucion = ? WHERE pres_id = ?";

        $st = $con->prepare($sql);
        $v = array(
            $info['fecha_prestamo'],
            $info['fecha_devolucion'],
            $info['pres_id']
        );

        return $st->execute($v);
    }


    public static function eliminar($id)
    {
        $i = new conexion();
        $con = $i->getConexion();
        $sql = "DELETE FROM prestamos WHERE pres_id = ?";
        $st = $con->prepare($sql);
        $v = array($id);
        return $st->execute($v);
    }


    public static function usuarioTienePrestamoActivo($usu_idFK, $lib_idFK) {

        $i=new conexion();
        $con=$i->getConexion();

        $sql="SELECT COUNT(*) as count FROM prestamos 
              WHERE usu_idFK = ? AND lib_idFK = ? AND fecha_devolucion IS NULL";

        $st=$con->prepare($sql);
        $st->execute([$usu_idFK,$lib_idFK]);
        $result=$st->fetch();

        return $result['count'] > 0;
    }

    public static function buscarXid($id)
    {
        $i = new conexion();
        $con = $i->getConexion();
        $sql = "SELECT * FROM prestamos WHERE pres_id= ?";
        $st = $con->prepare($sql);
        $v = array($id);
        $st->execute($v);
        return $st->fetch();
    }
}
