<?php
Class Sesiones{
	function __construct(){
		$this->iniciar();
	}
	function iniciar(){
		session_start();
	}
	function cerrar(){
		session_destroy();
		session_start();		
	}
}
Class Datos{
	public $conn;
	function __construct(){
		$this->conectar();
	}
	function conectar(){
		$this->conn=new mysqli(
			'localhost','root','','db2019'
		);
		$this->conn->query("SET NAMES utf8;");		
	}
}
Class Suscriptores{
	function insertar($conn){
		$conn->query("
			INSERT INTO suscriptores (nombre, email, f_ins)
			  VALUES (
				'".$_GET['nombre']."',
				'".$_GET['email']."', NOW()
				);		
		");	
	}
	function borrar($conn){
		$conn->query("
				DELETE FROM suscriptores
					WHERE id_suscriptor=".$_GET['borra'].";	
			");		
	}
	function listado($conn){
		$r=$conn->query("
			SELECT * FROM suscriptores;	
		")->fetch_all();
		
		$txt=null;
		foreach($r as $c){
			$txt.= '<p>';
			$txt.= '<a href="?borra='.$c[0].'">';
			$txt.= '<img src="papelera.png" style="width:16px;">';
			$txt.= '</a>';
			$txt.= ' '.$c[1].' '.$c[2].'</p>';
		}
		return $txt;
	}
	function formulario(){
		return '
			<form>
				<input name="nombre" placeholder="Nombre">
				<input name="email" placeholder="email">
				<button>Suscribirse</button>
			</form>
		';
	}
}
Class Usuarios{
	function autentificar($conn){
		$rs=$conn->query("
			SELECT * FROM usuarios
				WHERE usuario='".$_GET['login']."'
				AND passwd=MD5('".$_GET['password']."');	
		");
		if( $rs->num_rows )	$_SESSION['login']=1;
		return $rs->num_rows;
	}
	function formulario(){
		return '
			<form>
				<input name="login" placeholder="login" autofocus />
				<input name="password" placeholder="password" type="password"/>
				<button>Acceder</button>
			</form>
		';		
	}
}

$sesion=new Sesiones();
if(isset($_GET['salir'])) $sesion->cerrar();

$datos=new Datos();
//$conn=$datos->conn;
$suscriptor=new Suscriptores();

if(isset($_GET['email']) && isset($_GET['nombre']))
	$suscriptor->insertar($datos->conn);

$usuario=new Usuarios();

if( isset($_GET['login']) && isset($_GET['password']) ){
	if(!$usuario->autentificar($datos->conn)) 
		echo 'Acceso no autorizado, introduce tus credenciales';		
}

if(!isset($_SESSION['login']))
	echo $usuario->formulario();
else{
	
	if(isset($_GET['borra']))
		$suscriptor->borrar($datos->conn);
	
	echo ' <a href="?salir=1">Cerrar</a> ';
	
	echo '<div>Contenido únicamente accesible a usuarios registrados</div>';
	
	echo $suscriptor->listado($datos->conn);
}

echo $suscriptor->formulario();

?>










