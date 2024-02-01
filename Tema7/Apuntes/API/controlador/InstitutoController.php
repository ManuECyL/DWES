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
                                        
                    // Si no hay nada después de index/institutos(recursos) o si hay ? y algo más después(filtros/parametros)
                    if (count($recursos) == 2 && count($filtros) == 0) {
                        $datos = InstitutoDAO::findAll();
                       
                    } else if (count($recursos) == 2 && count($filtros) > 0) {
                        $datos = self::buscaConFiltros();

                    // Se le pasa un id en la URI
                    } elseif (count($recursos) == 3) {
                        $datos = InstitutoDAO::findById($recursos[2]);
                    
                    } else {
                        self::response("HTTP/1.0 404 No esta indicando los recursos necesarios");
                    }

                    // Que sea 3 o > 3

                    // Convertimos el array en un json
                    $datos = json_encode($datos);

                    // Mostramos los datos
                    self::response('HTTP/1.0 200 OK', $datos);

                    break;
                
                
                case 'POST':

                    // Recogemos los datos que se han enviado
                    $datos = file_get_contents('php://input');

                    // Pasamos los datos a un array asociativo de un fichero JSON(string)
                    $datos = json_decode($datos, true);

                    // Si están introducidos los valores de los atributos
                    if (isset($datos['nombre']) && isset($datos['localidad']) && isset($datos['telefono'])) {
                        
                        // Creamos el objeto insti
                        $insti = new Instituto(null, $datos['nombre'], $datos['localidad'], $datos['telefono']);
                        
                        // Si se ha insertado correctamente
                        if (InstitutoDAO::insert($insti)) {
    
                            // Buscamos el objeto para devolverlo en el body. Como no sabemos el id, ya que es auto incremental, buscamos el último registro insertado
                            $insti = InstitutoDAO::findLast();
                            
                            $insti = json_encode($insti);
    
                            // Mostramos mensaje correcto y el instituto creado en el body
                            self::response("HTTP/1.0 201 Insertado Correctamente", $insti);
                        }
                    
                    } else {
                        self::response("HTTP/1.0 404 No esta introduciendo los atributos de instituto: nombre, localidad, telefono");
                    }

                    break;


                case 'PUT':
                    self::put();

                    break;


                case 'DELETE':

                    if (count($recursos) == 3) {

                        if(InstitutoDAO::delete($recursos[2])) {
                            self::response("HTTP/1.0 201 Eliminado Correctamente");

                        } else {
                            self::response("HTTP/1.0 404 No se ha encontrado el id a eliminar");    
                        }
                    
                    }  else {
                        self::response("HTTP/1.0 404 No esta indicando el id");
                    }
                    
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
                    self::response("HTTP/1.0 400 No permite usar el parametro: " .$key);
                }
            }

            return InstitutoDAO::findByFiltros($filtros);
        }


        // Función para comprobar que el put funciona correctamente
        static function put() {

            $recursos = self::divideURI();

            if (count($recursos) == 3) {

                $permitimos = ['nombre', 'localidad', 'telefono'];

                // Recogemos los datos que se han enviado
                $datos = file_get_contents('php://input');

                // Pasamos los datos a un array asociativo de un fichero JSON(string)
                $datos = json_decode($datos, true);

                if ($datos == null) {
                    self::response("HTTP/1.0 400 El json del body no esta bien formado");
                }

                // Verificar que los datos del body son los de instituto
                foreach ($datos as $key => $value) {
                    
                    if (!in_array($key, $permitimos)) {
                        self::response("HTTP/1.0 400 No permite usar el parametro: " .$key);
                    }
                }

                $insti = InstitutoDAO::findById($recursos[2]);

                if(count($insti) == 1) {

                    $insti = (object)$insti[0];

                    // Parametros a modificar
                    foreach ($datos as $key => $value) {
                        $insti -> $key = $value;
                    }

                    
                    if (InstitutoDAO::update($insti)) {

                        $insti = json_encode($insti);

                        self::response("HTTP/1.0 201 Modificado Correctamente", $insti);
                    }
                
                } else {
                    self::response("HTTP/1.0 404 Esta intentando modificar un instituto que no existe");
                }
            } 
        }

    }

?>