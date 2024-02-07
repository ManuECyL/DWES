<?php



/* Clase UsuarioPDO
 * Clase que realizará las consultas relacionadas con el usuario
 * @category model
 * @autor Alex Dominguez
 * @version 1.0   
 */

class PalabraDAO {
    /* Función validarUsuario
     * Se le pasan el $codUsuario y $password, y si lo encuentra en la BD devuelve un array con todos los datos del usuario
     * @access public
     * @param $codUsuario
     * @param $password
     * @return Usuario $Usuarios
     */

    public static function findAll() {

        $consulta = "SELECT * FROM palabras"; //Creacion de la consulta.
        $resConsulta = DBPDO::ejecutaConsulta($consulta, []); //Ejecutamos la consulta.
        $registros = $resConsulta->fetchAll(PDO::FETCH_BOTH);
        $max = $resConsulta->rowCount();
        $num = random_int(0,$max-1);
        return $registros[$num];
    }
    //busca uno
    public static function findAllMin($id) {

        $consulta = "SELECT * FROM palabras where num_letras >= ?"; //Creacion de la consulta.
        $resConsulta = DBPDO::ejecutaConsulta($consulta, [$id]); //Ejecutamos la consulta.
        $registros = $resConsulta->fetchAll(PDO::FETCH_BOTH);
        $max = $resConsulta->rowCount();
        $num = random_int(0,$max-1);
        return $registros[$num];
    }
   

}
