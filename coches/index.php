<?php	// Ejemplo de POO
Class Vehiculos{
	private $ruedas;
	private $velocidad=0;
	function __construct($n_ruedas){
		$this->ruedas=$n_ruedas;
	}
	function acelera(){
		return ++$this->velocidad;
	}
	function frena(){
		return --$this->velocidad;
	}
	function dibujar(){
		if($this->ruedas>3) $v='coche';
		else $v='moto';
		if($this->velocidad) $e='gif';
		else $e='jpg';
		return '<img src="'.$v.'.'.$e.'" style="width:150px">';
	}
}
$coche1=new Vehiculos(4);
$coche2=new Vehiculos(4);
$moto1 =new Vehiculos(2);
$moto2 =new Vehiculos(2);
$coche1->acelera();
$moto1->acelera();
echo $coche1->dibujar();
echo $coche2->dibujar();
echo $moto1->dibujar();
echo $moto2->dibujar();
?>