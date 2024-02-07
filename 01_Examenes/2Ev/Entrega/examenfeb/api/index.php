<?php

require_once "./dao/DBPDO.php";
require_once "./dao/PalabraDAO.php";
require_once "./modelo/Estadistica.php";
require_once "./dao/EstadisticaDAO.php";
require_once "./controlador/Base.php";
require_once "./controlador/cEstadistica.php";
require_once "./controlador/cPalabra.php";


//if(str_starts_with($_SERVER['PATH_INFO'],"/usuarios")){

if(substr( $_SERVER['PATH_INFO'], 0, 9 ) === "/palabra"){
    cPalabra::palabras();
}else if(substr( $_SERVER['PATH_INFO'], 0, 12 ) === "/estadistica"){
    cEstadistica::estadistica();
}else{
    header("HTTP/1.1 400 BAD REQUEST");
}
