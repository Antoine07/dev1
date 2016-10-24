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