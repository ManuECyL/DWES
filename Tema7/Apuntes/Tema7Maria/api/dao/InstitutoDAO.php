<?php
require ('./modelo/Instituto.php');
require ('./dao/FactoryBD.php');

class InstitutoDAO {
    public static function findAll(){
        $sql = "select * from institutos";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql,$parametros);            
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id){
        $sql = "select * from institutos where id = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql,$parametros);            
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delete($id){
        $sql = "DELETE FROM institutos WHERE id = ?";
        $parametros = array($id);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        if($result->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public static function findByFiltros($filtros){
        $num = count($filtros);
        $parametros = array();       
        $sql = "select * from institutos where ";
        foreach ($filtros as $key => $value) {
            if($key == 'nombre'){
                $sql .= $key ." LIKE ? ";
                $valor = '%'.$value."%";
                array_push($parametros,$valor);
            }else{
                $sql .= $key ." = ? ";
                array_push($parametros,$value);
            }
            if($num == 2){
                $num --;
                $sql .= ' and ';
            }
        }
        $result = FactoryBD::realizaConsulta($sql,$parametros);            
        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function insert($instituto){
        $sql = "insert into institutos values (null,?,?,?)";
        $parametros = array(
            $instituto->nombre,
            $instituto->localidad,
            $instituto->telefono
        );
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0)
            return true;
    }

    public static function findLast(){
        $sql = "select * from institutos 
        order by id desc limit 1";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql,$parametros);            
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function update($instituto){
        $sql = "update institutos set nombre = ? , localidad = ?, telefono = ?
        where id = ?";
        $parametros = array(
            $instituto->nombre,
            $instituto->localidad,
            $instituto->telefono,
            $instituto->id
        );
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0)
            return true;

    }
}