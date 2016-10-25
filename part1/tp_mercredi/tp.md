# Application

Terminez la "factorisation" du fichier model.php dans le layout3 de l'exercice vu en cours.

# Algorithmie

* 1/ Exercice
Ecrire une fonction qui transforme un entier décimal en nombre binaire. On rappelle qu'un nombre binaire s'obtient en faisant la succession des divisions par 2 et en gardant le reste modulo 2. Voyez l'exemple qui suit, vous pourrez vérifier votre algorithmie en utilisant la fonction PHP decbin($num_deci) qui retourne le nombre décimal en binaire. Votre fonction retournera une chaîne de caractères.

```php

$n = 97 ;

$reste = 97 % 2 ; // 1

$q = (int) (97/2) ; // 48

$reste = $q % 2 ; // 0

$q = (int) ($q/2) ;

...

```

* 2/ Exercice 
Ecrire l'inverse de la fonction précédente, vous lui passerez un nombre binaire et elle devra retourner un nombre décimal. Pensez que chaque position dans l'écriture du nombre binaire est une puissance de 2, voyez l'exemple qui suit, vous pourrez vérifier votre fonction à l'aide de la fonction PHP bindec()

```php

101 = 1*pow(2,2) + 0*pow(2,1) + 1*pow(2,0) = 4 + 0 + 1 = 5

// vérifier
bindec(101);

```

* 3/ Exercice (collision jeu)
Soit un rectangle de coordonnées (x,y) pour sa coordonnées en haut à gauche et soit w sa largeur et h sa hauteur, deux grandeurs positives; écrire une fonction qui détermine si un projectile de coordonnées (xp,yp) se trouve dans ce rectangle et touche celui-ci. Cette fonction retournera true ou false respectivement touché et non touché.
Pensez que le repère dans canvas, par exemple, est inversé les x sont à l'horizon et partent vers la droite et les y descendent. Faites un dessin...Et écrivez votre fonction en PHP.