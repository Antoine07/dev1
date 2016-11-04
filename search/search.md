# Challenges

- remarques
L'objectif est de vous faire découvrir la notion de fichier et donc de flux. Et également de vous faire faire de l'algorithmie. Ici les fichiers utilisent des patterns que l'on doit par la suite utiliser pour dessiner des formes.
Attention, dans un fichier si vous comptez le nombre de caractères par ligne, n'oubliez pas le caractère de fin de ligne \n, qui correspond au retour à la ligne, celui-ci ne se trouve pas en fin de fichier, donc sur la dernière ligne... Donc dans vos algorithmes il faudra prendre en compte se fait.

Voici ci-dessous les fonctions, permmettant de gérer le flux, que vous pouvez utiliser dans les scripts.
```php
$handle = fopen('./data.txt', 'r+'); // ouvre un pointeur de fichier sur la première ligne
$line = fgets($handle); // lit la première ligne
fclose($handle); // ferme le fichier
```

Par ailleurs, organiser vos scripts de manière à pouvoir séparer la partie algorithmique de la partie vue. On ne vous demande pas d'aller jusqu'à construire une application MVC, mais de séparer les scripts du HTML le plus possible. Par exemple un fichier utils.php ou library.php serait bien pour la partie PHP.

## Génération d'un damier
Contrainte: vous devez lire un fichier data.txt, ligne par ligne, celui-ci déterminera les dimensions du damier et les position des cases. 

Utilisez un paramètre dans l'URL pour fixer la taille de votre pavage.
http://localhost/dev1/search/damier.php?nb=10

Exemple de damier de 10x10

```txt
*#*#*#*#*#
#*#*#*#*#*
*#*#*#*#*#
#*#*#*#*#*
*#*#*#*#*#
#*#*#*#*#*
*#*#*#*#*#
#*#*#*#*#*
*#*#*#*#*#
#*#*#*#*#*
*#*#*#*#*#
```

Voici le code pour dessiner en SVG, dans la page web, un carré de largeur 150px et placer de coordonnées 25px 25px (x,y)

```html
<svg width="900" height="900">
	<rect x="25px" y="25px" width="150" height="150"/>
</svg>
```

## Pavage de cercle
Le but du script, ici, est de générer un pavage de cercle dans un carré de taille fixe, en utilisant du svg (voyez le code qu'il faudra utiliser pour générer les cercles plus bas).

Vous donnez le nombre de cercle par ligne, celui-ci se multipliera par lui-même pour faire un pavage carré, par exemple 4 vous donnera un pavage de 4*4=16

Utilisez un formulaire pour fixer la taille la dimension de votre pavage.

Exemple de génération de cercle en SVG:

```html
<div id="wrap">
	<svg width="900" height="900">
		<circle cx="225" cy="225" r="225"  fill="#86d8ef" />
		<circle cx="675" cy="225" r="225"  fill="#86d8ef" />
		<circle cx="225" cy="675" r="225"  fill="#86d8ef" />
		<circle cx="675" cy="675" r="225"  fill="#86d8ef" />
	</svg>
</div>
```

wireframe

```
/********************************************\
				*  
Nb de cercle: 2	*     * * *      * * * 
				*    *     *    *     *
input:         	*    *     *    *     *
               	*     * * *      * * * 
Ok	 			*
				*
				*
				*
				*
/*********************************************\

```

## Dessiner une pyramide (***)
Dans ce projet vous devez dessiner dans la page Web (SVG) une pyramide de base (nombre de carrés) de nombre impair, par exemple 11, 9, ... Utilisez un fichier data.txt pour construire le pattern qui sera par la suite lu pour construire le pavage.

Exemple de fichier data.txt

```
#####*#####
####***####
###*****###
##*******##
#*********#
***********
```
Exemple pour dessiner un carré en SVG dans la page Web:

```html
<div id="wrap">
	<svg width="900" height="900">
		<rect x="90" y="540" width="90" height="90" fill="#000"></rect>
	</svg>
</div>
```

## Suite de syracuse
Une suite de valeurs numériques, en fonction des entiers, est définie par une relation mathématique du type U(n), où n est une entier. Voici la définition de la suite de syracuse: si $n est pair alors, la suite vaut U($n) = $n/2 et sinon ($n impair) la suite vaut U($n) =  3*$n + 1. 

Ecrivez une fonction syracuse($n) permettant de sortir tous les résultats de $n, $n-1, ... 1 sous forme d'un tableau de nombres.

Engregistrez ce résultat dans un fichier pour une valeur de $n donné. Que remarquez-vous ? 

Imaginez maintenant une représentation de cette suite en SVG dans une page Web.


## Cryptage affine
Ce cryptage se fera uniquement sur les lettres majuscules.
Un cryptage affine se définie comme suit: 
soit la fonction de cryptage c($n) avec $n le code d'une lettre de l'alphabet, alors c($n) = ($a*$n + $b) % 26 ; avec a, b des entiers. Pour que le cryptage soit bon, il faut que deux lettres différentes ne possèdent pas le même crypte.
En clair, il faut que les valeurs différentes prisent par la fonction c($n) soient au nombre de 26.

Remarque, pour des raisons purement mathématique, un bon cryptage affine marche si $a>1 (car sinon vous retombez sur le cryptage de César) et lorsque $a est premier avec 26. Rappelons que deux entiers sont premiers entre eux si ils n'ont pas de diviseur commun, autre de 1 bien sûr. Par exemple 7 et 26 sont tous les deux premiers entre eux. Le paramètre $b peut quand à lui être quelconque, la justification est mathématique et non démontré ici.

Ecrivez un test qui détermine si le cryptage, donc le choix de $a et $b, que vous voulez faire rempli la condition précédente:

```php

testCrypAff($a, $b) ; // retourne true ou false, si true votre couple $a et $b est valide.

```
Une fois que vous avez trouver les paramètres $a et $b, écrivez une fonction qui crypte un caractère, puis écrivez une fonction qui crypte un message, écrit en majuscule.

Terminez en cryptant un petit texte écrit en majuscule, que vous enregistrerez dans un fichier txt.

Facultatif (décryptage)

Pour décrypter le message il faut considérer la relation mathématique suivante:

```php

$nc = ($a*$n + $b) % 26; 

// qui peut également s'écrire 

$nc -$b = $a*$n % 26 ;

// Il faut alors trouver l'inverse de $a % 26, c'est-à-dire un entier $d telque $d*$a % 26 = 1, 
// supposons que vous ayez trouvé ce $d alors:

$d($nc-$b) = $d*$a*$n % 26;
$d($nc-$b) = 1*$n % 26;
$d($nc-$b) = $n % 26; // le décryptage est réalisé
```

écrivez donc une fonction de cryptage decryp($nc); qui utilise cette dernière remarque et décrypte une lettre. Puis écrivez une fonction decode($message); qui redonne le message en clair.

Bon courage à tous et n'hésitez pas à me poser des questions sur ces projets.