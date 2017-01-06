<?php

require_once 'Matrix.php';

$matrix = new Matrix;

$m = [
[4,5,7], 
[7,8,3],
[1,2,3],
];

$perLine =  [
[0,0,1], 
[0,1,0],
[1,0,0]
];

echo '<pre>';
print_r($m);
echo '</pre>';

echo '<pre>';
print_r($matrix->product($m, $perLine));
echo '</pre>';

/*
[7,5,4], 
[3,8,5],
[3,2,1]
*/

// test 

$a = [
[1,2],
[3,2],
];

$b =[
[1,2],
[2,1]
];

echo '<pre>';
print_r($matrix->product($a, $b));
echo '</pre>';


$c = [
[1,0],
[-1,3],
];

$d = [
[3,1],
[2,1],
]
;

echo '<pre>';
print_r($matrix->product($c, $d));
echo '</pre>';


