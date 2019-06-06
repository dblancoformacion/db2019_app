<?php
session_start();
if(isset($_GET['salir'])){
	session_destroy();
	session_start();
}

$conn=new mysqli('localhost','root','','db2019');
$conn->query("SET NAMES utf8;");

if( isset($_GET['login']) && isset($_GET['password']) ){
	$rs=$conn->query("
		SELECT * FROM usuarios
			WHERE usuario='".$_GET['login']."'
			AND passwd=MD5('".$_GET['password']."');	
	");
	if( $rs->num_rows )	$_SESSION['login']=1;
	else echo 'Acceso no autorizado, introduce tus credenciales';
}

if(!isset($_SESSION['login'])) echo '
	<form>
		<input name="login" placeholder="login" autofocus />
		<input name="password" placeholder="password" type="password"/>
		<button>Acceder</button>
	</form>
';
else{
	
	if(isset($_GET['borra'])) $conn->query("
		DELETE FROM suscriptores
			WHERE id_suscriptor=".$_GET['borra'].";	
	");
	
	echo ' <a href="?salir=1">Cerrar</a> ';
	
	echo '<div>Contenido únicamente accesible a usuarios registrados</div>';
	
	$r=$conn->query("
		SELECT * FROM suscriptores;	
	")->fetch_all();
	
	foreach($r as $c){
		echo '<p>';
		echo '<a href="?borra='.$c[0].'">';
		echo '<img src="papelera.png" style="width:16px;">';
		echo '</a>';
		echo ' '.$c[1].' '.$c[2].'</p>';
	}
}

echo 'Esto lo ve todo el mundo';










?>