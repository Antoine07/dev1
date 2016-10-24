# Algorithmie

## Structure de vos exercices

Vous devez créer la structure suivante sur votre serveur xampp, vérifiez que vous avez bien la dernière version de PHP

```
htdocs/
	part1/
		exercices.php
```

* 1/ Exercice
soient $life = 0 et $force = 100
Ecrire une boulce affichant et incrémenantant la valeur $life tant que celle-ci est inférieure à $force

* 2/ Exercice 
Ecrire une autre boucle décrémentant la valeur de $force et affichant sa valeur si elle est impaire

* 3/ Exercice
Sachant qu'à chaque tour d'une boucle on prend une seconde en temps, et que toutes les 3 secondes la force augment de +5 combien vaut la force à la fin de la journée? Faites un programme PHP pour le calculer. 
indications: $force = 0 à l'initialisation du programme.

* 4/ Exercice
 Ecrire une fonction qui prend une chaines de caractères et retourne la chaine de caractères inversée. Vous nommerez cette fonction inverse_str.
 
 Vous testerez cette fonction sur la chaine de caractères suivantes:
 
```php
 inverse_str("Engage le jeu que je le gagne");
```
 
* 5/ Exercice
Ecrire une fonction qui génère un nombre aléatoire, elle prendra comme paramètre la longueur du nombre et l'intervalle des valeurs aléatoires.
gen_num_alea(5, 5); génèrera un nombre de longueur 5 comme par exemple 40213.
Indications: ci-dessous, comment créer un nombre d'une taille fixe de manière aléatoire. La fonction pow(10,2) affiche une puissance de 10, ici 100.

```php
100*mt_rand(1,5) + 10*mt_rand(1,5) + 1*mt_rand(1,5); 
pow(10,2); // affichera 100

```

* 6/ Exercice
Soit un jeu de carte particulier comportant 20 cartes questions, créez une fonction tirage_alea, elle prend en paramètre un tableau de cartes et un nombre indiquant le nombre de cartes à tirer.
indications: utilisez la fonction PHP array_rand.

```php
$cartes = ['c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'c8', 'c9', 'c10', 'c11', 'c12', 'c13', 'c14', 'c15','c16', 'c17', 'c18', 'c19', 'c20'];

```

* 7/ Exercice 
La fonction time() de PHP retourne le timestamp Unix actuel, retournez le nombre de jours, d'heures, de minutes et de secondes qui se sont écoulées depuis une date clé de l'informatique. Connaissez-vous cette date ?
A l'aide de la fonction date de php donnez sous forme du format suivant: 'Y-m-d' l'année le mois et le jour dans une semaine de la date d'aujourd'hui, vous devez passer en deuxième paramètre de la fonction date le nombre de secondes correspondant à cette date:

```php
date('Y-m-d', $nextweek);
```

* 8/ Exercice (algorithme de tri) 
Soit un jeu de carte déjà ordonné, par exemple $cartes = [11,9,5,3] et soit maintenant la carte 7.
Ecrire une fonction PHP qui permet d'insérer la carte 7 dans le jeu de carte. Pensez que cette liste est déjà ordonnée.

** 8.1/ Exercice 
Comment trier une liste complète de carte dans le désordre ?
** 8.2/ Exercice
Comment gérer de manière dynamique l'ordre de la liste que l'on souhaite ranger ?

* 9/ Exercice
Soit une liste de questions dans un jeu donné, écrire une fonction qui permet de scinder cette liste en deux sous-listes de questions, par rapport à une valeur donnée.

* 10/ (à rechercher)
Ecrire maintenant une fonction qui permet de chercher rapidement un score dans une liste ordonnée de scores en procédant par dichotomie (en divisant par deux la recherche à chaque pas par rapport au score recherché).

# Conception d'application
* Exercice 11 (layout conception)
Vous allez créer deux pages: une page index.php et une page single.php dans le dossier layout1 de votre htdocs

Organisation du tp

```php
htodcs\
	part1\
		layout1\
			index.php
			single.php
```

La page d'accueil affiche les derniers articles de votre blog, les titres des articles sont cliquables et affichent l'article en question. Utilisez la super globale $_GET['id'] dans vos urls pour la gestion de l'affichage des pages:

single.php?id=1,2, ... 

Vous partirez des articles suivants pour simplifier l'exercice pour l'instant:

```php
$posts = [1 =>'PHP7', 2 =>'JS', 3 =>'SQL', 4 =>'Angular', 5 =>'Laravel'];
```

Nous allons améliorer la conception de notre application.

* Exercice 12
Créez maintenant le dossier layout2 et recopier les fichiers existant du dossier layout1 dans layout2

Voici maintenant votre index.php, il sera votre point d'entrée de l'application
```php

$location = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // permet de récupérer la partie URI de l'URL

echo $location ; // affichera l'url

// routage de vos URI sur une page donnée
if($location == '/dev1/part1/layout2/')
{
	$posts = [1 =>'PHP7', 2 =>'JS', 3 =>'SQL', 4 =>'Angular', 5 =>'Laravel'];
	include 'home.php';

}

```
Compte tenu de ce qui précéde arrangez-vous pour afficher vos articles en page d'accueil et sur la page des articles. Pensez à gérer vos URL de la manière suivante:

```php
http://localhost/dev1/part1/layout2/index.php/single/?id=<?php echo $id; ?>
```

** Exercice 12.1

Mettez en place maintenant le code suivant pour vous redirigez vers la page d'accueil ou la page single pour afficher un article.

```php

$location = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

echo $location; // votre url

if($location == '/dev1/part1/layout2/')
{

	$posts = [1 =>'PHP7', 2 =>'JS', 3 =>'SQL', 4 =>'Angular', 5 =>'Laravel'];

	include './home.php' ;

}elseif($location == '/dev1/part1/layout2/index.php/single/' && isset($_GET['id'])){

	echo '<pre>';
	print_r($_GET['id']);
	echo '</pre>';

}

```

Maintenant que vous voyez comment récupérer l'id de vos articles, affichez la page single.php avec le bon titre d'article.

** Exercice 12.2

Créez un dossier layout3 et recopier nos fichiers, pour faire la suite.

Et maintenant nous allons introduire un point technique en PHP. Nous allons utiliser ce que l'on appelle une mémoire tampon pour mieux gérer nos vues. Nous allons créer un layout. Un modèle que l'on pourra utiliser pour toutes les pages du site. Et travailler avec des petites vues composites où nous allons injecter nos données.

la fonction ob_start() de PHP permet d'ouvrir une mémoire tampon dans laquelle nous pouvons mettre du code PHP avec des echo mais qui ne partirons à l'affichage que lorsque nous déciderons de vider cette mémoire tampon. La fonction ob_get_clean() permet de retourner le contenu de la mémoire tampon et également de vider celle-ci. Cette dernière fonction va donc nous permettre de récupérer ce qu'il y a dans la mémoire tampon et de mettre ce contenu dans une variable PHP, puis d'afficher son contenu.

Voyez plutôt un exemple, ceci permettra de mieux comprendre l'utilité d'une telle techinque:

```php
<?php ob_start() ; ?>
<ul>
	<?php foreach($posts as $id => $title): ?>
		<li><a href="index.php/single/?id=<?php echo $id; ?>"><?php echo $title ?></a></li>
	<?php endforeach; ?>
</ul>
<?php $content = ob_get_clean() ; ?>

<?php include 'master.php' ?>
```

Ainsi dans le master.php (code complet d'une page HTML) vous n'aurez qu'à faire un echo de la variable $content pour afficher ce contenu.

Mettez en place dans le layout3 cette technique pour l'affichage de nos pages.