<?
    if (isset($sms)) {
        echo $sms;
    }
    
    function asteriscos($num) {

        for ($i = 0; $i <= $num ; $i++) { 
            echo "*";
        }

    }

    if (isset($palabra)) {

        echo "<br>Palabra: ";

        echo asteriscos($palabra -> num_letras);

        echo "<br><br>";
    }

    if (isset($_POST['Letra_Enviar'])) {

        $letra = $_POST['letra'];

        $palabra = $_SESSION['palabra'] -> palabra;
            
        if (str_contains($palabra, $letra)) {
            
            for ($i = 0; $i <= $_SESSION['palabra'] -> num_letras ; $i++) {   
                str_replace($palabra[$i], $letra, $palabra);
            }
        }
    }
?>

    <form action="" method="post">

        <label for="letra">Letra: </label>
        <input type="text" name="letra" id="letra">

        <input type="submit" value="Enviar" name="Letra_Enviar">

        <br><br>

        <input type="submit" value="Volver" name="volver">
        <input type="submit" value="Cerrar Sesion" name="logout">

    </form>

