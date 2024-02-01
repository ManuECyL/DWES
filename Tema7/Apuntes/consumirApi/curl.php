<?php

    function get($recurso) {

        // Iniciamos la conexión
        $ch = curl_init();

        // Parámetros que queremos modificar (conexion, parametro, valor del parametro)
        curl_setopt($ch, CURLOPT_URL, URI_API.$recurso);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Ejecutamos el curl y lo guardamos en la respuesta
        $response = curl_exec($ch);

        // Cerramos la conexión
        curl_close($ch);

        // Devolvemos la respuesta
        return $response;
    }


    function post($recurso, $array) {

        // Cambiamos el array a tipo json
        $array = json_encode($array);

        // Iniciamos la conexión
        $ch = curl_init();

        // Parámetros que queremos modificar (conexion, parametro, valor del parametro)
        curl_setopt($ch, CURLOPT_URL, URI_API.$recurso);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Específicamos el tipo de fichero que tenemos y su longitud (json, stren($array))
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json', 'Content-length: ' . strlen($array)));

        // Hacemos el post
        curl_setopt($ch, CURLOPT_POST, true);

        // Para pasarle parametros en el body en forma de array
        curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
        
        // Ejecutamos el curl y lo guardamos en la respuesta
        $response = curl_exec($ch);

        // Obtenemos el codigo del curl y comprobamos que sea correcto
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($http_code != 201) {
            echo "No se ha podido insertar el recurso";
        }

        // Cerramos la conexión
        curl_close($ch);

        // Devolvemos la respuesta
        return $response;
    }


    function put($recurso, $id, $array) {

        // Cambiamos el array a tipo json
        $array = json_encode($array);

        // Iniciamos la conexión
        $ch = curl_init();

        // Parámetros que queremos modificar (conexion, parametro, valor del parametro)
        curl_setopt($ch, CURLOPT_URL, URI_API . $recurso . "/" . $id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Específicamos el tipo de fichero que tenemos y su longitud (json, stren($array))
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json', 'Content-length: ' . strlen($array)));

        // Hacemos el post
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

        // Para pasarle parametros en el body en forma de array
        curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
        
        // Ejecutamos el curl y lo guardamos en la respuesta
        $response = curl_exec($ch);

        // Obtenemos el codigo del curl y comprobamos que sea correcto
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($http_code != 201) {
            echo "No se ha podido modificar el recurso";

            if ($http_code == 400) {
                echo "No existe el id";
                $sms = curl_getinfo($ch, CURLINFO_HEADER_OUT);
            }
        }

        // Cerramos la conexión
        curl_close($ch);

        // Devolvemos la respuesta
        return $response;
    }


    function delete($recurso, $id) {


        // Iniciamos la conexión
        $ch = curl_init();

        // Parámetros que queremos modificar (conexion, parametro, valor del parametro)
        curl_setopt($ch, CURLOPT_URL, URI_API . $recurso . "/" . $id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Hacemos el delete
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        
        // Ejecutamos el curl y lo guardamos en la respuesta
        $response = curl_exec($ch);

        // Obtenemos el codigo del curl y comprobamos que sea correcto
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($http_code != 201) {
            echo "No se ha podido eliminar el recurso";

            if ($http_code == 400) {
                echo "No existe el id";
                $sms = curl_getinfo($ch, CURLINFO_HEADER_OUT);
            }
        }

        // Cerramos la conexión
        curl_close($ch);

        // Devolvemos la respuesta
        return $response;
    }
?>