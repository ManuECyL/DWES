<?php
    if (isset($sms)) {
        echo $sms;
    }
?>

<nav>
    <div>
        <?php
            $id_usuario = $_SESSION['usuario'] -> id_usuario;
        ?>

        <br>
    
        <form action="" method="post">

            <input type="submit" value="Iniciar Partida Aleatoria" name="User_IniciarPartidaAleatorio">

            <br><br>

            <label for="minLetras">Minimo de letras: </label>
            <input type="number" name="minLetras" id="minLetras">
            <input type="submit" value="Iniciar Partida Min" name="User_IniciarPartidaMin">
            
            <br><br>

            <input type="submit" value="Cerrar Sesion" name="logout">
        </form>

    </div>

</nav>