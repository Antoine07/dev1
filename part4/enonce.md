# CRUD
Nous allons terminer le CRUD à partir de notre MVC maison. Je vous rappelle que le CRUD est un acronyme qui signifie create, read update et delete. Nous allons la voir à partir de la resource posts de notre mini-blog.

# Exercice (mise en place de la page dashboard avec les urls)
Ajoutez un lien dashboard dans le menu principal, ce lien mènera sur la page d'administration de notre blog.

Créez un nouveau layout.php pour votre dashboard: master_admin.php, celui-ci ne comportera pas de colonne latérale mais aura une colonne unique pour son contenu.

Ajoutez, avec un ALTER TABLE, un nouveau champ à la table posts status, ce champ particulier ne prendra que les valeurs suivantes:
published, unpublished. Utilisez le type ENUM, ce type particulier dans MySQL est de type string, mais ne peut prendre que des valeurs que vous définissé, voir l'exemple qui suit:

status ENUM('published', 'unpublished') DEFAULT 'unpublished'

Notez votre SQL dans un fichier install.sql à la racine de votre projet.

Créez une action dashboard_action dans le frontcontroller, elle affichera dans un tableau la liste des posts de notre blog. Vous devez afficher le titre, la catégorie dans laquelle se trouve l'article si elle existe, non catégorisé sinon, le statut et un bouton de suppression de l'article.

Notez que au-dessus de ce tableau un bouton "Ajouter un article" doit figurer.

Chaque lien représenté dans le wireframe ci-dessous est materialisé par [ lien ].

Détails des liens: Ajouter un article conduira à la page pour ajouter un article (CREATE), les titres des articles sont cliquables et permettrons de mettre à jour les articles en base de données (UPDAE) et enfin un lien [supprimer], par ligne dans le tableau, permettra de supprimer un article. L'action READ n'est pas demandé, elle est en fait déjà fonctionnelle sur le site (lien cliquable pour afficher un article).

Voici la convention des liens pour le CRUD:

/index.php/post/create  <-> [Ajouter un article]   CREATE
/index.php/post/edit?=1  <-> [PHP7]                UPDATE
/index.php/post/delete?=1  <-> [supprimer]         DELETE

```
****************************************************************

Accueil ... [Dashboard]

****************************************************************

[Ajouter un article]

titre 		catégorie 		statut 				supprimer

[PHP7]        PHP			unpublished         [supprimer]
[MySQL]       DB			published           [supprimer]

...

```
# Exercice (création d'un article)
Créez l'action create_action() celle-ci proposera un formulaire pour ajouter un article, l'uri /index.php/post/create conduit à ce dernier, elle n'affiche donc qu'un formulaire vide.

Vous proposerez une action store_action() pour effectivement créer un nouvel article en base de données.

Gérez les actions et les uri dans le frontcontroller.

Attention, vous devez gérer les erreurs de formulaire et représenter celui-ci si il est incomplet.

Voyez le wireframe ci-dessous qui précise ce que vous devez faire:

```
```
****************************************************************

Accueil ... [Dashboard]

****************************************************************

[Ajouter un article]

Formulaire

form action="/index.php/store" method="post"
les champs notés (*) sont obligatoires
title [text] (*)
content [textarea] (*)
categorie [select]
statut [radio]

[ok]
...

```
# Exercice (udpate)
Gérez maintenant l'update, vous avez une url pour afficher le contenu de votre article, je vous la rappelle: /index.php/post/edit?id=1 et une autre pour effectivement faire la mise à jour de ce contenu et qui sera dans l'action du formulaire /index.php/post/update?id=1

# Exercice (delete)
Terminez par la suppression de l'article, créez un message d'alerte en javascript pour confirmer avant la suppression.

Vous n'avez qu'une url /index.php/post/delete?id=1

# Exercice (pagination)
Faites de la pagination pour l'affichage des articles sur la page "dashboard"

# Exercice (ajout d'image)
Ajoutez maintenant un champ file dans les deux formulaires respectivement de création d'un article et de mise à jour.