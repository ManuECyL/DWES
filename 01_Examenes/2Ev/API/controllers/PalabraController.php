<?php

    require('./dao/PalabraDAO.php');

    class PalabraController extends Base {

        // Función para comprobar que método se está usando
        public static function palabras() {
            $metodo = $_SERVER['REQUEST_METHOD'];
            $recursos = self::divideURI();
            $filtros = self::condiciones();

            if ($metodo == 'GET') {
                                                      
                // Si no hay nada después de index/palabras(recursos) o si hay ? y algo más después(filtros/parametros)
                if (count($recursos) == 2 && count($filtros) == 0) {
                    $datos = PalabraDAO::findPalabra();
                    
                } else if (count($recursos) == 2 && count($filtros) > 0) {
                    $datos = self::buscaConFiltros();
       
                } else {
                    self::response("HTTP/1.0 404 No esta indicando los recursos necesarios");
                }

                // Convertimos el array en un json
                $datos = json_encode($datos);

                // Mostramos los datos
                self::response('HTTP/1.0 200 OK', $datos);
                
            }
        }

        static function buscaConFiltros() {

            $permitimos = ['num_letras'];
            $filtros = self::condiciones();

            foreach ($filtros as $key => $value) {
                
                if (!in_array($key, $permitimos)) {
                    self::response("HTTP/1.0 400 No permite usar el parametro: " .$key);
                }
            }

            return PalabraDAO::findByFiltros($filtros);
        }

    }
?>