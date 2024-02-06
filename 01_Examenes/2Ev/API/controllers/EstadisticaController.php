<?php

    require('./dao/EstadisticaDAO.php');

    class EstadisticaController extends Base {

        // Función para comprobar que método se está usando
        public static function estadisticas() {
            $metodo = $_SERVER['REQUEST_METHOD'];
            $recursos = self::divideURI();
            $filtros = self::condiciones();

            if ($metodo == 'GET') {
                                                      
                // Si no hay nada después de index/palabras(recursos) o si hay ? y algo más después(filtros/parametros)
                if (count($recursos) == 2 && count($filtros) == 0) {
                    $datos = EstadisticaDAO::findAll();
                    
                // Se le pasa un id en la URI
                } elseif (count($recursos) == 3) {
                    $datos = EstadisticaDAO::findById($recursos[2]);
       
                } else {
                    self::response("HTTP/1.0 404 No esta indicando los recursos necesarios");
                }

                // Convertimos el array en un json
                $datos = json_encode($datos);

                // Mostramos los datos
                self::response('HTTP/1.0 200 OK', $datos);
                
            }
        }

    }
?>