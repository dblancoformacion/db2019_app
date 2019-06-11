<?php
Class Luminarias{
	public $datos;
	function inicializa(){
		$conn=new mysqli('localhost','root','','db2019');
		$this->datos = $conn->query("
			SELECT * FROM luminarias
				JOIN estancias USING(id_estancia);
		")->fetch_all(MYSQLI_ASSOC);
	}
}

$luminarias=new Luminarias();
$luminarias->inicializa();


echo '<pre>';
print_r($luminarias->datos);
echo '</pre>';

?>