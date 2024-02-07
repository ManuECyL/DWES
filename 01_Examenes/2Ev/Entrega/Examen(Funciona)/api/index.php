<?php

require('./controlador/Base.php');
require('./controlador/PalabraController.php');
require('./controlador/EstadisticaController.php');

if (isset($_SERVER['PATH_INFO'])) {
    $recurso = Base::divideURI();
    if ($recurso[1] === "palabras") { // acceso a palabras
        PalabraController::palabras();
    } else if ($recurso[1] === "estadisticas") { // acceso a estadisticas
        EstadisticaController::estadisticas();
    } else {
        Base::response("HTTP/1.0 404 Recurso no encontrado");
    }

} else {
    Base::response("HTTP/1.0 400 Direccion incorrecta");


}
echo "";

?>