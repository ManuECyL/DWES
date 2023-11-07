<?php

    // NOMBRE
    echo "El nombre es: " . $_REQUEST['nombre'];

    // APELLIDO
    echo "<br>Los apellidos son: " . $_REQUEST['apellidos'];

    // CONTRASEÑA
    echo "<br>La contraseña es: " . $_REQUEST['contraseña'];

    // FECHA
    echo "<br>La fecha es: " . $_REQUEST['fecha'];
            
    // DNI
    echo "<br>El DNI es: " . $_REQUEST['dni'];

    // EMAIL
    echo "<br>El email es: " . $_REQUEST['email'];

    // FICHERO IMAGEN
    echo '<br><p><img src="imagenes/'.$_FILES['fichero'].'"></p>';
?>