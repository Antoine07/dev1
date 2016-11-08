# CRUD
Nous allons terminer le CRUD à partir de notre MVC. Je vous rappelle que le CRUD est un acronyme qui signifie: create, read update et delete et qu'il s'applique sur ce que l'on appelle une resource, c'est-à-dire pour nous une table de notre base de données. Nous allons la voir à partir de la table posts et de la table categories de notre mini-blog.

# Exercice (mise en place de la page dashboard)
Ajoutez un lien pour aller sur le dashboard dans le menu principal.

Créez un nouveau layout pour votre dashboard: master_admin.php, celui-ci ne comportera pas de colonne latérale et aura une colonne unique pour son contenu.

Ajoutez, avec la commande SQL ALTER TABLE, le champ status à la table posts, ce champ ne prendra que les valeurs suivantes:
published, unpublished. Utilisez le type ENUM, c'est un string qui ne peut prendre que des valeurs que vous définissez vous même:

status ENUM('published', 'unpublished') DEFAULT 'unpublished'

Ajoutez maintenant le champ published_at de type DATETIME, il pourra avoir la valeur spéciale NULL, dans ce cas l'article n'aura pas de date de publication. Les articles, sur les différentes pages du site, seront ordonnées par date décroissante de date de publication.

Notez vos commandes SQL dans un fichier install.sql à la racine de votre projet.

Créez une action dashboard_action(), dans les contrôleurs et appelez celle-ci dans le frontcontroller. Elle affichera, dans un tableau, la liste des posts de notre blog. Affichez: le titre, la catégorie dans laquelle se trouve l'article si elle existe, le statut, un bouton de suppression de l'article et enfin un bouton pour ajouter un article. (voir wireframe ci-dessous).

Chaque lien représenté dans le wireframe ci-dessous est materialisé par le symbole suivant: [ lien ].

Détails des liens: 
- Ajouter un article conduira à la page pour ajouter un article (CREATE), 
- les titres des articles sont cliquables et permettrons de mettre à jour les articles en base de données (UPDATE) 
- et enfin un lien [supprimer], par ligne dans le tableau, permettra de supprimer un article. 
- L'action READ n'est pas demandée, elle est déjà en faite sur le site (lien cliquable pour afficher un article).

Voici la convention des liens pour le CRUD:

/index.php/post/create  <-> [Ajouter un article]   CREATE

/index.php/post/edit?=1  <-> [PHP7]                UPDATE

/index.php/post/delete?=1  <-> [supprimer]         DELETE

```
****************************************************************

Accueil ... [Dashboard]

****************************************************************

[Ajouter un article]

titre 		catégorie 		statut 				date de publication    supprimer

[PHP7]        PHP			unpublished         	10/02/2016		    [supprimer]
[MySQL]       DB			published           	pas de date			[supprimer]
[JS]          JS			published           	10/02/2016			[supprimer]
[Arduino]     non cat       unpublished         	10/02/2016			[supprimer]
...

```
# Exercice (création d'un article)
Créez l'action create_action(), dans les contrôleurs, celle-ci proposera un formulaire pour ajouter un article, l'uri /index.php/post/create conduit à la page du formulaire permettant de créer un article.

Vous proposerez une action store_action() pour effectivement créer un nouvel article en base de données. Cette action est connectée à l'url /index.php/post/store de votre formulaire.

Attention, vous devez gérer les erreurs de formulaire et représenter celui-ci si il est incomplet abec les champs valides.

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
publier [radio]
statut [radio]

[ok]
...

```
# Exercice (udpate)
Gérez maintenant l'update, vous avez une url pour afficher le contenu de votre article, je vous la rappelle: /index.php/post/edit?id=1 et une autre pour effectivement faire la mise à jour de ce contenu et qui sera dans l'action du formulaire /index.php/post/update?id=1

# Exercice (delete)
Terminez par la suppression de l'article, créez un message d'alerte en javascript pour confirmer avant la suppression.

- url: /index.php/post/delete?id=1 créez l'action delete_action() dans vos contrôleurs.

# Exercice (pagination)
Faites de la pagination pour l'affichage des articles sur la page "dashboard". Vous afficherez 10 articles par page.

# Exercice (ajout d'image)
Ajoutez maintenant un champ file dans les deux formulaires respectivement de création d'un article et de mise à jour. Gérez maintenant l'upload d'un fichier.