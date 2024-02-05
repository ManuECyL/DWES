<?php
    if (isset($sms)) {
        echo $sms;
    }
?>

<nav>
    <div>
        <?php

            if (isset($_POST['numeros'])) {
                $numerosSeleccionados = $_POST['numeros'];
            
            } else {
                $numerosSeleccionados = array();
            }

            if (!isset($sorteoRealizado)) {
                $sorteoRealizado = false;
            }
        ?>

        <br>
    
        <form action="" method="post">

            <?php
                for ($i = 1; $i <= 6; $i++) {
    
                    if (in_array($i, $numerosSeleccionados)) {
                        $checked = 'checked';
                    
                    } else {
                        $checked = '';
                    }
                    
                    if ($sorteoRealizado) {
                        $deshabilitado = 'disabled';
                    
                    } else {
                        $deshabilitado = '';
                    }
    
                    echo "<label for='num$i'>$i</label>";
                    echo "<input type='checkbox' id='num$i' name='numeros[]' value='$i' $checked $deshabilitado>";
    
                    // Si el número es múltiplo de 10, hacemos un salto de línea
                    if ($i % 10 == 0) {
                        echo "<br>";
                    }
                }
            ?>

            <br>

            <input type="submit" value="Hacer Apuesta" name="Apuesta_HacerApuesta">
            <input type="submit" value="Modificar Apuesta" name="Apuesta_ModificarApuesta">

            <input type="submit" value="Ver Mis Apuestas" name="Apuesta_VerApuestas">

            <br><br>

            <input type="submit" value="Cerrar Sesion" name="logout">
        </form>

    </div>

</nav>