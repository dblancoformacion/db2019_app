<?php
session_start();
if(isset($_GET['salir'])){
	session_destroy();
	session_start();
}

if( isset($_GET['login']) && isset($_GET['password']) ){
	if( $_GET['login']=='david'
		&& $_GET['password']=='hola'
	) $_SESSION['login']='david';
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