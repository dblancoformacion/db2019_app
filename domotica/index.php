<?php
Class Luminarias{
	public $datos;
	function inicializa(){
		$conn=new mysqli('localhost','root','','db2019');
		$this->datos = $conn->query("
			SELECT * FROM luminarias
				JOIN estancias USING(id_estancia)
				ORDER BY estancia,luminaria;
		")->fetch_all(MYSQLI_ASSOC);
	}
	function mostrar(){
		$txt='<div>';
		$estancia=null;
		foreach($this->datos as $luminaria){
			if($estancia!=$luminaria['estancia']){
				$estancia=$luminaria['estancia'];
				$txt.='
					</div>								
					<div style="
							display:inline-block;
							border: solid 1px;
							border-radius: 10px;
							text-align: center;
							padding: 20px;
						">
						<div>
						'.$estancia.'
						</div>
				';
			}
			if($luminaria['encendida']) $ok='ko';
			else $ok='ok';
			$txt.='<a href="" title="'.$luminaria['luminaria'].'">';
			$txt.='<img src="imgs/foco_'.$ok.'.png">';
			$txt.='</a>';
		}
		return $txt.'</div>';
	}
}

$luminarias=new Luminarias();

// Modelo
$luminarias->inicializa();

// Controlador

// Vista
echo $luminarias->mostrar();
/*
echo '<pre>';
print_r($luminarias->datos);
echo '</pre>';
*/
?>