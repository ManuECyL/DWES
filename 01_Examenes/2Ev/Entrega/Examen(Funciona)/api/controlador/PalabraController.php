<?php
require('./dao/PalabraDAO.php');
class PalabraController extends Base
{
    public static function palabras()
    {
        $metodo = $_SERVER['REQUEST_METHOD'];
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        switch ($metodo) {
            case 'GET':
                if (count($recursos) === 2 && count($filtros) === 0) {
                    $min = 0;
                    $max = 90;
                    $datos = "";
                    while (empty($datos)) { // busca otra palabra hasta que la encuentra
                        $datos = PalabraDAO::findById(rand($min, $max)); // buscar por id aleatorio
                    }
                } else if (count($recursos) === 2 && count($filtros) > 0) { // buscar con filtros (min)
                    $datos = self::buscaConFiltros();
                } else {
                    Base::response("HTTP/1.0 400 Direccion incorrecta");
                }
                $datos = json_encode($datos);
                self::response('HTTP/1.0 200 OK', $datos);
                break;

            default:
                self::response("HTTP/1.0 400 No permite el metodo utilizado");
                break;
        }
    }

    public static function buscaConFiltros()
    {
        $permitimos = ['min'];
        $filtros = self::condiciones();
        foreach ($filtros as $key => $value) {
            if (!in_array($key, $permitimos)) {
                self::response("HTTP/1.0 400 No permite el parametro " . $key);
            }
        }
        return PalabraDAO::findByFiltros($filtros['min']);

    }

}
