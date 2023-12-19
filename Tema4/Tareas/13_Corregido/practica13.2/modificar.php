<?php
require("./funcionesBD.php");

if (isset($_REQUEST["guardar"])) {
    insert();
    echo "añadiendo";
    header("Location: ./index.php");
} elseif (isset($_REQUEST["modificar"])) {
    update();
    header("Location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR13</title>

    <style>
        form {
            margin: 20px 10px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            outline: none;
        }

        input[readonly] {
            background-color: #f2f2f2;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input {
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <?php
    $id = "";
    $nombre = "";
    $fecha = "";
    $dinero = "";
    $accion = "guardar";
    if (isset($_REQUEST["id"])) {
        $row = findByID($_REQUEST["id"]);

        $id = $row["id"];
        $nombre = $row["nombre"];
        $ciudad = $row["ciudad"];
        $fecha = $row["fecha_registro"];
        $nCompras = $row["numero_compras"];
        $dinero = $row["dinero_gastado"];

        $accion = "modificar";
    }


    echo '<form action="">';
    echo '<label for="id">Id';
    echo '<td><input type="text" readonly placeholder="id auto" name="id" id="id" value="' . $id . '"></td>';
    echo '</label>';
    echo '<label for="nombre">Nombre';
    echo '<td><input type="text" name="nombre" id="nombre" value="' . $nombre . '"></td>';
    echo '</label>';
    echo '<label for="ciudad">Ciudad';
    echo '<td><input type="text" name="ciudad" id="ciudad" value="' . $ciudad . '"></td>';
    echo '</label>';
    echo '<label for="fecha">Fecha';
    echo '<td><input type="text" name="fecha" id="fecha" value="' . $fecha . '"></td>';
    echo '</label>';
    echo '<label for="compras">Cantidad de compras';
    echo '<td><input type="text" name="compras" id="compras" value="' . $nCompras . '"></td>';
    echo '</label>';
    echo '<label for="dinero">Dinero gastado';
    echo '<td><input type="text" name="dinero" id="dinero" value="' . $dinero . '"></td>';
    echo '</label>';

    echo '<input type="submit" name="' . $accion . '" value="' . $accion . '">';

    echo '</form>';

    ?>
</body>

</html>