<?
    require('curl.php');
    require('confApi.php');

    if(isset($_REQUEST['insertar'])) {
        
        $array = array(
            'nombre' => $_REQUEST['nombre'],
            'localidad' => $_REQUEST['localidad'],
            'telefono' => $_REQUEST['telefono']
        );

        // POST válido para todos (recurso, body(array))
        post('institutos', $array);

        header('Location: ./index.php');

    }
?>


<h1>Insertar</h1>

<form action="" method="post">

    <label for="nombre"> Nombre:
        <input type="text" name="nombre" id="nombre">
    </label>

    <label for="localidad"> Localidad:
        <input type="text" name="localidad" id="localidad">
    </label>

    <label for="telefono"> Telefono:
        <input type="text" name="telefono" id="telefono">
    </label>

    <input type="submit" name="insertar" value="Insertar">

</form>