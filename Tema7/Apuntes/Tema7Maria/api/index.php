<?php

require ('./controlador/Base.php');
require ('./controlador/InstitutoController.php');




if(isset($_SERVER['PATH_INFO'])){
    //comprobar el recurso
    $recurso = Base::divideURI();
    //echo $recurso[1];
    if($recurso[1]==='institutos'){
        InstitutoController::institutos();
    }else{

    }
}else{
    Base::response( "HTTP/1.0 400 Direccion incorrecta, no ha especificado el recurso ");
}



