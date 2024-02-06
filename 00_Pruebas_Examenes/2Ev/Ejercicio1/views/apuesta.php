<?php
    if (isset($sms)) {
        echo $sms;
    }

    if (isset($array_apuestas)) {

        foreach ($array_apuestas as $apuesta) {
            echo "<br>";
            echo "Apuesta: " . $apuesta -> id_Apuesta . ", Fecha: " . $apuesta -> fechaApuesta .
                 ", Números:" 
                . $apuesta -> numero1 . " - " . $apuesta -> numero2 . " - " . $apuesta -> numero3 . " - " 
                . $apuesta -> numero4 . " - " . $apuesta -> numero5 . "<br>";
        }
    }
?>

<nav>
    <div>
        <?php

            $codUsuario = $_SESSION['usuario'] -> codUsuario;

            if (isset($_POST['numeros'])) {
                $numerosSeleccionados = $_POST['numeros'];
                setcookie('numerosSeleccionados_' . $codUsuario, serialize($numerosSeleccionados), time() + 60 * 60 * 24 * 365);
            
            } elseif (isset($_COOKIE['numerosSeleccionados_' . $codUsuario])) {
                $numerosSeleccionados = unserialize($_COOKIE['numerosSeleccionados_' . $codUsuario]);

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

            <br><br>

            <input type="submit" value="Hacer Apuesta" name="Apuesta_HacerApuesta">
            <input type="submit" value="Modificar Apuesta" name="Apuesta_ModificarApuesta">

            <input type="submit" value="Ver Mis Apuestas" name="Apuesta_VerApuestas">

            <br><br>

            <input type="submit" value="Cerrar Sesion" name="logout">
        </form>

    </div>

</nav>