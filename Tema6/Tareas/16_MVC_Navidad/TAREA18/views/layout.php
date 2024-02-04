<?php
require_once VIEW . 'head.php';
require_once VIEW . 'header.php';
?>

    <main>
       
        <?php

        //VISTAS
        if (!isset($_SESSION['view'])) {
            require VIEW . 'home.php'; //si no hay vista cargamos la home
        } else {
            require $_SESSION['view'];
        }
        ?>

    </main>


    <?php
    require_once VIEW . 'footer.php';
    ?>

</body>

</html>