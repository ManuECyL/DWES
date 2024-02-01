<?php
    
    require ('./controlador/Base.php');
    require ('./controlador/InstitutoController.php');

    // echo "Hola";

    // La variable que me dice que es lo que me llega en la ruta. (index/institutos para evitar error al no existir registros)
    if (isset($_SERVER['PATH_INFO'])) {
        
        // Comprobar el recurso
        $recurso = Base::divideURI();

        // echo $recurso[1];

        if ($recurso[1] === 'institutos') {
            InstitutoController::institutos();
        
        } else {

        }


    // // Si hay algún error, mostrar un código de error de la petición
    } else {
        Base::response("HTTP/1.0 404 Direccion incorrecta, no ha especificado recurso");
    }

    // print_r(Base::condiciones());
?>