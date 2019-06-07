<?php	// Ejemplo de POO
//require('Vehiculos.php');
Class Vehiculos{
	private $ruedas;
	private $velocidad=0;
	function __construct($n_ruedas,$velocidad){
		$this->ruedas=$n_ruedas;
		$this->velocidad=$velocidad;
	}
	function acelera($conn){
		++$this->velocidad;
		$conn->query("
			UPDATE vehiculos 
				SET velocidad=".$this->velocidad."
				WHERE id_vehiculo=".$_GET['acl']."
		");
		return $this->velocidad;
	}
	function frena($conn){
		if($this->velocidad>0){
			--$this->velocidad;
			$conn->query("
				UPDATE vehiculos
					SET velocidad=".$this->velocidad."
					WHERE id_vehiculo=".$_GET['dcl']."
			");
		}
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

// modelo
$conn=new mysqli('localhost','root','','db2019');
$r=$conn->query("
	SELECT * FROM vehiculos;
")->fetch_all();
foreach($r as $c)
	$vehiculo[$c[0]] = new Vehiculos($c[1],$c[2]);
// controlador
if(isset($_GET['acl']))
	$vehiculo[$_GET['acl']]->acelera($conn);
if(isset($_GET['dcl']))
	$vehiculo[$_GET['dcl']]->frena($conn);
// vista
foreach($r as $c)
	echo $vehiculo[$c[0]]->panel($c[0]);
?>