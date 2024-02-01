<?
    require('curl.php');
    require('confApi.php');
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Consumir Api</title>

    </head>

    <body>

        <h1>Listas institutos</h1>

        <?
            // Obtenemos los datos de institutos
            $institutos = get('institutos');

            // Pasamos el JSON a array para mostrarlo en una tabla
            $institutos = json_decode($institutos, true);

        ?>

        <table>
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Localidad</th>
                <th>Telefono</th>
            </thead>

            <tbody>
                <?php

                    foreach ($institutos as $insti) {
                        echo "<tr>";

                            echo "<td>". $insti['id']."</td>";
                            echo "<td>". $insti['nombre']."</td>";
                            echo "<td>". $insti['localidad']."</td>"; 
                            echo "<td>". $insti['telefono']."</td>";

                        echo "</tr>";
                    }

                ?>
            </tbody>    
        </table>

        <br>

        <a href="./insertar.php">Insertar</a>

        <br><br>

        <a href="./modificar.php">Modificar</a>

        <br><br>

        <a href="./eliminar.php">Eliminar</a>

    </body>

</html>