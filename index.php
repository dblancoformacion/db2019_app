<?php
session_start();

if(!isset($_SESSION)) echo '
	<form>
		<input name="login" placeholder="login" autofocus />
		<input name="password" placeholder="password" type="password"/>
		<button>Acceder</button>
	</form>
';
else echo ' <a href="?exit=1">Cerrar</a> ';

if( isset($_GET['login']) && isset($_GET['password']) ){
	if( $_GET['login']=='david'
		&& $_GET['password']=='hola'
	){
		echo 'Hola '.$_GET['login'].', tienes acceso';
		$_SESSION['login']='david';
		
	}
	else{
		echo 'Acceso no autorizado, introduce tus credenciales';
		session_destroy();
	}
}

echo '<pre>';
print_r($_SESSION);
echo '</pre>';















?>