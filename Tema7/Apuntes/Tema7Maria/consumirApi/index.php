<?
        require('curl.php');
        require('confApi.php');
            ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    scri
</head>
<body>
    <h1>Listar institutos</h1>
    <?
       $institutos = get('institutos');
       $institutos = json_decode($institutos,true);

    ?>

<table>
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        
        <th>Localidad</th>
        <th>Telf</th>
    </thead>
    <tbody>
        <?
foreach ($institutos as $insti) {
    echo "<tr>";
        echo "<td>".$insti['id']."</td>";
        echo "<td>".$insti['nombre']."</td>";
        echo "<td>".$insti['localidad']."</td>";
        echo "<td>".$insti['telefono']."</td>";   
    echo "</tr>";
}
?>
</tbody>
<table>
    <a href="./insertar.php">Insertar</a>
</body>
</html>