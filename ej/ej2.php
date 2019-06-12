<?php

$nombre='Juan';
$enlace='http://www.google.es';

echo 'Estimado Sr. '.$nombre.': Le envío el siguiente enlace ';

echo "Hola $nombre, ¿qué tal?";

echo '
	<a href="#"></a>
';

$sql="
	SELECT * FROM tabla WHERE campo='hola';
";

echo $nombre.' '.$enlace;

?>

<a href="">mensaje</a>


<a href="<?php $enlace?>"><?=$enlace?></a>