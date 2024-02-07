<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Examen</h1>

    <?php
    if (validado()) {
        ?>
        <form action="" method="post">
            <input type="submit" name="logout" value="Logout">
        </form>
        <?php
    }
    ?>
    <br>
    <br>
    <main>
        <?php
        if (!isset($_SESSION['vista'])) {
            require VIEW . 'login.php';
        } else {
            require $_SESSION['vista'];
        }
        ?>
    </main>

    <footer>
        <p>MVC</p>
    </footer>

</body>

</html>