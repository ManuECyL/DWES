<?php
class AlbaranDAO{

    public static function findByAll(){
        $sql="SELECT * FROM ALBARAN WHERE activo=1";
        $stmt=FactoryBD::realizaConsulta($sql, array());
        $albaranes=array();
        while($fila=$stmt->fetch(PDO::FETCH_OBJ)){
            $albaranes[]=new Albaran($fila->Id,$fila->cod_producto,$fila->cantidad,$fila->fecha,$fila->usuario,$fila->activo);
        }
        return $albaranes;
    }

    public static function findById($id){
        $sql="SELECT * FROM ALBARAN WHERE id=? AND activo=1";
        $stmt=FactoryBD::realizaConsulta($sql, array($id));
        if($stmt->rowCount()==1){
            $fila=$stmt->fetch(PDO::FETCH_OBJ);
            $albaran=new Albaran($fila->Id,$fila->cod_producto,$fila->cantidad,$fila->fecha,$fila->usuario,$fila->activo);
            return $albaran;
        }else{
            return null;
        }
    }

    public static function insert($albaran){
        $sql="INSERT INTO ALBARAN (cod_producto,cantidad,fecha,usuario,activo) VALUES (?,?,?,?,?)";
        $stmt=FactoryBD::realizaConsulta($sql, array($albaran->cod_producto,$albaran->cantidad,$albaran->fecha,$albaran->usuario,$albaran->activo));
        if($stmt){
            return true;
        }else{
            return false;
        }
    }

    public static function update($albaran){
        $sql="UPDATE ALBARAN SET cod_producto=?,cantidad=?,fecha=?,usuario=?,activo=? WHERE id=?";
        $stmt=FactoryBD::realizaConsulta($sql, array($albaran->cod_producto,$albaran->cantidad,$albaran->fecha,$albaran->usuario,$albaran->activo,$albaran->id));
        if($stmt){
            return true;
        }else{
            return false;
        }
    }

    public static function delete($id){
        $sql="UPDATE ALBARAN SET activo=0 WHERE id=?";
        $stmt=FactoryBD::realizaConsulta($sql, array($id));
        if($stmt){
            return true;
        }else{
            return false;
        }
    }

    

}