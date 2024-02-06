<?php
    // Establecer el encabezado de respuesta como JSON
    header('Content-Type: application/json');

    // Comprobar si se ha enviado una solicitud GET a la ruta /numeros
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['min']) && isset($_GET['max'])) {

        // Obtener los parámetros min y max de la URL y asegurarse de que sean números enteros
        $min = filter_input(INPUT_GET, 'min', FILTER_VALIDATE_INT);
        $max = filter_input(INPUT_GET, 'max', FILTER_VALIDATE_INT);

        // Comprobar si los parámetros min y max son números enteros válidos y si están dentro del rango permitido (1 a 50)
        if ($min !== false && $max !== false && $min >= 1 && $max <= 50) {

            // Generar un número aleatorio entre min y max
            $numero = mt_rand($min, $max);

            // Devolver el número generado como respuesta
            echo json_encode(array('numero' => $numero));
            http_response_code(200); // OK

        } else {
            // Si los parámetros no son válidos, devolver un mensaje de error
            echo json_encode(array('error' => 'Los parámetros min y max deben ser números enteros entre 1 y 50.'));
            http_response_code(400); // Bad Request
        }
        
    } else {
        // Si no se proporciona la ruta correcta o el método HTTP no es GET, devolver un mensaje de error
        echo json_encode(array('error' => 'Ruta de API no válida.'));
        http_response_code(404); // Not Found
    }
?>

<?php
    // header("Content-Type: application/json");

    // // Comprueba si se ha hecho una solicitud GET a /numeros
    // if ($_SERVER['REQUEST_METHOD'] == 'GET' && basename($_SERVER['REQUEST_URI']) == 'numeros') {
    //     
        // Comprueba si se han proporcionado los parámetros min y max
    //     if (isset($_GET['min']) && isset($_GET['max'])) {
    //         $min = $_GET['min'];
    //         $max = $_GET['max'];

    //         // Comprueba si min y max son números y si min es menor o igual que max
    //         if (is_numeric($min) && is_numeric($max) && $min <= $max) {
        
    //             // Genera un número aleatorio entre min y max
    //             $numero = rand($min, $max);

    //             // Devuelve el número en formato JSON
    //             echo json_encode(['numero' => $numero]);

    //         } else {
    //             // Devuelve un error en formato JSON
    //             http_response_code(400);
    //             echo json_encode(['error' => 'Los parámetros min y max deben ser números y min debe ser menor o igual que max.']);
    //         }

    //     } else {
    //         // Devuelve un error en formato JSON
    //         http_response_code(400);
    //         echo json_encode(['error' => 'Faltan los parámetros min y max.']);
    //     }

    // } else {
    //     // Devuelve un error en formato JSON
    //     http_response_code(404);
    //     echo json_encode(['error' => 'Ruta no encontrada.']);
    // }
?>
