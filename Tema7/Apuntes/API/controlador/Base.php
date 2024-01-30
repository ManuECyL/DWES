<?php

    class Base {

        // Función que muestra la respuesta. Le pasamos como párametros lo que queremos enviar. En el body es opcional pasarle algo
        public static function response($head, $body = '') {

            // $head es el codigo de la petición y $body los datos que se mostrarán o no
            header($head, $body);

            echo $body;
            exit;
        }


        // Función que divida/desglose la URI para saber que contiene cada vez
        public static function divideURI() {

            $uri = $_SERVER['PATH_INFO'];

            return explode('/', $uri);
        }


        // Función que devuelva los parametros/filtros/condiciones que contiene cada vez la URI
        public static function condiciones() {

            // Convierte el string en variables
            parse_str($_SERVER['QUERY_STRING'], $filtros);

            return $filtros;
        }

    }

?>