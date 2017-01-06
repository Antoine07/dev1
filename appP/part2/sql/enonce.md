## Création des tables

Récupérez le fichier source [sources](https://app.hicode.ovh/gamers.zip); utilisez la console pour mettre en place les exercices.

```sql

$ mysql -u root -p

// une fois sur le serveur en tant que root vous pouvez créer la base les tables ...

mysql>SOURCE C:/tmp/gamer.sql ;

```

## Exercice DQL data query language, des SELECT en clair 

## 1/ Exercice 
En utilisant la directive DISTINCT et la condition IS NOT NULL, affichez uniquement les différentes compagnies, de la table gamers.

## 2/ Exercices
Sélectionnez les noms des compagines par ordre croissant, puis décroissant. Puis sélectionnez les noms des compagnies et des dates d'inscriptions par ordre croissant et décroissant, vous pouvez en fait avoir deux champs dans ORDER BY, la place de ces champs a une importance dans le tri effectué.

## 3/ Exercice
Affichez les 3 premiers résultats de la table gamers. Puis affichez les 3 suivants, et enfin les 3 derniers, en utilisant la close LIMIT

## 4.1/ Exercice
Trouvez le nombre max d'heures de jeu dans la table gamers, ainsi que le nombre min. Affichez en créant un alias le min et le max dans la pseudo table.

## 4.2/ Exercice
Affichez le nom des/du joueur(s) ayant fait le plus d'heure de jeu, puis celui ayant fait le moins d'heure de jeu. Pensez à utiliser une sous-requête dans la clause WHERE.

```sql
SELECT col1, col2 FROM ma_table WHERE col1=(SELECT [clause col1] FROM maTable ) ;
```

## 5/ Exercice
Ajoutez une colonne bonus, de type SMALLINT UNSIGNED à la table gamers en utilisant une commande DDL (data definition language). Utilisez l'instruction AFTER pour placer cette nouvelle colonne après la colonne life. Vous essayerez également de supprimer cette colonne puis de la recrééer pour vous entrainer.

```sql
 ALTER TABLE ma_table ADD COLUMN ma_colonne mon_type;
 
 -- si vous vous êtes trompé

 ALTER TABLE ma_table DROP ma_colonne ;

```

## 6/ Exercice
Utilisez une instruction UPDATE ( DML data manipulation language ) pour ajouter les valeurs suivantes dans la table

```
+----+---------+-------+------+-------+---------+------------------+----------+
| id | name    | power | life | bonus | nb_hour | date_inscription | compagny |
+----+---------+-------+------+-------+---------+------------------+----------+
|  1 | Abel    |    10 |   10 |  2952 |     450 | 2012-02-16       | CAPTAMERIC|
|  2 | Adam    |    11 |    5 |   300 |     450 | 2012-02-23       | CAPTAMERICA|
|  3 | Adrien  |     9 |   10 |  1220 |     450 | 2012-02-07       | THOR     |
|  4 | Tony    |     7 |   10 |   577 |       0 | 2016-08-05       | THOR     |
|  5 | Camille |     3 |    0 |    10 |    1000 | 2014-02-05       | CAPTAMERICA|
|  6 | Louise  |     1 |   10 |    82 |    2450 | 2016-02-13       | IRONMAN  |
|  7 | Calvin  |    18 |  100 |    61 |     450 | 2016-02-13       | THOR     |
|  8 | John    |    18 |  100 |     0 |     450 | 2016-02-13       | NULL     |
+----+---------+-------+------+-------+---------+------------------+----------+
```

## 7/ Exercice

Ajoutez maintenant un nouveau joueur ayant les caractéristiques suivantes:

```
+----+---------+-------+------+-------+---------+------------------+----------+
| id | name    | power | life | bonus | nb_hour | date_inscription | compagny |
+----+---------+-------+------+-------+---------+------------------+----------+
|  9 | Joana   |    11 |   10 |  1000 |      45 | 2016-10-13       | THOR     |
+----+---------+-------+------+-------+---------+------------------+----------+
```

Trouvez les joueurs qui ont un 'a' dans leur nom. Puis tous les noms commençant par a. Et tous les noms dont l'avant dernière lettre est un e.

## 8 / Exercice
Affichez le nombre d'heure de jeu le plus élevé par compagnie. Utilisez la clause GROUP BY. Pour ne pas afficher les joueurs n'ayant pas de compagnie faites une clause WHERE avant la clause GROUP BY.


## 9/ Exercice
Dans la table gamers.
Affichez les totaux par compagnies dans la table gamers.
Quelles sont les compagnies qui ont un total de plus de 20 en vie?

remarque: sur un GROUP BY vous utiliserez un HAVING permettant sur chaque groupe d'appliquer un calcule. Attention à ne pas confondre avec WHERE qui fait un filtre global sur l'ensemble de la requête, le HAVING le fait sur chaque groupement.

```sql
SELECT col1, SUM(col2) FROM ma_table GROUP BY (col1) HAVING (calcule sur col2);
```

## 10.1/ Exercice
Ajoutez maintenant la colonne type_spaceship à la table gamers, optimisez la place de ce champ, vous prendrez un champ de type CHAR(10). Utilisez la commande ALTER TABLE ADD COLUMN. Puis faites la mise à jour suivante:

```
SELECT name, type_spaceship FROM gamers;

+---------+----------------+
| name    | type_spaceship |
+---------+----------------+
| Abel    | XJ-2           |
| Adam    | BLACK-ONE      |
| Adrien  | XJ-2           |
| Tony    | TS-TT          |
| Camille | BLACK-ONE      |
| Louise  | BLACK-ONE      |
| Calvin  | XJ-2           |
| John    | BLACK-ONE      |
| Joana   | BLACK-ONE      |
+---------+----------------+

```
# opérateurs ensemblistes intersection différence et union

## 10.1 
Quels sont les types de spaceship que les deux compagnies suivantes THOR et CAPTAMERICA exploitent en commun ?

## 10.2/ Exercice (différence NOT IN)
Quels sont les types de spaceship exploité par la compagnie THOR mais pas par CAPTAMERICA ? Utilisez une sous-requête et la clause NOT IN.

## 10.3/ Exercice (union)
Quels sont tous les types d'avions que les deux compagnies THOR et CAPTAMERICA utilisent ? Utilisez l'opérateur UNION, notez qu'il élimine les duplicatas.

remarques dans une UNION les deux requêtes doivent renvoyer le même nombre de colonnes.

## 11.1/ Exercice statistique
Affichez le name et la life augmenté de 20% ordonnée par life.
Sélectionnez tous ceux qui sont au-dessus strictement de la moyenne
Affichez la pseudo-table qui augmente de 1 point tout ceux qui sont au-dessus de la moyenne.

Affichez l'écart type par rapport au champ life de la table gamers.

# Produits et commandes des joueurs

## 1/ Exercice (tables commands, products)

Affichez la liste des commandes (number, diff des écarts, status) expédiées uniquement avec un écart de plus de 4 jours, ordonné par ordre d'écart décroissant.

## 2/ Exercice
Reprenez la requête précédente et afficher maintenant le nom des produits commandés. Puis le nom du produit et le nom du joueur qui a commandé ce produit.

## 2/ Exercice
Affichez la liste des produits avec le prix des stocks de la table products.

