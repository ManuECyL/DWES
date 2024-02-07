<?


class CEstadistica extends BaseController
{

    static function estadistica()
    {
        $string = self::getQueryStringParams();
        $uri = self::getUriSegments();
        switch ($_SERVER['REQUEST_METHOD']) {
            case "GET":
                //si tiene parametro
                try {
                    //$parametros = $this->getQueryStringParams();
                    
                    if (isset($uri[2])) {
                        $id = $uri[2];
                        $datos = UsuarioPDO::buscarUsuarios($id);
                    } else
                        if((count($string) > 0))
                             $datos = EstadisticaPDO::findByUser($string['usuario']);
                        else
                             $datos = EstadisticaPDO::findAll();
                    $responseData = json_encode($datos);
                } catch (Error $e) {
                    $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';
                    $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                    self::sendOutput(
                        json_encode(array('error' => $strErrorDesc)),
                        array('Content-Type: application/json', $strErrorHeader)
                    );
                }
                // si todo ha ido bien                
                    self::sendOutput(
                        $responseData,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                
                break;
            case "POST":
                $error = false;
                $data = file_get_contents('php://input');
                $data = json_decode($data,true);
                try {
                    if(!isset($data['id_usuario']) || !isset($data['id_palabra']) || !isset($data['resultado'])
                     || !isset($data['intentos']) || !isset($data['fecha']))
                    self::sendOutput(
                        json_encode(array('error' => "HTTP/1.1 400 Falta algun parametro")),
                        array('Content-Type: application/json', "HTTP/1.1 400 Falta algun parametro")
                    );
                    $u1 = new Estadistica($data['id_usuario'],
                    $data['id_palabra'],
                    $data['resultado'],
                    $data['intentos'],
                    $data['fecha']);
                    $error = EstadisticaPDO::insert($u1);

                    
                } catch (Error $e) {
                    $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';
                    $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                    self::sendOutput(
                        json_encode(array('error' => $strErrorDesc)),
                        array('Content-Type: application/json', $strErrorHeader)
                    );
                }
                if(!$error)
                self::sendOutput(
                    "Algo ha ido mal",
                    array('Content-Type: application/json', 'HTTP/1.1 400 Error')
                );
                else
                // si todo ha ido bien                
                    self::sendOutput(
                        json_encode($error)  ,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                
                break;
            
                
            default:
                header("HTTP/1.1 400 BAD REQUEST");
        }
    }
}
