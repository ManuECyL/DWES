<?php
    include("./FuncionesUtiles.php");
    
    // echo edad(1956,3,25);


    // echo iva(100, 0.1); -> Con el 10%
    // echo iva(100); -> Con el 21%

    $contador = array();
    
    añadirAlArray($contador, "uno");
    añadirAlArray($contador, "dos");
    añadirAlArray($contador, "tres");

    print_r($contador); 
?>