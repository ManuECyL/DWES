<?php
require("./funcionesBD.php");

if (isset($_REQUEST["guardar"])) {
    insert();
    echo "añadiendo";
    header("Location: ./index.php");
}elseif (isset($_REQUEST["modificar"])) {
    update();
    header("Location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>

</head>

<body>

    <?php
    findByID();
    ?>
</body>

</html>