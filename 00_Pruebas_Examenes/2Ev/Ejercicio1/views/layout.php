<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>App</title>
    </head>

    <body>

        <header>
            <h1>Página Web de Manu</h1>

            <nav>

                <div>

                    <?php
                        if (validado()) {
                            echo "Bienvenido " . $_SESSION['usuario'] -> descUsuario;

                            echo "<br><br>";
                    ?>
                            <form action="" method="post">                                
                                <input type="submit" value="Cerrar Sesion" name="logout">
                            </form>
                    <?php                        

                        } 
                    ?>
                </div>

            </nav>

        </header>

        <main>
            <?php 
                // Si no hay ninguna vista va al index, si hay alguna, muestra la que esté
                if (!isset($_SESSION['vista'])) {
                    require_once 'login.php';
                
                } else {
                    require_once $_SESSION['vista'];
                }
            ?>
        </main>
        
        <footer>
            <p>Copyright</p>
        </footer>
    </body>
</html>
