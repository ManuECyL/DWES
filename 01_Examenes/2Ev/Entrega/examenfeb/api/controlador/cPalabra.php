<?

class CPalabra extends BaseController
{

    static function palabras()
    {
        $string = self::getQueryStringParams();
        $uri = self::getUriSegments();
        switch ($_SERVER['REQUEST_METHOD']) {
            case "GET":
                //si tiene parametro
                try {
                    //$parametros = self::getQueryStringParams();
                    if ((count($string) > 0)){
                        if(isset($string['min']))
                        $datos = PalabraDAO::findAllMin($string['min']);
                        else
                        self::sendOutput(
                            '',
                            array('Content-Type: application/json', 'HTTP/1.1 400 No permite el parametro')
                        );
                    }else
                        $datos = PalabraDAO::findAll();
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


            default:
                header("HTTP/1.1 400 BAD REQUEST");
        }
    }
}
