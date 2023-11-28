<?php

$fichero = "examen1.xml";

$ruta = '/var/www/html/DWES/00_Pruebas_Examenes/1Ev/Ejercicio1';
// chmod($ruta, 0777);
$permisos = '777';
$comando = 'sudo chmod ' . $permisos . ' ' . escapeshellarg($ruta);
$salida = shell_exec($comando);

// Obtenemos la IP del Cliente
$ip = gethostbyaddr($_SERVER['REMOTE_ADDR']);

// Declaramos una variable 'veces' que funcionará como contador de las veces que accede una misma IP al servidor
$veces = 1;

// Obtenemos la fecha de acceso con un formato específico
$fecha = date(DATE_RFC2822);

$dom = new DOMDocument("1.0","utf-8");

$raiz = $dom -> createElement("Examen1");
$dom -> appendChild($raiz);


// Datos 
$raiz -> appendChild($dom -> createElement("Ip",$ip));
$raiz -> appendChild($dom -> createElement("Veces",$veces));
$raiz -> appendChild($dom -> createElement("Fecha",$fecha));


// Guardamos el dom en un documento
if ($dom -> save($fichero)) {

    $dom -> load($fichero);

    // Recorrer los hijos
    foreach ($raiz -> childNodes as $elementos) {
        
        if ($elementos -> nodeType == 1) {
    
            foreach ($elementos -> childNodes as $datos) {
                echo "<strong>" . $elementos->nodeName . "</strong>: " . $elementos->nodeValue . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            }
        }
    }

} else {
    echo "Error al guardar el fichero";
}
    
?>