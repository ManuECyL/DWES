<?php
//define variables que se van a usar
define ('CSS',"./webroot/css");
define ('VISTA',"./webroot/view");
define ('URI_API',"http://192.168.7.200/examenfeb/api/index/");

//Se incluyen las librerías externas
include_once 'core/libreriaValidacionFormularios.php';

//Incluimos todas las clases del modelo
include_once 'model/Usuario.php';
include_once 'dao/UsuarioPDO.php';
include_once 'model/Estadistica.php';
include_once 'dao/EstadisticaPDO.php';
include_once 'model/Palabra.php';
include_once 'dao/PalabraDAO.php';
include_once 'model/DBPDO.php';

/* Array $controladores
 * Almacena la ruta a los controladores para facilitar su manejo
 * @param Array $controladores['login'] Controlador del login
 * @param Array $controladores['inicio'] Controlador del inicio
 */
$controladores = [
    'login' => 'controlador/cLogin.php',
    'inicio' => 'controlador/cInicio.php',
    'inicioL' => 'controlador/cInicio.php',
    'partida' => 'controlador/cPartida.php'
];

/* Array $vistas
 * Almacena la ruta a las vistas para facilitar su manejo
 * @param Array $vistas['login'] Controlador del login
 * @param Array $vistas['inicio'] Controlador del inicio
 * @param Array $vistas['layout'] Controlador del layout
 */
$vistas = [
    'layout' => 'vista/layout.php',
    'login' => 'vista/login.php',
    'inicio' => 'vista/Inicio.php',
    'inicioL' => 'vista/InicioLogueado.php',
    'partida' => 'vista/partida.php'
];

