<?php
    echo time();

    echo "<p>Zona que tiene el servidor</p>";
    echo date_default_timezone_get();

    date_default_timezone_set("Europe/Madrid");
    echo "<br><br> Cambiada <br><br>";
    echo date_default_timezone_get();

    echo "<br><br>" . date("r");

    echo "<br><br>" . date("r");
    echo "<br><br>" . date("d/m/Y H:m:s");

    echo "<p></p>";