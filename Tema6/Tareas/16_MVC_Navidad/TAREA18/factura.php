<?php
require_once './config/config.php';
session_start();
$pedido = PedidoDAO::findByCodigo($_SESSION['id']);
if (!isset($_SESSION['usuario'])) {
    $_SESSION['controller'] = CON . 'loginController.php';
    $_SESSION['view'] = VIEW . 'login.php';
    header("Location: ./");
    exit;
}else if(!UserDAO::isAdmin($_SESSION['usuario']->user) && !UserDAO::isModerador($_SESSION['usuario']->user) && $_SESSION['usuario']->user != $pedido->usuario){
    $_SESSION['controller'] = CON . 'loginController.php';
    $_SESSION['view'] = VIEW . 'login.php';
    header("Location: ./");
    exit;
}
class HeaderC extends FPDF {
    function Header (){
        $this->SetFont('helvetica', 'B', 20); 
        $this->SetTextColor (100,100,100);
        $this->Image(IMG."logo.png", 10,20, 70, 50);
        $this->SetY(40);
        $this->SetX(100);
        $this->Write(5,"FACTURA - Mesa Para 2");
        $this->Ln();
        $this->Ln();
        $this->SetFont('helvetica','', 20); 
        $this->SetX(100);
        $this->SetFontSize(13);
        $this->SetX(100);
        $this->Write(5,"CIF: A456436");
        $this->Ln();
        $this->SetX(100);
        $this->Write(5,"Avenida de Requejo s/n");
        $this->Ln();
        $this->SetX(100);
        $this->Write(5,"49029 Zamora");
        $this->Ln();
        $this->SetX(100);
        $this->Write(5,"www.mesapara2.es");
        $this->SetLineWidth(2.3);
        $this->SetDrawColor(256,150,40);
        $this->Line(93,69,93,35);
    
        $this->Ln();

    }

 
}
$pdf = new HeaderC;         //LLama a la cabecera que hemos creado en otro archivo

$pdf->AddPage();                //Añade una pagina

$pdf->SetFont('helvetica', 'B', 20); 
$pdf->SetTextColor (0,0,0);

$pdf->SetLineWidth(2.3);
$pdf->SetDrawColor(256,150,40);
$pdf->Line(90,76,10,76);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('helvetica', 'B', 15); 
$pdf->SetTextColor (100,100,100);
$pdf->Write(5,"Datos del cliente:");
$pdf->Ln();
$pdf->Ln();

$cliente = UserDAO::findByUser($pedido->usuario);
cliente($cliente, $pdf);



$pdf->SetY(125);
$pdf->SetX(10);
$pdf->SetFont('helvetica', 'B', 20); 
creaFactura($pedido, $pdf);
$pdf->Output();

function cliente ($objetoCliente, $pdf){
    $pdf->SetTextColor (100,100,100);
    $pdf->SetFontSize(10);

    $pdf->Write(5,"Usuario: ".$objetoCliente->user);
    $pdf->Ln();
    $pdf->Write(5,"Email: ".$objetoCliente->email);
    $pdf->Ln();
    $pdf->Write(5,"Fecha de Nacimiento: ".$objetoCliente->fecha_nac);
    $pdf->Ln();

}


function creaFactura ($objetoPedido, $pdf){
    $producto = ProductoDAO::findByCodigo($objetoPedido->cod_producto);
    $pdf->SetFontSize(10);
    $pdf-> SetFillColor(256,150,40);    //Color de fonfo
    $pdf-> Cell(80,10, 'Concepto', 0, 0,'C',true);     //True rellena de color de fondo
    $pdf-> Cell(27,10, 'Cantidad', 0, 0,'C',true);
    $pdf-> Cell(27,10, 'Precio', 0, 0,'C',true);
    $pdf-> Cell(27,10, 'Suma', 0, 0,'C',true);
    $pdf-> Cell(27,10, 'I.V.A.', 0, 0,'C',true);
    $pdf->Ln();

    
        $pdf->SetTextColor (100,100,100);
        $pdf->SetLineWidth(1.5);
        $pdf->SetDrawColor(256,150,40);
        $pdf-> SetFillColor(255,255,255);
        $pdf-> Cell(80,10, $producto->titulo, 'B', 0,'L',true);
        $pdf-> Cell(27,10, $objetoPedido->cantidad, 'B', 0,'C',true);
        $pdf-> Cell(27,10, $producto->precio, 'B', 0,'C',true);
        $pdf-> Cell(27,10, $objetoPedido->total, 'B', 0,'C',true);
        $pdf-> Cell(27,10, '21%', 'B', 0,'C',true);
        

        $pdf->Ln();
    

}
?>