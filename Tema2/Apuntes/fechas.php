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

    echo "<p>String to fecha</p>";
    $cumpleGiorgi = strtotime("08/21/1998");
    echo $cumpleGiorgi;
    echo "<p>" . date("d/m/y",$cumpleGiorgi) . "</p>";

// Fecha de hoy
    $hoy = strtotime("now");
    echo "<p>" . date("d/m/y",$hoy) . "</p>";

// Fecha de hoy + 60 días
    $hoySesenta = strtotime("now + 60 day");
    echo "<p>" . date("d/m/y",$hoySesenta) . "</p>";

// Diferencia entre fechas para calcular los años de alguien
    $tiempoRestado = $hoy - $cumpleGiorgi;
    $segundosAlAño = 60*60*24*365;
    $años = $tiempoRestado/$segundosAlAño;
    echo $años;

// Diferencia entre fechas con DateTime
    $cumpleGiorgi = new Datetime('1998-08-21');
    $hoy = new Datetime();
    $intervalo = $cumpleGiorgi -> diff($hoy);
    echo "<pre>";
    print_r ($intervalo);
    echo "</pre>";

//Otros métodos: mktime | getdate
    echo "<pre>";
    print_r (getdate());
    echo "</pre>";