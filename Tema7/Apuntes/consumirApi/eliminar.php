<?
    require('curl.php');
    require('confApi.php');

    if(isset($_REQUEST['eliminar'])) {
        
        // DELETE válido para todos (recurso, id)
        delete('institutos', $_REQUEST['id']);

        header('Location: ./index.php');

    }
?>

<h1>Actualizar</h1>

<form action="" method="post">

    <label for="id"> Id:
        <input type="text" name="id" id="id">
    </label>

    <input type="submit" name="eliminar" value="Eliminar">

</form>