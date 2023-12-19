<?php
require("./funcionesBD.php");

if (isset($_REQUEST["crear"])) {
    crearBase();
}

if (isset($_REQUEST["enviar"])) {
    if ($_REQUEST["enviar"] == "modificar") {
        header("Location: ./modificar.php?id=" . $_REQUEST["id"]);
    } elseif ($_REQUEST["enviar"] == "eliminar") {
        delete();
    } elseif ($_REQUEST["enviar"] == "nuevo") {
        header("Location: ./modificar.php");
    }

}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR13</title>
    <style>
        .warning {
            color: darkorange;
            font-style: italic;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        th {
            background-color: #0099ff;
            color: white;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        input[type="text"],
        input[type="submit"] {
            padding: 8px;
            margin-right: 10px;
        }
        input[name="enviar"][value="nuevo"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-bottom: 10px;
        }
        input[name="enviar"][value="buscar"] {
            background-color: #008CBA;
            color: white;
            border: none;
            padding: 8px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
        }
    </style>
</head>

<body>


    <?php

    if ($datosTabla = validaUsuario()) {
        if (isset($_REQUEST["enviar"]) && $_REQUEST["enviar"] == "buscar") {
            $datosTabla = findByName($_REQUEST["nombre"]);
        }
        // TABLA
        echo '<table>';
        echo '<tr>';
        echo '<th>Id</th>';
        echo '<th>Nombre</th>';
        echo '<th>Ciudad</th>';
        echo '<th>Fecha Registro</th>';
        echo '<th>Cantidad Compras</th>';
        echo '<th>Dinero Gastado</th>';
        echo '<th>Gestion</th>';
        echo '</tr>';

        foreach ($datosTabla as $row) {
            echo "<tr>";
            $id = $row["id"];

            foreach ($row as $value) {
                echo "";
                echo "<td>";
                echo $value;
                echo "</td>";
            }

            echo '<td>';
            echo '<form action="">';
            echo '<input type="submit" name="enviar" value="modificar">';
            echo '<input type="submit" name="enviar" value="eliminar">';
            echo '<input type="hidden" name="id" value="' . $id . '">';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        echo "</table>";

        // BUSCAR POR NOMBRE
        echo '<form action="">';
        echo 'Buscar por nombre: ';
        echo '<input type="text" name="nombre" id="nombre" >';
        echo '<input type="submit" name="enviar" value="buscar">';
        echo '</form>';
    }
    // AÑADIR
    echo '<form action="">';
    echo '<input type="submit" name="enviar" value="nuevo">';
    echo '</form>';
    ?>
</body>

</html>