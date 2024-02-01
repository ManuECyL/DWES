<?php

require ('./Empresa.php');
require ('./EmpresaM.php');

$empresa = new Empresa("B45236589","Mi web ","Zamora");

print_r($empresa);
$empresa->setCif("B4965236");
$empresa->setNombre("Mola tu Web S.L.");
//echo $empresa->cif;
print_r($empresa);


$empresaM = new EmpresaM("B45236589","Mi web ","Zamora");
$empresaM1 = new EmpresaM("2","Mi web ","Zamora");
$empresaM2 = new EmpresaM("3","Mi web ","Zamora");
print_r($empresaM);
echo "<br>";
echo "<br>";
echo $empresaM->cif;
echo "<br>";
$empresaM->cif = "123456789";
$empresaM->cifa = "123456789";
echo "<br>";
echo $empresaM->cifa;
echo "<br>";
echo "<br>";

echo $empresaM;


echo EmpresaM::saluda();
echo EmpresaM::$cont;