<?php
require('./dao/EstadisticaDAO.php');
class EstadisticaController extends Base
{
    public static function estadisticas()
    {
        $metodo = $_SERVER['REQUEST_METHOD'];
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        switch ($metodo) {
            case 'GET':
                if (count($recursos) === 2 && count($filtros) === 0) { // find all
                    $datos = EstadisticaDAO::findAll();
                } else if (count($recursos) === 3) { // buscar por id usuario
                    $datos = EstadisticaDAO::findByIdUsuario($recursos[2]);
                } else {
                    Base::response("HTTP/1.0 400 Direccion incorrecta");
                }
                $datos = json_encode($datos);
                self::response('HTTP/1.0 200 OK', $datos);
                break;

            case 'POST':
                $datos = json_decode(file_get_contents('php://input'), true);
                if ( // comprobar que existe los datos necesarios
                    isset($datos['id_usuario']) && isset($datos['id_palabra']) &&
                    isset($datos['resultado']) && isset($datos['intentos'])
                ) {
                    $estadistica = new Estadistica(
                        null,
                        $datos['id_usuario'],
                        $datos['id_palabra'],
                        $datos['resultado'],
                        $datos['intentos'],
                        date('Y-m-d')
                    );
                    if (EstadisticaDAO::insert($estadistica)) {
                        self::response("HTTP/1.0 201 Insertado correctamente");
                    }
                } else {
                    self::response("HTTP/1.0 400 No esta introduciendo los atributos de estadistica necesarios");
                }
                break;

            default:
                self::response("HTTP/1.0 400 No permite el metodo utilizado");
                break;
        }
    }





}
