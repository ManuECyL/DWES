<?php
    require ('./Empresa.php');
    require ('./EmpresaM.php');

    // Debe haber el mismo número de parámetros que en el constructor
    $empresa = new Empresa("B4956236", "Mola tu Web S.L.", "Zamora");

    echo "<pre>";

        print_r($empresa);

        echo "<br><br>";

        $empresa -> setCif("B4956236");
        // Para que funcione, el atributo nombre debe ser public en la clase
        $empresa -> nombre = "Mola tu Web S.L."; 
        // echo $empresa -> cif;
        print_r($empresa);

        echo "<br><br>";

    echo "</pre>";

   
    $empresaM = new EmpresaM ("B45126354", "Mi web", "Salamanca");
    $empresaM2 = new EmpresaM ("2", "Mi web", "Salamanca");
    $empresaM3 = new EmpresaM ("3", "Mi web", "Salamanca");

    echo "<pre>";

        print_r($empresaM);

        echo "<br><br>";
        
        // Utiliza la función __get
        echo $empresaM -> cif; 

        echo "<br";

        // Utiliza la función __set
        $empresaM -> cif = "123456789";
        $empresaM -> cifa = "123456789B";

        echo "<br><br>";

        // CIF __get(Modificado con set)
        echo $empresaM -> cif;

        echo "<br><br>";

        print_r($empresaM);

        echo "<br><br>";

        // Utiliza la función __toString
        echo "__toString de EmpresaM: ".$empresaM;

    echo "</pre>";


    // Muestra el contenido de la función static saluda()
    echo EmpresaM::saluda();

    echo "<br><br>";

    // Muestra la variable $cont que pertenece a la clase y se va incrementando cada que vez que se instancia una
    echo EmpresaM::$cont;
?>