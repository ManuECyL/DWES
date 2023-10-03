<pre>
    <?php
        print_r($_SERVER);
        print_r($_GET);

    ?>
</pre>

<?php
// AMBITO DE LAS VARIABLES
    echo "<h1>Ambito de las variables</h1>";
    $contador = 5;

    function PruebaVariable() {
        echo $contador;
    }

    function PruebaVariableParametro($contador) {
        echo $contador;
        $contador++;
        echo "<br>";
        echo $contador;
    }

    function PruebaVariableReferencia(&$contador) {
        echo $contador . "<br>";
        $contador++;
        echo $contador;
    }

    function PruebaVariableGlobal() {
        global $contador;
        echo $contador . "<br>";
        $contador++;
        echo $contador;
    }

    echo "<p>No puede acceder</p>";
    PruebaVariable();

    echo "<p>Pasado como parametro</p>";
    PruebaVariableParametro($contador);
    echo "<p>¿Qué le pasa a contador?</p>";
    echo $contador;

    echo "<p>Pasado como parametro con referencia</p>";
    PruebaVariableReferencia($contador);
    echo "<p>¿Qué le pasa a contador?</p>";
    echo $contador;

    echo "<p>Sin parametro pero llama a la variable global</p>";
    PruebaVariableGlobal($contador);
    echo "<p>¿Qué le pasa a contador?</p>";
    echo $contador;

    echo "<br>";

// STATIC
    function contador() {
        static $c = 0;
        $c++;
        echo "<br>" . $c;
    }

    contador();
    contador();
    contador();
    contador();
    contador();

    echo "<br>";

// CONSTANTES
    define("USER","Maria");
    echo USER;

    