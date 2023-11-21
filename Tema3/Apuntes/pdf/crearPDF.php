<?
    require('../../../fpdf186/fpdf.php');
    require('./HeaderC.php');


    // Crear objeto PDF usando la clase de Header que extiende de FPDF
    $pdf = new HeaderC;

    // Añadir una página
    $pdf -> AddPage();

    // Establecer una fuente para el texto
    $pdf -> SetFont("Courier", "B", 20);

    // Escribir algo en la página
    $pdf -> Write(5, "Hola Mundo");

    // Añadir otra página
    $pdf -> AddPage();

    // Imagen
    $pdf -> Image('./php_img.jpg',10,20,190,74);


    // Añadir otra página
    $pdf -> AddPage();

    // Tabla -> Conjunto de celdas
    $pdf -> Cell(50,10,'Prueba',1,0,'C', false);
        // Celda detrás de otra celda
    $pdf -> Cell(50,10,'Prueba',1,0,'C', false);
    
    // Celda comienzo de la siguiente línea
    $pdf -> Cell(50,10,'Prueba',1,1,'C', false);
    $pdf -> Cell(50,10,'Prueba',1,0,'C', false);

    // Celda debajo
    $pdf -> Cell(50,10,'Prueba',1,2,'C', false);
    $pdf -> Cell(50,10,'Prueba',1,0,'C', false);


    // Añadir otra página
    $pdf -> AddPage();

    // Array de ordenadores para insertar en una tabla
    $array = array(
        array('pc1', 'Lenovo', '1TB', '8GB'),
        array('pc2', 'Dell', '2TB', '16GB'),
        array('pc3', 'HP', '1TB', '4GB'),
        array('pc4', 'MAC', '4TB', '4GB')
    );

    // Llamar a la función creaTabla
    creaTabla($array, $pdf);
    
    // Guardar el fichero pdf
    $pdf -> Output();


    // Insertar datos del array ordenadores en una tabla dentro del PDF
    function creaTabla($array, $pdf) {

        // Color de la celda
        $pdf -> SetFillColor(0,150,255);

        // Primeras 4 celdas superiores
        $pdf -> Cell(45,10,'PC',1,0,'C', true);
        $pdf -> Cell(45,10,'Marca',1,0,'C', true);
        $pdf -> Cell(45,10,'Disco Duro',1,0,'C', true);
        $pdf -> Cell(45,10,'RAM',1,0,'C', true);

        // Salto de línea
        $pdf -> Ln();

        // Resto de celdas recorriendo el array
        foreach ($array as $row) {
            
            foreach ($row as $datos) {
                $pdf -> Cell(45,10,$datos,1,0,'C', false);
            }

            // Salto de línea
            $pdf -> Ln();
        }
    }
?>


<?
// Crear objeto PDF
    // $pdf = new FPDF();

// Cabecera de página para el PDF establecida en otro fichero
    // $pdf -> Header();

// Obtener el ancho de la página y escribirlo
    // $pdf -> Write(5, $pdf -> GetPageWidth());

?>