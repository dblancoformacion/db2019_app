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
		if($this->velocidad>0)
			--$this->velocidad;
		return $this->velocidad;
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
	function panel($i){
		return '
			<div style="
				display:inline-block;
				text-align:center;
				">
				<div>
				'.$this->velocidad.' Km/h
				</div>
				<div>
				<a href="?acl='.$i.'"><button>Acelerar</button></a>
				</div>
				<div style="
					height:150px;
					padding-top:20px;
				">
				'.$this->dibujar().'
				</div>
				<div>
				<a href="?dcl='.$i.'"><button>Frenar</button></a>
				</div>
			</div>		
		';
	}
}
// persistencia
session_start();
if(isset($_SESSION['vehiculo']))
	$vehiculo=$_SESSION['vehiculo'];
else{
	// modelo
	$vehiculo[] = new Vehiculos(4);
	$vehiculo[] = new Vehiculos(4);
	$vehiculo[] = new Vehiculos(2);
	$vehiculo[] = new Vehiculos(2);
}
// controlador
if(isset($_GET['acl']))
	$vehiculo[$_GET['acl']]->acelera();
if(isset($_GET['dcl']))
	$vehiculo[$_GET['dcl']]->frena();
// vista
for($i=0;$i<4;$i++)
	echo $vehiculo[$i]->panel($i);
// persistencia
$_SESSION['vehiculo']=$vehiculo;
?>