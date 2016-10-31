# Challenges

- remarques
Attention dans un fichier si vous comptez le nombre de caractères par ligne vous avez un caractère spéciale \n qui correspond au retour à la ligne, celui-ci ne se trouve pas en fin de ligne. Donc dans vos algorithmes il faudra le prendre en compte.

## Génération d'un damier
Contrainte: vous devez lire un fichier data.txt, ligne par ligne, celui-ci déterminera les dimensions du damier et les position des cases. Par exemple vous pouvez faire *#*# pour votre pattern dans le fichier data.txt.

```php
$file = fopen('./data.txt', 'r+'); // ouvre un pointeur de fichier sur la première ligne
$line = fgets($file); // lit la première ligne
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

## Dessiner une pyramide
En partant d'un fichier type pattern ou d'un algorithme seul construiser une pyramide de carrés centrés dans la page.