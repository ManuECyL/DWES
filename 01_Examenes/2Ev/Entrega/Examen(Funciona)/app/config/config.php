<?php

// CONSTANTES QUE VAMOS A USAR EN TODA LA APLICACIÓN
define("IMG","./webroot/img/");
define("CSS","./webroot/css/");
define("JS","./webroot/js/");
define("VIEW","./views/");
define("CON","./controllers/");
define('URI_API','http://192.168.7.206/Examen1/api/index/');


require('./core/funciones.php');

require('./config/confBD.php');

require('./dao/FactoryBD.php');

require('./models/User.php');
require('./dao/UserDAO.php');

require('./dao/curl.php');
?>