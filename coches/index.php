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
	function dibujar(){
		return 'Coche';
	}
}
Class Motos{
	public $ruedas=2;
	private $velocidad=0;
	function acelera(){
		return ++$this->velocidad;
	}
	function frena(){
		return --$this->velocidad;
	}
	function dibujar(){
		return 'Moto';
	}
}

$coche1=new Coches();
$coche2=new Coches();
$moto1=new Motos();
$moto2=new Motos();

$coche1->acelera();
$moto1->acelera();

echo $coche1->dibujar();
echo $coche2->dibujar();
echo $moto1->dibujar();
echo $moto2->dibujar();

?>