
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
    
        <title>MVC</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    </head>
    <body >
        <header class="navbar"><h1>Examen</h1></header>

        <div id="content">
            <?php       
          
            //Se carga la vista que esté seleccionada en la variable de Session
            if(isset($_REQUEST['login']))
            {
                $_SESSION['vista']= $vistas['login'];
            }
            require_once $_SESSION['vista'];
            ?>
        </div>
        <footer class="bg-light text-center text-lg-start">
            <address>
                <p>MVC</p>
             </address>
        </footer>
       
    </body>
</html>