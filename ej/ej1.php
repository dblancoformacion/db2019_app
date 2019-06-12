<?php

$a='Yo';
$b[1]='Hola';
$b[2]='Adios';
$b[3]=[
	'81'=>'buenos días',
	'50'=>'buenos tardes',
];
$b[4]='buenas noches';

echo '<pre>';
echo $a;
echo $b[1];
echo $b[2];
print_r($b);
echo $b[3][81];
echo $b[1];
echo $b[4];
echo '</pre>';

?>