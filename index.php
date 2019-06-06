<?php
session_start();
if(isset($_GET['salir'])){
	session_destroy();
	session_start();
}

$conn=new mysqli('localhost','root','','db2019');

if( isset($_GET['login']) && isset($_GET['password']) ){
	$rs=$conn->query("
		SELECT * FROM usuarios
			WHERE usuario='".$_GET['login']."'
			AND passwd=MD5('".$_GET['password']."');	
	");
	if( $rs->num_rows )	$_SESSION['login']='david';
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
	echo ' <a href="?salir=1">Cerrar</a> ';
	
	echo '<div>Contenido únicamente accesible a usuarios registrados</div>';
	
}

echo '<pre>';
//print_r($_SESSION);
echo '</pre>';















?>