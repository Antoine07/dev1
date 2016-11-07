# Objet Initiation
Attention, lorsque vous créez une classe vous devez vous rappeler un principe fondamental qu'il faudra toujours appliquer: une classe un rôle bien délimité et unique.

# 1/ Exercice
Implémentez une classe Point, elle permet simplement de définir un point du plan, c'est donc un vecteur à deux coordonnées.
Cette classe possèdera un constructeur et des setter et getter pour définir ses coordonées.

# 2/ Exercice
Implémentez une classe Distance elle permettra de calculer la distance entre deux points. Vous passerez à cette classe deux objets de type Point

# 3/ Exercice
Implémentez une classe Circle, difinissez un constructeur qui prendra un rayon et un point.

# 4/Exercice
Soit la classe Distance, elle prendra deux points (objet de type Point) et calculera la distance entre ces deux points.

```php

// distance entre deux points A(xa,ya) et B(xb,yb)

sqrt( pow($xb-$xa,2) +  pow($yb-$ya,2) );

```
# Exercice (algo)
Dans un dossier Matrix créez la classe Matrix et implémentez dans cette classe la méthode product qui fait le produit de deux matrices de même dimension, vous utiliserez un array en PHP. Voyez la remarque qui suit:

```
$matrixA = 
	[
		[a00,a01],
		[a10,a11],
	];

$matrixB = 
	[
		[b00,b01],
		[b10,b11],
	];

$matrixA*$matrixB = [

	[a00*b00 + a01*b10 , a00*b01 + a01*b11],
	[a10*b00 + a11*b10 , a10*b01 + a11*b11],

];

```

# TP Model
Nous allons découvrir la notion de modèle en Objet. Celle-ci traite des données, c'est une couche d'abstraction sur les données, en clair une classe ou des classes qui vont faciliter la manipulation des données dans les scripts.
Créez le dossier Monster, puis dans celui-ci on va mettre les classes suivantes: Kermit, Model et DB, respectivement une classe Model, la classe Model factorisant des méthodes pratiques et une classe pour se connecter à DB.
Faites un fichier test.php à la racine de ce projet pour faire les tests.

## 1/ Exercice 
Créez un fichier install.sql à la racine du projet pour définir le SQL qui permettra de créer les tables du projet.
Vous devez créer la table kermits avec les champs id (PK), score_id (FK NULL) et name et la table scores avec les champs id(PK) et rate (INT).
Faites quelques insertions dans ces tables pour donner des valeurs aux grenouilles ainsi, que des scores leurs correspondant.


## 2/ Exercice
Créez la classe DB, elle permettra de se connecter à la base de données.
