<?php
    require('./funcionesBD.php');

    
    if (existe("volver")) {                                  
        header('Location: ./LeerTabla.php');
        exit;

    } elseif (existe("guardar")) {
        actualizar($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['compañia'], $_REQUEST['stock'], $_REQUEST['precio'], $_REQUEST['fecha_Lanzamiento']);    
        header('Location: ./LeerTabla.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modificar Registro</title>

<!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="../../../css/estilos.css">

    <style>
        h3 {
            margin: 20px;
        }

        h6 {
            margin-left: 40px;
        }

        #divForm {
            display: flex;
            text-align: center;
            align-items: center;
            justify-content: center;
        }
        
        #registros {
            text-align:justify;
            margin: 0px;
        }

        form {
            text-align: center;
            margin: 30px;
        }

        input {
            margin: 5px;
        }

        .botones {
            margin-left: 70px;
            margin-bottom: 20px;
        }

    </style>
</head>

<body>
    <div class="container-fluid">
        
        <?php

            include("../../../html/header.php");
        ?>

        <!-- NAV -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark bg-gradient lg-sticky-top d-flex">

            <div class="navbar row container-fluid d-flex text-center">

                <ul class="navbar-nav row row-cols">

                    <div class="col-md col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="./index.php" id="anterior">Tarea 13 A</a>
                        </li>
                    </div>
                </ul> 
            </div>
        </nav>

        <main>

            <div style="border: 1px black solid; margin: 10px;" id="divMain">

                <h3 style="text-align: center">Modificar Registro</h3>

                <?php
                    $consulta = consultarId('videojuegos');
                        
                    // Comprobamos si hay resultados
                    if ($consulta -> num_rows > 0) {

                    // Obtenemos los nombres de los campos que contiene la tabla
                        $camposTabla = array();

                    // Obtenemos los valores de los campos que contiene la tabla
                        $fila = $consulta -> fetch_assoc();

                        while ($campo = $consulta -> fetch_field()) {
                            $camposTabla[] = $campo -> name;
                        }

                        echo "<div id='divForm'>";

                            echo "<form action='./Modificar.php' method='post' id='registros' name='formularioT13_Modificar' enctype='multipart/form-data'>";

                                // Mostrar los campos en el encabezado de la tabla
                                foreach ($camposTabla as $columna) {                                            
                                    echo "<label><b>" . $columna . "</b></label>: ";
                                    echo '<input type="text" name="' . $columna . '" value="' . $_POST[$columna] . '" size="25px">';
                                    echo "<br>";
                                    
                                }

                            ?>
                            
                                <br>

                                <input type="submit" value="Volver" name="volver" class="botones">
                                <input type="submit" value="Guardar" name="guardar" class="botones">

                            <?php

                            echo "</form>";
                        
                        echo "</div>";

                    } else {
                        echo "No se encontraron resultados en la base de datos";
                    } 
                ?>


            </div>
        </main>

        <?php

            include("../../../html/footer.html");
        ?>
    </div>
        
        
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>
