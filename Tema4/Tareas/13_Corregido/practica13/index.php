<?php
require("./funcionesBD.php");

if (isset($_REQUEST["crear"])) {
    crearBase();
}

if (isset($_REQUEST["enviar"])) {
    if ($_REQUEST["enviar"] == "modificar") {
        header("Location: ./modificar.php?id=".$_REQUEST["id"]);
    } elseif($_REQUEST["enviar"] == "eliminar") {
        delete();
    }elseif($_REQUEST["enviar"] == "nuevo") {
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
        tr,
        td {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>

<body>
        

    <?php
    validaUsuario();


    ?>
</body>

</html>