<?php
    require('../funciones/funcionesBD.php');
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../weebroot/css/style.css">

        <title>Panaderia</title>

    </head>

    <body>

        <div class="izq">

            <h1>Productos</h1>

            <table>

                <thead>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Ver</th>
                </thead>

                <tbody>
                    <?php
                        $array_prod = findAll();

                        foreach ($array_prod as $prod) {
                            echo "<tr>";                        
                                echo "<td>" . $prod['nombre'] . "</td>";
                                echo "<td>" . substr($prod['descripcion'],0,20) . "</td>";
                                echo "<td><img src='../" . $prod['baja'] ."'></td>";
                                echo "<td><a href='verProducto.php?id=".$prod['codigo']."'>Ver</a></td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>

            </table>
        </div>

        <div class="der">
            <h1>Ultimos visitados</h1>

                <?php

                    if(!empty($_COOKIE)) {
                        
                        ksort($_COOKIE['id']);

                        foreach ($_COOKIE['id'] as $value) {
                            
                            $producto = findById($_COOKIE['id']);
                            
                            if ($producto) {
                                echo "<td><a href='verProducto.php?id=" . $producto['codigo'] . "'>";
                                echo "<img src='../" . $producto['baja'] . "'>";
                                echo "</a>";
                            }
                        }

                    } else {
                        echo "No ha visitado ningún producto";
                    }

                ?>
        </div>
        
    </body>

</html>