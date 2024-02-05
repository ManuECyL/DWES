<?php
    /* Otras configuraciones */

    // Constantes que vayamos a usar en toda la aplicación
        define ('CSS', "./webroot/css/"); // Para insertar estilos css contantenando el fichero css  a la ruta
        define ('VIEW', "./views/"); // Para redirigir a una vista contantenando el nombre del fichero php a la ruta
        define ('CONTROLLER', "./controllers/"); // Para redirigir a un controlador contantenando el nombre del fichero php a la ruta


    // require que se vayan a usar en varios ficheros. La ruta es como si estuvieramos desde el index
        require('./config/confBD.php');

        require('./core/funciones.php');

        require('./dao/FactoryBD.php');

        require('./models/User.php');
        require('./models/Apuesta.php');
        require('./models/Sorteo.php');

        require('./dao/UserDAO.php');
        require('./dao/ApuestaDAO.php');
        require('./dao/SorteoDAO.php');
?>