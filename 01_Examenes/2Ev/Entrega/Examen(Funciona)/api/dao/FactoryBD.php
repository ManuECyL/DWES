<?php
require('./config/confBD.php');
class FactoryBD
{
    public static function realizaConsulta($sql, $arr_parametros)
    {
        try {
            $conn = new PDO("mysql:host=" . IP . ";dbname=" . BBDD, USER, PASS);
            $stmt = $conn->prepare($sql);
            $stmt->execute($arr_parametros);

        } catch (PDOException $e) {
            Base::response('HTTP/ 1.0 500 Error interno del servidor',$e->getMessage());
            unset($conn);
        }
        return $stmt;
    }
}

?>