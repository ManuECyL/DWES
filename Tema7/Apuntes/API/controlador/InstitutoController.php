<?php

    require('./dao/InstitutoDAO.php');

    class InstitutoController extends Base {

        // Función para comprobar que método está usando (GET, POST, PUT, DELETE...)
        public static function institutos() {

            $metodo = $_SERVER['REQUEST_METHOD'];
            $recursos = self::divideURI();
            $filtros = self::condiciones();

            switch ($metodo) {

                case 'GET':
                    
                    // Si no hay nada después de index/institutos o si hay ?
                    if (count($recursos) == 2 && count($filtros) == 0) {
                        $datos = InstitutoDAO::findAll();
                    
                        
                    } else if (count($recursos) == 2 && count($filtros) > 0) {
                        self::buscaConFiltros();

                    // Se le pasa un id en la URI
                    } elseif (count($recursos) == 3) {
                        $datos = InstitutoDAO::findById($recursos[2]);
                    
                    // Que sea 3 o > 3
                    }

                    // Convertimos el array en un json
                    $datos = json_encode($datos);

                    // Mostramos los datos
                    self::response('HTTP/1.0 200 OK', $datos);

                    break;
                
                case 'POST':
                    # code...
                    break;

                case 'PUT':
                    # code...
                    break;

                case 'DELETE':
                    # code...
                    break;

                default:
                    self::response("HTTP/1.0 404 No permite el metodo utilizado");
                    break;
            }
        }

        // Comprobar si el nombre del filtro/parámetro está permitido
        static function buscaConFiltros() {

            $permitimos = ['nombre', 'localidad'];
            $filtros = self::condiciones();

            foreach ($filtros as $key => $value) {
                
                if (!in_array($key, $permitimos)) {
                    self::response("HTTP/1.0 404 No permite usar el parametro: " .$key);
                }
            }

        }

    }

?>