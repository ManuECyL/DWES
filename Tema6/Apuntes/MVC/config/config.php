<?php
    /* Otras configuraciones */

    // Constantes que vayamos a usar en toda la aplicación
        define ('IMG', "/Tema6/Apuntes/MVC/webroot/img/"); // Para insertar imágenes contantenando el nombre de la imga la ruta
        define ('CSS', "/Tema6/Apuntes/MVC/webroot/css/"); // Para insertar estilos css contantenando el fichero css  a la ruta
        define ('JS', "/Tema6/Apuntes/MVC/webroot/js/"); // Para insertar código js contantenando el nombre del fichero js a la ruta

        /* En casa no funciona
            define ('IMG', "./webroot/img/");
            define ('CSS', "./webroot/css/");
            define ('JS', "./webroot/js/");
        */

    // require que se vayan a usar en varios ficheros. La ruta es como si estuvieramos desde el index
        require('./config/confBD.php');

        require('./dao/FactoryBD.php');
        require('./dao/UserDAO.php');

        require('./models/User.php');
?>