<?php	// Ejemplo de POO
Class Coches{
	private $ruedas=4;
	private $velocidad=0;
	function acelera(){
		return ++$this->velocidad;
	}
	function frena(){
		return --$this->velocidad;
	}
	function dibujar(){
		if($this->velocidad) $e='gif';
		else $e='jpg';
		return '<img src="coche.'.$e.'" style="width:150px">';
	}
}
Class Motos{
	private $ruedas=2;
	private $velocidad=0;
	function acelera(){
		return ++$this->velocidad;
	}
	function frena(){
		return --$this->velocidad;
	}
	function dibujar(){
		if($this->velocidad) $e='gif';
		else $e='jpg';
		return '<img src="moto.'.$e.'" style="width:150px">';
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