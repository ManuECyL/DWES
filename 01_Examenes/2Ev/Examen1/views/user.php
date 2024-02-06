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

            <input type="submit" value="Iniciar Partida" name="User_IniciarPartida">
            
            <br><br>

            <input type="submit" value="Cerrar Sesion" name="logout">
        </form>

    </div>

</nav>