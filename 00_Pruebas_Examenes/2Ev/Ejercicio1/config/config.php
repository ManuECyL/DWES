<?php
    /* Otras configuraciones */

    // Constantes que vayamos a usar en toda la aplicación
        define ('IMG', "./webroot/img/"); // Para insertar imágenes contantenando el nombre de la imga la ruta
        define ('CSS', "./webroot/css/"); // Para insertar estilos css contantenando el fichero css  a la ruta
        define ('JS', "./webroot/js/"); // Para insertar código js contantenando el nombre del fichero js a la ruta
        define ('VIEW', "./views/"); // Para redirigir a una vista contantenando el nombre del fichero php a la ruta
        define ('CONTROLLER', "./controllers/"); // Para redirigir a un controlador contantenando el nombre del fichero php a la ruta

        /* En casa no funciona
            define ('IMG', "/Tema6/Apuntes/MVC/webroot/img/");
            define ('CSS', "/Tema6/Apuntes/MVC/webroot/css/");
            define ('JS', "/Tema6/Apuntes/MVC/webroot/js/");
        */

    // require que se vayan a usar en varios ficheros. La ruta es como si estuvieramos desde el index
        require('./core/funciones.php');

        require('./config/confBD.php');

        require('./dao/FactoryBD.php');

        // require('./models/User.php');
        // require('./dao/UserDAO.php');

?>