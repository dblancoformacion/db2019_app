<?php	// Ejemplo de POO

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

$coche1=new Coches();
$coche2=new Coches();

echo '<pre>';
print_r($coche1);
print_r($coche2);
echo '</pre>';

?>