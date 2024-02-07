<?
require('./modelo/Estadistica.php');

class EstadisticaDAO
{
    public static function findAll()
    {
        $sql = "SELECT * FROM estadisticas";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }
    public static function findByIdUsuario($id)
    {
        $sql = "SELECT * FROM estadisticas WHERE id_usuario = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql, $parametros);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function insert($estadistica){
        $sql = "INSERT INTO estadisticas (id_usuario, id_palabra, resultado, intentos, fecha) VALUES (?,?,?,?,?) ";

        $parametros = array(
            $estadistica->id_usuario,
            $estadistica->id_palabra,
            $estadistica->resultado,
            $estadistica->intentos,
            $estadistica->fecha
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount()>0) {
            return true;
        }
        return false;

    }


}
