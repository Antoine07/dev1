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

// Exercice 7 todo

// Exercice 8 (***)

// insertion liste croissante (ordonnée) uniquement
function insert($n, array $q)
{
	$len = count($q);
    // vous pouvez mettre le test pour l'insertion directement dans le for mais sa fixe l'ordre dans lequel vous faites l'insertion ici l'ordre doit être croissant
	for($i=$len; $i>0 && $n < $q[$i-1] ; $i--)
	{
        $q[$i] = $q[$i-1];// decallage vers la droite
    }

    $q[$i] = $n;

    return $q;

}

echo '<pre>';
print_r(insert(10, [1,2,4,7,9]));
echo '</pre>';

echo '<pre>';
print_r(insert(0, [1,2,4,7,9]));
echo '</pre>';

echo '<pre>';
print_r(insert(3, [1,2,4,7,9]));
echo '</pre>';

// tri par insertion (***) ordonne donc par ordre croissant la liste de nombre
function insert_sort(array $q) {
	$len = count($q);
	$list = [];
	for($i=0; $i < $len; $i++)
	{
		$list = insert($q[$i], $list); 
	}

	return $list;
}

echo '<pre>';
print_r(insert_sort([1,54,2,42,10,99,20,17,3,0,100]));
echo '</pre>';

echo '<pre>';
print_r(insert_sort([1,54,2]));
echo '</pre>';

// Exercice 11.1 
function is_in_array($elem, array $list)
{
	foreach($list as $e) 
	{
		if($elem == $e) return true;
	}

	return false;
}

// Exercice 11.2
function find_max_elem(array $list)
{
	$max = 0 ;
	foreach($list as $e) 
	{
		if($e > $max) $max = $e;
	}

	return  $max;
}

$list = [1,5,89,2,0,10,6];

echo '<pre>';
print_r(find_max_elem($list));
echo '</pre>';

// Exercice 11.3 
function mediane(array $list){

	sort($list); // ordonne la liste, croissante, par référence dans le scope de la fonction
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

// Exercice 11.4 
function nb_question_lg(array $questions, $max)
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

// Exercice 12 Cryptogramme Cesear (***)
function char_rot($n,$c)
{
	$code = ord($c);
	// on ne traite pas cette plage de code dans la table ASCII
	if($code < 64 || $code > 91) return;
	
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

function cesear($num, $message){
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


// Exercice 12 et 14 (***)

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
print_r(char_vigen_encode('T', 'E')); // X voir la table de vigenere 
echo '</pre>';

echo '<pre>';
print_r(char_vigen_decode('X', 'E')); // T voir table vigenere
echo '</pre>';

// Vigenere encode et decode
// Dans l'absolu on peut faire qu'une fonction pour traiter l'encodage et décodage mais c'est trop technique pour l'instant alors comprenez déjà l'algo de ces deux fonctions et se sera très bien.
function vigen_decode(string $str, string $key)
{
	$len = strlen($str);
	$lenKey = strlen($key); // $lenKey et $len peuvent être différent en longueur

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
	$lenKey = strlen($key); // $lenKey et $len peuvent être différent en longueur

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
print_r(vigen_encode("LES DEV A FORCE DE FAIRE DE L ALGO IL VONT DEVENIR SUPERS FORTS", "SECRETKEY"));
echo '</pre>';

echo '<pre>';
print_r(vigen_decode("DIU UIO K JMJGG UI YKMPW HG C EEQS GD ZQEX WOZCFMT JYIOVQ XSTKW", "SECRETKEY"));
echo '</pre>';