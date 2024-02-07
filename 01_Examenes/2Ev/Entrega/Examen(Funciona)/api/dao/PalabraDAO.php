<?
require('./dao/FactoryBD.php');

class PalabraDAO
{
    public static function findById($id)
    {
        $sql = "SELECT * FROM palabras WHERE id_palabra = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql, $parametros);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findByFiltros($min)
    {
        // obtener todas las palabras que cumplen con el minimo de letras
        $sql = "SELECT * FROM palabras WHERE num_letras > ?";
        $parametros = array($min);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $palabras = $result->fetchAll(PDO::FETCH_ASSOC);

        // devolver una aleatoria
        return $palabras[rand(0, count($palabras)-1)];
      
    }

}
