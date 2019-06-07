<?php
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
		return '<img src="'.$v.'.'.$e.'" style="width:150px"/> ';
	}
	function panel(){
		return '
			<div style="display:inline-block">
				<div>
				'.$this->velocidad.' Km/h
				</div>
				<div>
				<a href="#">Acelerar</a>
				</div>
				<div>
				'.$this->dibujar().'
				</div>
				<div>
				<a href="#">Frenar</a>
				</div>
			</div>		
		';
	}
}