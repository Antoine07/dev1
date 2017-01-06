# Concevoir un blog
A partir du petit framework que nous avons conçu et de la base de données db_blog.sql, vous devez développer un blog.

- remarques techniques générales
Pour les liens vous les écrirez en prenant soin de mettre "/" avant vos chemins pour le serveur PHP.
Ainsi vous indiquez que vous partez du dossier dans lequel vous êtes, n'oubliez pas que pour notre application, le point d'entrée c'est l'index.php. Vous aurez ainsi des URLs comme suit:
/index.php/single?id=2 
/index.php/category?id=2
...
Vous placerez vos assets dans le dossier web.
Choissez un framework HTML/CSS de votre choix, faites un site sur deux colonnes responsives.
Chaque vue sera faites à l'aide d'une petite vue composite et sera afficher à l'aide d'un contrôleur spécifique, ainsi vous aurez un single_action($id); category_action($id);...
Pour les données vous les récupèrerez à l'adresse suivant puis les installerez sur votre serveur de base de données local à l'aide de phpmyadmin:
DB [app.hicode.ovh](http://app.hicode.ovh/db_blog.zip)

* 1 /Exercice (page d'accueil)
Wireframe [app.hicode.ovh](http://app.hicode.ovh/)

- Caractéristique de la page d'accueil
Un menu principal affichant dynamiquement les noms des catégories sera mis en place.
Elle affiche tous les articles (sans pagination) avec une image à la une, un extrait, le nom de l'auteur et le nombre de commentaires.
Dans l'extrait vous placerez un "lire la suite" cliquable vers l'affichage de l'article.
La colonne de droite liste les auteurs du site, non cliquable.

* 2 /Exercice (page catégorie)
Cette page liste les articles se trouvant associés à la catégorie. Elle reprend le master.php général du site.
Wirframe [app.hicode.ovh](http://app.hicode.ovh/index.php/category?id=1) 

* 3 /Exercice (page article) 
Cette page affiche un article en particulier, avec son contenu texte entier et son titre.
Wirframe [app.hicode.ovh](http://app.hicode.ovh/index.php/single?id=3) 
Facultatif: vous pouvez si vous le souhaitez ajouter les commentaires sous l'article lui-même.

* 4 /Exercice (page de contact)
Cette page affiche la page de contact, vous utiliserez Swiftmailer et passerez les paramètres à Swiftmailer dans le fichier .env
Attention, vous devez gérez des redirections.
Wirframe [app.hicode.ovh](http://app.hicode.ovh/index.php/about) 
Facultatif: en utilisant les variables de session gérer l'affichage des messages d'erreurs et de succès du formulaire. Pour la redirection, une fois le message envoyé rediriger l'internaute sur la page d'accueil.