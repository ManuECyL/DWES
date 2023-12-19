<?php
    header('HTTP/1.0 401 Unauthorized');
?>

<a href="./login.php">Login</a>

<?php
    echo "<br><br><span style='color:red'>";
    die('Sesión cerrada');
    echo "</span>";
?>