<nav>

<div>

    <?php
        if (validado()) {
            echo "Bienvenido " . $_SESSION['usuario'] -> descUsuario;

            echo "<br><br>";
    ?>
            <form action="" method="post">

    <?php
                if (isAdmin()) {                    
    ?>
                    <input type="submit" value="Ver Todas Apuestas" name="Apuesta_VerApuestasTodas">
    <?php
                } else {
    ?>
                    <input type="submit" value="Hacer Apuesta" name="Apuesta_HacerApuesta">
                    <input type="submit" value="Ver Mis Apuestas" name="Apuesta_VerApuestas">
    <?php
                }
    ?>
                
                <input type="submit" value="Cerrar Sesion" name="logout">
            </form>
    <?php                        

        } 
    ?>
</div>

</nav>