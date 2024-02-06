<?php
    /* Otras configuraciones */

    // Constantes que vayamos a usar en toda la aplicación
        // define("URI_API", "http://192.168.7.207/01_Examenes/2Ev/API/index/");
        define ('CSS', "./webroot/css/"); // Para insertar estilos css contantenando el fichero css  a la ruta
        define ('VIEW', "./views/"); // Para redirigir a una vista contantenando el nombre del fichero php a la ruta
        define ('CONTROLLER', "./controllers/"); // Para redirigir a un controlador contantenando el nombre del fichero php a la ruta


    // require que se vayan a usar en varios ficheros. La ruta es como si estuvieramos desde el index
        require('./core/funciones.php');

        require('./config/confBD.php');

        require('./dao/FactoryBD.php');

        require('./models/UsuarioModel.php');
        require('./models/PalabraModel.php');
        require('./models/EstadisticaModel.php');

        require('./dao/UsuarioDAO.php');
        require('./dao/PalabraDAO.php');
        require('./dao/EstadisticaDAO.php');
?>