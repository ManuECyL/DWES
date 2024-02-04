<?php
    if (isset($sms)) {
        echo $sms;
    }
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Layout</title>

    </head>

    <body>

        <header>

            <div>
                <form action="" method="post">
                    <input type="submit" value="Home" name="home">
                </form>
            </div>

            <h1>Página Web de Manu</h1>

            <nav>

                <div>

                    <?php
                    //     if (validado()) {
                    //         echo "Bienvenido " . $_SESSION['usuario'] -> descUsuario;

                    //         echo "<br><br>";
                    // ?>
                            <!-- <form action="" method="post"> -->

                     <?php
                    //             if (isAdmin()) {                    
                    // ?>
                                     <!-- <input type="submit" value="Ver Todas Citas" name="Cita_VerCitasTodas"> -->
                     <?php
                    //             }
                    // ?>
                                
                                 <!-- <input type="submit" value="Ver Citas" name="User_verCitas">

                                 <input type="submit" value="Ver Perfil" name="User_verPerfil">

                                 <input type="submit" value="Cerrar Sesion" name="logout">
                             </form> -->
                     <?php                        

                    //     } else {
                    // ?>
                             <!-- <form action="" method="post">
                                 <input type="submit" value="Login" name="login">
                             </form> -->
                     <?php
                    //     }
                    ?>
                </div>

            </nav>

        </header>

        <main>

            <form action="" method="post">
                
                <br>

                <label for="nombre"> Nombre:
                    <input type="text" name="nombre" id="nombre">
                </label>

                <span class="error">
                    <?php            
                        if (isset($errores)) {
                            errores($errores,'nombre');
                        }   
                    ?>
                </span>

                <br><br>

                <label for="pass"> Contraseña: 
                    <input type="password" name="pass" id="pass">
                </label>
                <span class="error">
                    <?php
                        if (isset($errores)) {
                            errores($errores,'pass');
                        }            
                    ?>
                </span>

                <br><br>

                <span class="error">
                    <?php
                        if (isset($errores)) {
                            errores($errores,'validado');
                            echo "<br>";
                        }            
                    ?>

                </span>

                <input type="submit" name="Login_IniciarSesion" value="Iniciar Sesion">
                <input type="submit" name="Login_Registro" value="Registrarme">

            </form>

            <!-- Aquí van a ir las vistas -->
            <?php
                // Si no hay ninguna vista va al home, si hay alguna, muestra la que esté
                // if (!isset($_SESSION['vista'])) {
                //     require VIEW . 'login.php';
                
                // } else {
                //     require $_SESSION['vista'];
                // }

            ?>

        </main>

        <br>
        
        <footer>
            Copyrigth
        </footer>

    </body>

</html>