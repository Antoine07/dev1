<?php
/**
 * @author: Antoine
 * @description: semaine 1 exercices
 */

// exercice 1
$life = 0 ;
$force = 100 ;

while($life< $force)
{
	echo ++$life . "\n"; // retour à la ligne dans le fichier mettre des doubles côtes
}


// exercice 2 
// 15 / 2 = 7 reste 1 15 = 7*2 + 1  <- modulo 2 
if(0) echo "zéro"; else echo "faux"; // 0 <=> false
if(1) echo "un"; else echo "faux"; // 1 ou un nombre différent de 0 est considéré comme true

while($force)
{
	if( $force % 2 == 1 ) echo $force ;  // if($force%2) echo $force;
	$force--;
}


// Exercice 3
$force = 0 ;
$dayEnd = 24 * 60 * 60 ;  // paquet de secondes d'une journée, c'est plus clair à lire
$time = 0 ;

while($time < $dayEnd)
{
	if($time % 3 == 0) {
		$force += 5 ;
	}

	$time++;
}

echo '<pre>';
print_r($force);
echo '</pre>';

// Exercice 4
function inverse_str($string)
{
	$len = strlen($string); // longueur de la chaine

	$inv = '' ;
	/*
	while($len != 0 )
	{
		$inv .= $string[$len -1] ;
		$len--;
	}*/
	// une autre version mais maintenant avec for, peut être plus clair à lire et écrire
	for($i=$len; $i>0; $i--)
	{
		$inv .= $string[$i -1] ;
	}

	return $inv;
}

echo '<pre>';
print_r(inverse_str('Engage le jeu que je le gagne'));
echo '</pre>';



// exercice 5
function gen_num_alea($length,$interval){
	$result = 0;
	for ($i=0; $i <$length ; $i++) {
		if ($i == $length-1) {
			$result += pow(10,$i)*mt_rand(1,$interval);
		}else{
			$result += pow(10,$i)*mt_rand(0,$interval);
		}
	}
	echo $result;
}
gen_num_alea(5,1);



// exercice 6

$cartes = ['c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'c8', 'c9', 'c10', 'c11', 'c12', 'c13', 'c14', 'c15','c16', 'c17', 'c18', 'c19', 'c20'];

function tirage_alea ($array, $num) {
	
	$result = [];
	$index_array = array_rand($array, $num);
	/*
	for ($i=0; $i < count($index_array); $i++) { 
		$index = $index_array[$i];
		$result[] = $array[$index];
	}*/

	if($num == 1) 
	{
		return $array[$index_array];
	}

	foreach($index_array as $o)
	{
		$result[] = $array[$o];
	}

	return $result;
}

echo '<pre>';
print_r(tirage_alea($cartes, 2));
echo '</pre>';

// Exercice 11

function is_in_array($elem, array $list)
{
	foreach($list as $e) 
	{
		if($elem == $e) return true;
	}

	return false;
}


function find_max_elem(array $list, Closure $comp)
{
	$max = 0 ;
	foreach($list as $e) 
	{
		if($comp($e, $max)) $max = $e;
	}

	return  $max;
}

$list = [1,5,89,2,0,10,6];

echo '<pre>';
print_r(find_max_elem($list, function($a, $b) {return ($a > $b); }));
echo '</pre>';

function mediane(array $list){

	sort($list);

	$len = count($list);

	if( $len%2 == 0) {
		$p = $len/2;

		return ($list[$p-1] + $list[$p]) / 2 ;
	}

	$p  = ($len - 1 )/ 2;

	return $list[$p];

}
echo "<h2>Medianes tests</h2>" ;
echo '<pre>';
print_r(mediane([1,2,45,89]));
echo '</pre>';

echo '<pre>';
print_r(mediane([1,45,8,9,10,3,5,6]));
echo '</pre>';

echo '<pre>';
print_r(mediane([45,8,9,10,3,5,6]));
echo '</pre>';


function nb_question_lg(array $questions, int $max)
{

	$cpt = 0 ;
	foreach($questions as $q )
	{
		if(strlen($q) >= $max) $cpt++;
	}

	return $cpt;
}
$listQ = ['question 1', 'question 2 plus longue', 'question 3', 'question 4 plus longue encore'];
echo '<pre>';
print_r(nb_question_lg($listQ, 11));
echo '</pre>';

echo '<pre>';
print_r(find_max_elem($listQ, function($a, $b) { return (strlen($a) > strlen($b)) ;}));
echo '</pre>';

// Exercice cesear PHP 12

function char_rot(int $n, string $c)
{
	$code = ord($c);

	if($code > 96 && $code < 123)
	{
		$num = ( ($code - 97  + $n) % 26 ) + 97 ; // translation à 0 puis redécallage à 97 pour se positionner sur les majuscules

	}

	if($code > 64 && $code < 91){
		$num = ( ($code - 65  + $n) % 26 ) + 65 ;
	}

	return chr($num);
}


echo '<pre>';
print_r(char_rot(1, 'Z'));
echo '</pre>';

function cesear(int $num, string $message) : string{

	$len = strlen($message);
	$code = '';

	for ($i=0; $i <$len ; $i++) { 
		$code .=  char_rot($num, $message[$i]);
	}

	return $code;

}

echo '<pre>';
print_r(cesear(2,'ABCDEFGHIJKLMNOPQRSTUVWXYZ'));
echo '</pre>';

echo '<pre>';
print_r(cesear(2, strtolower('ABCDEFGHIJKLMNOPQRSTUVWXYZ')));
echo '</pre>';


// Vingere uniquement sur les lettres majuscules

function char_vigen_encode($a, $b)
{
	return char_rot(ord($b) - 65, $a);
}

function char_vigen_decode($a, $b)
{

	$num = 26 - (ord($b) - 65) ; // reculer

	return char_rot($num, $a);
}

echo '<pre>';
print_r(char_vigen_encode('T', 'E'));
echo '</pre>';

echo '<pre>';
print_r(char_vigen_decode('X', 'E'));
echo '</pre>';

function vigen_decode(string $str, string $key)
{
	$len = strlen($str);
	$lenKey = strlen($key);

	$code = '';
	$j = 0 ;
	for ($i=0; $i < $len ; $i++) { 

		if($str[$i] == ' ') {
			$code .= ' '; continue;
		}

		$code .= char_vigen_decode($str[$i], $key[$j % $lenKey]);

		$j++;
	}

	return $code;
}

function vigen_encode(string $str, string $key)
{
	$len = strlen($str);
	$lenKey = strlen($key);

	$code = '';
	$j = 0 ;
	for ($i=0; $i < $len ; $i++) { 

		if($str[$i] == ' ') {
			$code .= ' '; continue;
		}

		$code .= char_vigen_encode($str[$i], $key[$j % $lenKey]);

		$j++;
	}

	return $code;
}

echo '<pre>';
print_r(vigen_encode("HELLO WORLD", "SECRETKEY"));
echo '</pre>';

echo '<pre>';
print_r(vigen_decode("ZINCS PYVJV", "SECRETKEY"));
echo '</pre>';

echo '<pre>';
print_r(vigen_decode("WWRVVHXW OMI EVX XHIPUMEV RX DSKTI RRW TE XN FSVV", "SECRETKEY"));
echo '</pre>';


