<?php



/* Clase UsuarioPDO
 * Clase que realizará las consultas relacionadas con el usuario
 * @category model
 * @autor Alex Dominguez
 * @version 1.0   
 */

class EstadisticaPDO {
    /* Función validarUsuario
     * Se le pasan el $codUsuario y $password, y si lo encuentra en la BD devuelve un array con todos los datos del usuario
     * @access public
     * @param $codUsuario
     * @param $password
     * @return Usuario $Usuarios
     */

    public static function findAll() {

            $consulta = "SELECT estadisticas.id_estadistica, estadisticas.id_usuario, palabras.palabra, 
            estadisticas.resultado, estadisticas.intentos, estadisticas.fecha 
            FROM estadisticas join palabras using(id_palabra)"; //Creacion de la consulta.
        $resConsulta = DBPDO::ejecutaConsulta($consulta, []); //Ejecutamos la consulta.
        $registros = $resConsulta->fetchAll(PDO::FETCH_ASSOC);
        return $registros;
    }
    //busca uno
    public static function findByUser($id) {

        $consulta = "SELECT estadisticas.id_estadistica, estadisticas.id_usuario, palabras.palabra, 
        estadisticas.resultado, estadisticas.intentos, estadisticas.fecha FROM estadisticas join palabras
        using (id_palabra) where id_usuario = ?"; //Creacion de la consulta.
        $resConsulta = DBPDO::ejecutaConsulta($consulta, [$id]); //Ejecutamos la consulta.
        $registros = $resConsulta->fetchAll(PDO::FETCH_ASSOC);
        return $registros;
    }
   
    //post
    public static function insert($estadistica) {
        $consulta = "INSERT INTO estadisticas values (null, ?, ? , ? , ? ,?);";
        $return = DBPDO::ejecutaConsulta($consulta, [$estadistica->id_usuario,$estadistica->id_palabra,$estadistica->resultado,$estadistica->intentos, $estadistica->fecha ]);
        
        if($return->rowCount()> 0)
        return true;
    return false;
    }


}
