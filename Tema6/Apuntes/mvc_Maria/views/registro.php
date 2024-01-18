<h1>Registro</h1>
<form action="" method="post">
    <label for="cod">codUsuario:
        <input type="text"  name="cod" id="cod" >
    </label>
    <br>
    <label for="nombre">desUsuario:
        <input type="text" name="nombre" id="nombre">
    </label>
    <p class="error">
        <?php 
        if(isset($errores))
            errores($errores, 'nombre'); ?>
    <p>
    <br>
    <label for="pass">Pass:
        <input type="password" name="pass" id="pass">
    </label>
    <p class="error">
    <?php 
        if(isset($errores))
            errores($errores, 'pass'); ?>
    <p>
    <br>
    <label for="pass1"> Repite Pass:
        <input type="password" name="pass1" id="pass1">
    </label>
    <p class="error">
    <?php 
        if(isset($errores))
            errores($errores, 'pass1'); ?>
    <p>
    <br>
    <?php 
        if(isset($errores)){
            errores($errores, 'igual');
            errores($errores, 'registrar');            
        }?>
    
    <input type="submit" name="Login_GuardaRegistro" value="Guardar"  >
    </form>