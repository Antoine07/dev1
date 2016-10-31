# Semaine 1

## Algorithmie

### Structure de vos exercices

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

Le code suivant permet de calculer la date de la semaine prochaine

```php
$nextweek = 7 * 24 * 60 *60 ;
date('Y-m-d', $nextweek);
```

* 8/ Exercice (exercice recherche) 
Soit un jeu de carte déjà ordonné, par exemple $cartes = [11,9,5,3] et soit maintenant la carte 7.
Ecrire une fonction PHP qui permet d'insérer la carte 7 dans le jeu de carte. Pensez que cette liste est déjà ordonnée.

** 8.1/ Exercice (exercice recherche) 
Comment trier une liste complète de carte dans le désordre ?
** 8.2/ Exercice (exercice recherche) 
Comment gérer de manière dynamique l'ordre de la liste que l'on souhaite ranger ?

* 9/ Exercice (exercice recherche) 
Soit une liste de questions dans un jeu donné, écrire une fonction qui permet de scinder cette liste en deux sous-listes de questions, par rapport à une valeur donnée.

* 10/ (exercice recherche) 
Ecrire maintenant une fonction qui permet de chercher rapidement un score dans une liste ordonnée de scores en procédant par dichotomie (en divisant par deux la recherche à chaque pas par rapport au score recherché).

* 11.1/ Exercice
écrire une fonction qui permet de trouver un élément dans une liste quelconque. Vous appelerez cette fonction is_in_array elle prendra deux paramètres la valeur à rechercher et le tableau de recherche.

```php

$list = [1, 7, 45, 2, 100, 548, 21, 18, 180];


```

* 11.2 / Exercice
Ecrire une fonction qui trouve le nombre le plus grand dans une liste non ordonnée. Pensez à initialiser l'élément que vous chercher à zéro par exemple.

* 11.3 / Exercice (médiane d'une série de score)
Ecrire une fonction qui permet de trouver la médiane d'une liste de socres, pensez à ordonner cette liste par exemple avec sort de PHP, par exemple avec la fonction sort de PHP.
Rappelons que la médiane est définie comme suit: si la liste comporte un nombre paire de valeurs alors, si $len est la longueur de la série, on a $p = $len/2 et la médiane est le centre des valeurs $p et $p+1 (indices).
Sinon si $len est impaire la médiane de la série de scores est donnée par l'indice ($len + 1)/ 2

* 11.4/ Exercice
Soit un tableau de questions, écrire une fonction qui retourne le nombre de questions supérieur ou égale à une longueur de chaîne de caractères donnée.


* 12.1/ Exercice
Créez la fonction char_rotn($n, $string) elle décallera une lettre majuscule ou minuscule d'une valeur $n donné.

* 12.2/ Exercice
Créez maintenant une fonction cesear($n, $string) qui encode une chaîne de caractères en la décallant de $n position.

* 12.3/ Exercice
Voyez le cryptogramme de Vigenère, et implémentez une fonction vigen_encode($c,$cKey) par exemple dans ce crypte on aurait:

```php
 vigen_encode('T','E') ; // afficherait 'X'

 ```

 * 14/ Exercice 
 Ecrire la fonction inverse qui cette fois-ci décode, par rapport au même cryptogramme:
```php
 vigen_decode('X','E') ; // afficherait 'X'

 ```
* 15/ Exercice
Soit un cercle de rayon r écrire une fonction is_in_circle($coord, $pro) qui détermine si un projectile $proj de coordonnées (x,y) impacte le cercle.


## II Conception d'application
* Exercice 1 (layout conception layout1)
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

single.php?id=1,2, ... Préférez les chemins absolus pour la gestion de vos URLs.

Créez une base de données et une table posts, nous allons insérer en base de données quelques données.

```php
$link = new PDO("mysql:host=localhost;dbname=db_blog", 'root', '');
$result = $link->query('SELECT id, title, content FROM posts');
$posts = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	$posts[] = $row;
}
$link = null; // fermer la connexion
```

* Exercice 2 (isolation de la présentation des données layout2)
Créez maintenant le dossier layout2 et recopier les fichiers existant du dossier layout1 dans layout2

Faites un dossier views dans lequel vous allez placer les pages list.php et item.php, respectivement pour les posts et pour un post seul. Nous isolons les vues du reste du code PHP.

Par exemple la page index.php va ressembler maintenant à:

```php
define('URL_SITE', 'http://localhost:8000'); // variable globale pour gérer l'URL du site dans les vues
$link = new PDO("mysql:host=localhost;dbname=db_blog", 'root', '');

$result = $link->query('SELECT id, title, content FROM posts');
$posts = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	$posts[] = $row;
}

$link = null; // fermer la connexion
include './views/list.php' ;

```

Terminez l'exercice en affichant la page d'accueil et la page dun article.

* Exercice 3 (isolation de la partie model layout3)

Nous allons créez un fichier model.php pour isoler la partie modèle de l'application. Créez deux fonctions l'une pour afficher tous les posts et l'autre pour afficher un post en fonction de son id. Vous placerez ces fonctions dans le fichier model.php

```php

get_pdo(){ ... return $pdo; }

get_all_posts(){ ... }

get_find_post($id) { ... }

```

* Exercice 4 (isolation des vues gestion du layout layout4)
Nous allons utiliser la mémoire tampon de PHP afin de créer un layout et isoler également cette partie.

La fonction ob_start() de PHP permet de mettre en mémoire tampon (dans un buffer de sortie) du code qui normalement devrait partir à l'affichage. La fonction ob_get_clean() pour sa part permet de vider cette mémoire tampon et de récupérer son contenu.

Ci-dessous, la partie encapsuler dans ob_start() ne part pas à l'affichage, du coup on peut l'utiliser facilement pour injecter nos données. Compte tenu de ce qui suit mettez le code dans les fichiers list.php et item.php

```php
<?php ob_start() ; ?>
<div class="row">
	<div class="col-sm-12">
		<article>
			<h1><?php echo $post['title'] ?></h1>
			<p><?php echo $post['content'] ?></p>
		</article>
	</div>
</div>
<?php $content = ob_get_clean() ; ?>
<?php include 'master.php' ?>

// dans le fichier master.php il suffira de faire un echo $content

<html>
	<head></head>
	<body>
		<?php echo $content;  ?>
	</body>
</html>

```

* Exercice 5 (isolation des actions: les controllers)
Une autre amélioration que l'on peut apporter à notre application c'est l'isolation des actions de notre application.
Cela semble être un peu de sucre dans le code mais en fait cela permet de mieux séparer les choses, faites un fichier controller.php dans lequel on va créer deux actions:

** une pour l'affichage de posts en page d'accueil home_action() et une autre show_action($id)


```php

function home_action()
{
	$posts =  get_all_posts();

	include './views/list.php' ;
}

```

* Exercice 6 (FrontController: routage layout5)
L'idée maintenant c'est d'avoir un unique point d'entrée pour notre application et de router la demande de notre client sur la bonne action, c'est-à-dire la bonne page !

En fait rien de compliquer il suffit dans notre fichier index.php d'analyser la routes et d'exécuter la bonne action, voici de que l'on va placer dans le fichier index.php pour terminer le TP !

```php
define('URL_SITE', 'http://localhost:8000'); // variable globale

require 'model.php';
require 'controller.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($location === $uri) {
	home_action();
} elseif ($location.'index.php/single' === $uri && isset($_GET['id'])) {
	show_action($_GET['id']);
} else {
	header('HTTP/1.1 404 Not Found');
	echo '<html><body><h1>Page Not Found</h1></body></html>';
}

```
# Semaine 2

* Exercice 1 (Projet)
Le dernier layout...Nous allons préparer la réalisation d'un mini blog que vous devrez terminer. Pour l'organisation nous allons faire encore quelques modifications.
Vous allez appeler votre mini framework myApp, mettez en place votre premier micro framework et testez le comme d'habitude en laçant votre serveur PHP dans le dossier web
```
myApp\
    views
    web/
        index.php // point d'entrée de l'application, FrontController
    .env // petit fichier qui nous permettra de fixer les paramètres de l'application
    .gitignore // ne versionner pas /vendor et .env
    app.php  // bootstrap de l'application 
    composer.json // nous allons utiliser quelques dépendances PHP, à préciser dans ce fichier 
    controller.php  
    model.php
    
```

* Exercice 2 (Projet)
Installation de Composer. Composer est un outils permettant de gérer les dépendances (compoment) de vos applications PHP, comme avec npm en JS.
Composer fonctionne avec Packgist le dépôt officiel des composants PHP. 
Le code source des dépôts sont visibles sur Github ou Bitbucket en général.

Sous Windows allez sur le site Composer et télécharger l'exécutable, il n'y a rien à faire, il suffit de lancer l'installer.

Sous Mac, vous devez télécharger composer.phar et l'installer dans votre /usr/bin/local, renommez se programme en composer, plus pratique à utiliser.

Testez votre outils:
```bash
composer -v
```
Voici ce que nous allons faire: 

```bash

// Dans votre app (à la racine) lancez l'initialisation de notre composer.json fichier de config et répondez aux questions, ne pas installer des dépendances pour l'instant.
composer init

// Nous allons installer le gestionnaire de variables d'environnement pour notre app suivant:
composer search vlucas/phpdotenv

//Une installation effective de ce composant se fera avec la commande suivante
composer require vlucas/phpdotenv

```

* Exercice 3 (Projet)
Mettez en place un autoloader pour vos différents fichiers à l'aide de composer. Ce dernier possède un autoload de fichier.
Ajoutez dans le fichier composer.json le code suivant, puis dans le bootstrap incluez l'autoloader de Composer. Cela permettra d'inclure automatiquement les fichiers dans votre projet.

```
{
...
"autoload": {
		"files": [ "model.php", "controller.php"]
	}
}
// puis dans votre bootstrap.php amorçage de l'app 
require_once __DIR__.'/vendor/autoload.php';

```
Incluez alors le bootstrap.php dans votre FrontController (index.php) dans le dossier web

```
require_once __DIR__.'/../app.php';

```
Terminez par une commande pour demander à Composer de calculer l'ensemble des chemins de nos fichiers.

```
composer dumpautoload
```
Et enfin, testez votre app...


* Exercice 3 (Projet)
Installer le composant vlucas/phpdotenv, il va nous permettre de gérer les variables d'environnement de notre application. Créez maintenant le fichier .env à la racine de votre application et écrivez toutes les variables nécessaires utiles pour votre application.

```
DB_NAME=db_blog
DB_HOST=localhost
...

// pour utiliser ces variables dans votre il faudra faire deux choses les chargés de manière globale et les appelées dans le code source.

getEnv('DB_NAME'); // affichera le nom de votre base de données

```
Dans le fichier app.php charger vos variables d'environement pour l'app comme suit, fichier app.php (bootstrap de l'application)

```
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
```

Terminez l'exercice en appelant ces variables dans le fichier model.php pour rendre votre fonction getPDO() plus portable, par exemple. Utilisez la fonction getEnv('DB_NAME'), getEnv('DB_USER') ...

* Exercice 4 (Projet) DB data
Nous allons installer une base de données avec des tables et des contenus, récupérez le zip du projet () et installez la base de données db_blog, elle comporte les tables posts, categories, comments et authors. Cette base de données est relationnelle, elle a donc des clés primaires et secondaires.

* Exercice 5 (Projet) Menu principal
Remarque le site est responsive sur deux colonnes, utiliser un framework HTML pour ce point. Vous mettrez en place une colonne à gauche centrale pour les contenus et une colonne latérale à droite (listes des auteurs du site).
** Concevez le menu principal. 
Nous allons travailler dans le master.php et faire un foreach pour afficher les catégories du site. Celle-ci seront cliquables et afficherons les articles se trouvant associés à cette catégorie (action category_action($id), à faire dans un second temps). Vous ajouterez un lien pour la page d'Accueil et un lien contactez-nous dans ce menu, voir le wireframe plus bas.
Remarques: la seule possiblité que nous ayons pour l'instant pour réaliser cela simplement avec notre petite application, c'est de créer une fonction get_all_categories() dans nos modèles et d'appeler celle-ci dans notre contrôleur home_action() pour injecter les données de la table categories dans nos vues.

```php
function home_action()
{
	$posts =  get_all_posts();
	$categories = get_all_categories();

	include 'home.php'; // renommez votre vue list.php en home.php plus sémantique...
}
```
Terminez l'exercice et afficher les catégories du site dans le menu principal. Voyez un exemple de ce que l'on vous demande en ligne, n'affichez pas les informations métas de vos articles pour l'instant (metas: nom de l'auteur et nombre de commentaires), arrangez-vous cependant pour afficher un extrait en page d'accueil avec un lien lire la suite:

wireframe [http://app.hicode.ovh] page d'accueil du blog

* Exercice 6 (Projet)
Sur la page d'accueil, pour finaliser l'affichage des articles, affichez maintenant les métas informations de vos articles.
Vous ferez une jointure pour récupérer le nom de l'auteur de l'article pour l'afficher directement dans la boucle principale affichant l'ensemble des articles.
Pour les commentaires, créez une fonction get_comments_by_post($post['id']), permettant de récupérer les commentaires de votre blog associés à votre article.
Affichez également la liste des auteurs dans la sidebar.

* Exercice 7 (Projet)
Affichez les articles d'une catégorie, créez l'action category_action($id) et la vue category.php
Voyez la page suivante pour modèle: [http://app.hicode.ovh/index.php/category?id=1]
Finalisez et gérer maintenant l'affichage d'un article avec le titre le contenu de son article le nom de l'auteur et ses commentaires.

* Exercice 8.1 (Projet) ***
Page contact. Sans envoi d'email pour l'instant, nous le ferons par la suite. Nous allons voir comment gérer une page contact avec un formulaire. créez l'action about_action() elle affichera un formulaire avec un champ pour l'adresse email et un champ pour laisser un message, ces deux champs sont obligatoires.
L'action dans le formulaire aura la même route et vous allez analyser dans la même action le demande du client soit c'est du GET et dans ce cas vous affichez le formulaire, soit c'est du POST et vous traiterez les données du form et en fonction de celles-ci vous allez rediriger l'internaute sur le form lui-même si pb avec les données, soit en page d'accueil.
Voici ci-dessous le code PHP pour gérer les données POST et GET:

```php

function about_action()
{
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
	}	

	include 'about.php';
}

```

* Exercice 8.1 (Projet) ***
vérifiez les données, le formulaire sera à représenter si au moins un des deux champs est vide ou si l'adresse email n'est pas valide (vérification côté serveur). Faites une redirection si une erreur au moins se produit lors du traitement du formulaire par votre action about_action

```
filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); // fonction PHP permettant de vérifier la syntax d'un email
// la fonction suivante vérifie si une variable vaut '', null ou n'exsite pas 
empty($_POST['message']);

// ci-dessous une redirection en PHP, attention à bien mettre un exit() à la suite d'un header location, car sinon les scripts sous une redirection continurait à s'exécuter:
header('Location /index.php/about');
exit;

```

* Exercice 8.2 (Projet)
Gestion des messages d'erreurs. Nous allons utiliser les variables de session de PHP pour gérer les messages de succès ou d'échecs.
Affichez un message d'erreur sur la page de contact, si une erreur de saisie c'est produite. Vous pouvez par exemple vérifier que la variable $_SESSION['flash_message'] existe dans votre master.php

```php
<?php if(isset($_SESSION['flash_message'])): ?>
	...
<?php endif; ?>
```

* Exercice 8.3 (Projet)
Affichez les messages d'erreurs spécifiques aux champs erronés, lors de la soumission de votre formulaire contact. Vous pouvez par exemple créer une variable $_SESSION['old']['email'] et une variable $_SESSION['errors']['email'] pour respectivement remettre les données valides de votre formulaire dans le formulaire et afficher un message d'erreur sous un champ en particulier.


* Exercice 8.4 (Projet)
Finalisez maintenant les massages de succès en page d'accueil.

* Exercice 8.5 (Projet)
Nous allons terminez le formulaire en installant un composant pour la gestion de l'envoi d'email: Switfmailer. Faites cette installation à l'aide de composer:

```
composer search switfmailer 
composer require swiftmailer/swiftmailer

```
Créez les variables d'environement suivante pour plus de portabilité, dans votre fichier .env, pensez à relancer votre serveur de test pour que PHP les prennent en compte.

```
EMAIL_USERNAME=tony@tony.com
EMAIL_PASSWORD=
SMTP_PORT=465
SMTP_SERVER=ssl0.ovh.net
EMAIL_ENCRYPTON=ssl
```
Et enfin dans l'action about_action() utilisez Swiftmailer pour envoyer le message:

```php
// définition des paramètres de l'envoi du message
$transport = Swift_SmtpTransport::newInstance(getEnv('SMTP_SERVER'), getEnv('SMTP_PORT'), getEnv('EMAIL_ENCRYPTON'))
		->setUsername(getEnv('EMAIL_USERNAME'))
		->setPassword(getEnv('EMAIL_PASSWORD'));

		$mailer = Swift_Mailer::newInstance($transport);

		$message = Swift_Message::newInstance('Wonderful Subject')
		->setFrom(array($_POST['email'] => 'John Doe'))
		->setTo(array('tony@hicode.ovh','antoine.lucsko@wanadoo.fr', 'antoine.lucsko@gmail.com'))
		->setBody($_POST['message']);
		$mailer->send($message)
```
Finalisez l'envoi du message.

Vous avez terminer l'application.




