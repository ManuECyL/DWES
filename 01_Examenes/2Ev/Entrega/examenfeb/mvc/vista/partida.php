
<a href="<?php echo $_SERVER['PHP_SELF']?>?logout=logout">Logout</a>

<?
echo "<br>palabra:" .implode($_SESSION['palabra']);
echo "<br>Oculta:" .implode($_SESSION['oculta']);
echo "<br>Intentos:" .$_SESSION['intentos'];

?>

<form action="" method="post">
    <input type="text" name="letra">
    <input type="submit" value="Prueba letra" name="pletra">
</form>