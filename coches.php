<?php	// Ejemplo de POO
Class Motos{
	public $ruedas=2;
	public $velocidad=0;
	function acelera(){
		return ++$this->velocidad;
	}
	function frena(){
		return --$this->velocidad;
	}
}
Class Coches{
	public $ruedas=4;
	public $velocidad=0;
	function acelera(){
		return ++$this->velocidad;
	}
	function frena(){
		return --$this->velocidad;
	}
}

$moto1=new Motos();
$moto2=new Motos();
$coche1=new Coches();
$coche2=new Coches();

echo $moto1->acelera();
echo $coche1->acelera();
echo $coche1->acelera();

echo '<pre>';
echo 'moto1: ';
print_r($moto1);
echo 'moto2: ';
print_r($moto2);
echo 'coche1: ';
print_r($coche1);
echo 'coche2: ';
print_r($coche2);
echo '</pre>';

?>