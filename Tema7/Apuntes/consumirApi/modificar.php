<?
    require('curl.php');
    require('confApi.php');

    if(isset($_REQUEST['modificar'])) {
        
        $array = array();
        
        if (!empty($_REQUEST['nombre'])) {
            $array['nombre'] = $_REQUEST['nombre'];    
        }

        if (!empty($_REQUEST['localidad'])) {
            $array['localidad'] = $_REQUEST['localidad'];
        }

        if (!empty($_REQUEST['telefono'])) {
            $array['telefono'] = $_REQUEST['telefono'];
        }

        // PUT válido para todos (recurso, id, body(array))
        put('institutos', $_REQUEST['id'], $array);

        header('Location: ./index.php');

    }
?>

<h1>Actualizar</h1>

<form action="" method="post">

    <label for="id"> Id:
        <input type="text" name="id" id="id">
    </label>

    <label for="nombre"> Nombre:
        <input type="text" name="nombre" id="nombre">
    </label>

    <label for="localidad"> Localidad:
        <input type="text" name="localidad" id="localidad">
    </label>

    <label for="telefono"> Telefono:
        <input type="text" name="telefono" id="telefono">
    </label>

    <input type="submit" name="modificar" value="Modificar">

</form>