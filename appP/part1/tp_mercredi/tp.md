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

# Facultatif

* 4/ Exercices (bit de parité, encodage décodage)
En informatique, l'ordinateur manipule des bits (01), nous allons ici découvrir le bit de parité, il permet dans une certaine mesure de vérifier si un message transmit n'est pas altéré.
Précision sur le bit de parité. Il sert à déterminer si il y a eu une erreur lors de la transmission d'un message, avec la probabilité de faire au plus une erreur bien sûr. En effet, à la reception si la somme des bits n'est pas pair alors il y a eu forcément une erreur, dans le cas contraire le message est bon. Par ailleurs, précisons ici que l'on ne cherche pas à corriger les erreurs, c'est  une autre problématique.
Ecrire une fonction qui code des nombres sur 8bits, 7bits pour le nombre lui-même et un bit pour le bit de parité, qui sera égale à 1 si le nombre sur 7bits est impair (nombre de bit impair) et 0 si le nombre est pair (nombre de bits pairs).
Notez que vous ne pourrez encoder que les nombres de 0000000 à 1111111. Le bit de parité n'étant pas significatif ici dans l'encodage du nombre lui-même.
Ecrivez, maintenant une fonction qui vérifie si le binaire reçu est altéré ou non puis décoder celui-ci, transformer sa valeur en caractères, par exemple.
Terminez maintenant, avec une fonction qui transforme une chaîne de caractères en binaire (7bits+1bit parité) en introduisant le bit de parité dans le message et une dernière fonction qui décode le message reçu, si celui-ci n'est pas altéré.

Bon courage à tous et n'hésitez pas à me faire des commentaires, ou à me poser des questions.
