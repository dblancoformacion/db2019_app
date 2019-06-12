<form method="post">
	<input name="correo" type="email" />
	<select name="edad">
		<option>20</option>
		<option>25</option>
		<option>30</option>
	</select>
	<button>Ok!</button>
	<!-- -->
</form>

<?php

if( isset($_POST['correo']) ){

	echo $_POST['correo'];

	print_r($_POST);
}

?>