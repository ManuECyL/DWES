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
                    <form action="" method="post">
                        <input type="submit" value="Login" name="login">
                    </form>
                </div>

            </nav>

        </header>

        <main>

            <!-- Aquí van a ir las vistas -->
            <?php
                if (!isset($_SESSION['vista'])) {
                    require VIEW . 'home.php';
                
                } else {
                    require $_SESSION['vista'];
                }

            ?>

        </main>

        <br>
        
        <footer>
            Copyrigth
        </footer>

    </body>

</html>