<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <div>
        <form action="" method='post'>
                <input type="submit" value="Home" name="home">
            </form>

        </div>
        <h1>Pagina Web de María</h1>
    <nav>
        <div>
            <?php
            if(validado()){
                echo "Bienvenido " .$_SESSION['usuario']->descUsuario;;
                ?>
                
                <form action="" method='post'>
                    <input type="submit" value="Ver Citas" name="Citas_verCitas">
                   
                    <input type="submit" value="Ver Perfil" name="User_verPerfil">
                    <input type="submit" value="Cerrar Session" name="logout">
                </form>
                <?php
            }else{
            ?>
            <form action="" method='post'>
                <input type="submit" value="Login" name="login">
            </form>
            <?php
            }
            ?>
        </div>
    </nav>
    </header>
    <main>
        <?php
            if(!isset($_SESSION['vista']))
                require VIEW.'home.php';
            else
                require $_SESSION['vista'];
         ?>
    </main>
   <footer>
        Copyrigth
</footer>
</body>
</html>