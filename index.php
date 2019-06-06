<?php
session_start();

echo '
	<form>
		<input name="login" placeholder="login" autofocus />
		<input name="password" placeholder="password" type="password"/>
		<button>Acceder</button>
	</form>
';

if( isset($_GET['login']) && isset($_GET['password']){
	if( $_GET['login']=='david'
		&& $_GET['password']=='hola'
	){
		echo 'Hola '.$_GET['login'].', tienes acceso';
		$_SESSION['login']='david';
		echo ' <a href="?exit=1">Cerrar</a> ';
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