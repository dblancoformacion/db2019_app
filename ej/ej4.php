<?php

Class Vehiculo{
	public $velocidad=0;
}

$coche = new Vehiculo;

//$coche['velocidad']=5;
$coche->velocidad=5;

echo $coche->velocidad;

echo '<pre>';
print_r($coche);
echo '</pre>';

?>