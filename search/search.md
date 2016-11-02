# Challenges

- remarques
L'objectif est de vous faire découvrir la notion de fichier et donc de flux. Ici les fichiers utilise des patterns que l'on doit par la suite utiliser pour dessiner des formes.
Attention dans un fichier si vous comptez le nombre de caractères par ligne vous avez un caractère spéciale \n qui correspond au retour à la ligne, celui-ci ne se trouve pas en fin de fichier sur la dernière ligne... Donc dans vos algorithmes il faudra le prendre en compte.

```php
$file = fopen('./data.txt', 'r+'); // ouvre un pointeur de fichier sur la première ligne
$line = fgets($file); // lit la première ligne
```

## Génération d'un damier
Contrainte: vous devez lire un fichier data.txt, ligne par ligne, celui-ci déterminera les dimensions du damier et les position des cases. Par exemple vous pouvez faire *#*# pour votre pattern dans le fichier data.txt.

Par exemple ci-dessous vous représenterez un damier de 10 par 10 soit 100 cases:

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

Voici le code pour dessiner en SVG un carré de largeur 150px et placer à la position 25px en x et 25px en y.

```html
<svg width="900" height="900">
	<rect x="25px" y="25px" width="150" height="150"/>
</svg>
```

## Pavage de cercle
Le but de l'application est de générer un pavage de cercle dans un carré de taille fixe, en utilisant du svg (voyez le code qu'il faudra utiliser pour générer les cercles plus bas).
Construisez une petite application avec la structure MVC que nous avons mis en place. Mettez les CSS du bootstrap, pour faire cela faites un dossier assets tout simplement que vous liez aux master.php. La page se structure sur deux colonnes, une colonne permettant de donner une valeur nombre de cercles à générer, ceci se fera dans un formulaire. L'affichage des cercles se fera dans la colonne de droite.
Vous donnez le nombre de cercle par ligne, celui-ci se multipliera par lui-même pour faire un pavage carré, par exemple 4 vous donnera un pavage de 4*4=16
Vos URLS doivent être de la forme suivante, le paramètre nb détermine le nombre de cercle par ligne (largeur de votre carré).
http://localhost/dev1/search/circle?nb=10

Ecrivez l'algorithmie de la génération des cercles dans une action de vos contrôleurs. Vous pouvez faire un dossier library avec un fichier utils.php si vous le souhaitez, pour séparer les rôles de vos différents scripts.

Utilisez le svg suivant pour générer vos cercle, par exemple ici on génère 4 cercles.

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
Dans ce projet vous devez dessinger une pyramide de base de nombre impair, par exemple 11, 9, ..., dans un fichier data.txt; puis dans un deuxième temps vous devez parcourir ligne par ligne ce fichier pour dessiner cette pyramide dans la page Web en SVG.

Dans le fichier vous devez obtenir ceci pour une pyramide de base 10 carrés:

```
// contenu du fichier data.txt
#####*#####
####***####
###*****###
##*******##
#*********#
***********
```
Vous utiliserez le code suivant pour dessiner en svg dans la page elle-même.

```html
<div id="wrap">
	<svg width="900" height="900">
		<rect x="90" y="540" width="90" height="90" fill="#000"></rect>
	</svg>
</div>
```

Faites également votre partie algorithmie dans un fichier à part utils.php

## Suite de syracuse
Une suite de valeur, en fonction des entiers, est définie par une relation mathématiques du type U(n), où n est une entier, voici la définition de la suite de syracuse: si $n est pair alors on calcule U($n) = $n/2 et sinon (impair) on calcule U($n) =  3*$n + 1. 

Ecrivez une fonction syracuse($n) permettant de sortir tous les résultats de $n, $n-1, ... 1 sous forme d'un tableau de nombres.
Engregistrez ce résultat dans un fichier pour une valeur de $n donné. Que remarquez-vous ? 
Terminez cette exercice en affichant les valeurs de votre fonction dans des div dans une page Web. Vous pouvez proposer un affichage original pour les nombres de cette suite (coleur, position des nombres dans la page).


