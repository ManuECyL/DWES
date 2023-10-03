<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <p>
            Echo
        </p>    

        <?php
            echo "Hola Mundo";
            echo "<br>Hola Mundo","hola";

            print "<br>Hola Mundo con print";
            print "<br>";

            // Para escribir como un string
            printf("%s","17,99");

            print "<br>";

            // Para escribir como un entero
            printf("%d","17,99");

            print "<br>";

            // Para escribir como un decimal. (En lugar de usar una coma ',' hay que usar un punto '.' para separar los decimales)
            printf("%f","17.99");

            print "<br>";

            print "<br>Información de var_dump<br>";

            // Informa del tipo de dato y el número de posiciones que tiene
            var_dump("maria");

            print "<br>";

            var_dump(3,"pepe",true);

            print "<br>";
         
            
        // DECLARAR VARIABLES
            print "<br><h1>Tipos de variables</h1>";
            $mivariable = 6;
            echo "Mi variable es $mivariable y es de tipo: " . gettype($mivariable); 

            print "<br>";

            $mivariable = 6.5;
            echo "Mi variable es $mivariable y es de tipo: " . gettype($mivariable);

            print "<br>El raro del booleano<br>";
            $booleano = false;
            echo "Mi variable es $booleano y es de tipo: " . gettype($booleano);
            print "<br>";
            var_dump($booleano);

            print "<br>";

            $micadena = "Hola";
            echo "Mi variable es $micadena y es de tipo: " . gettype($micadena);
            
            print "<br>";

            $nulo = null;
            echo "Mi variable es $nulo y es de tipo: " . gettype($nulo);
            print "<br>";
            var_dump($nulo);

            print "<br>";

            $cadena = "Se escibe a con comillas \"a\"";
            print "<br>";
            echo $cadena;

            print "<br>";

            // Heredoc -> Permite escribir sin usar las barras de escape '\'. Interpreta como html.
            $heredoc = <<< TEXT
            Escribo todo lo que quiero <p> con "comillas" </p>
            TEXT;

            echo $heredoc;

            // Escribir en hexadecimal
            $var = 0x2A;
            echo $var;
            print "<br>";
            $var = 8.3e-1;
            echo $var;
            print "<br>";

        // CONVERSIÓN DE TIPOS
            echo "<h1>Conversión de tipos</h1>";
            $a = 4;
            $b = 4.5;
            $c = "maria";
            $d = false;
            $e = null;

            $r = $a + $b;
            echo "Mi variable es $a + $b es $r de tipo " . gettype($r);
            print "<br>";

            $r = $a . $c;
            echo "Mi variable es $a . $c es $r de tipo " . gettype($r);
            print "<br>";

            $r = $a + $d;
            echo "Mi variable es $a + $d es $r de tipo " . gettype($r);
            print "<br>";

            $r = $a + $e;
            echo "Mi variable es $a + $e es $r de tipo " . gettype($r);
            print "<br>";

            $r = $a . $e;
            echo "Mi variable es $a . $e es $r de tipo " . gettype($r);
            print "<br>";

            $r = $a + (int)$b;
            echo "Mi variable es $a + $b es $r de tipo " . gettype($r);


        // VARIABLE DE VARIABLE
            echo "<h1>Variable de Variable</h1>";

            $alumno1 = "miguel";
            $alumno2 = "fernando";
            $alumno3 = "giorgi";
            $alumno4 = "raul";
            
            $elegido = "alumno" . random_int(1,4);

            //echo $elegido;
            echo $$elegido;

            print "<br>";
        ?>

        <a href="mipagina.php?nombre=maria&nombre2=pepe">Pasar Nombre</a>
    </body>
</html>
