<?php	// Ejemplo de POO
//require('Vehiculos.php');
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
		return '<img src="'.$v.'.'.$e.'" style="
			width:150px;
			"/> ';
	}
	function panel(){
		return '
			<div style="
				display:inline-block;
				text-align:center;
				">
				<div>
				'.$this->velocidad.' Km/h
				</div>
				<div>
				<a href="#"><button>Acelerar</button></a>
				</div>
				<div style="
					height:150px;
					padding-top:20px;
				">
				'.$this->dibujar().'
				</div>
				<div>
				<a href="#"><button>Frenar</button></a>
				</div>
			</div>		
		';
	}
}
$coche1=new Vehiculos(4);
$coche2=new Vehiculos(4);
$moto1 =new Vehiculos(2);
$moto2 =new Vehiculos(2);
$coche1->acelera();
$moto1->acelera();
echo $coche1->panel();
echo $coche2->panel();
echo $moto1->panel();
echo $moto2->panel();
?>