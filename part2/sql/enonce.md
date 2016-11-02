## Création des tables
récupérer le fichier source [sources](https://app.hicode.ovh/gamers.sql); Tout est dans ce fichier alors installez à partir d'une console pour avoir la base de données les tables et les données d'exemple pour commencer.

adaptez à votre chemin

```sql

$ mysql -u root -p

// une fois sur le serveur en tant que root vous pouvez créer la base les tables ...

mysql>SOURCE C:/tmp/gamer.sql ;
``

## Exercice DQL data query language, des SELECT en clair 

## 1/ Exercice 
En utilisant la directive DISTINCT et de la condition IS NOT NULL afficher uniquement les différentes compagnies, une seule fois, de la table gamers.

## 2/ Exercices
Sélectionnez les noms des compagines par ordre croissant, puis décroissant. Puis sélectionnez les noms des compagnies et des dates d'inscriptions par ordre croissant et décroissant, vous pouvez en fait avoir deux champs dans ORDER BY, la place de ces champs a effectivement une importance.

## 3/ Exercice
Affichez les 3 premiers résultats de la table gamers. Puis affichez les 3 suivants, et enfin les 3 derniers, en utilisant la close LIMIT

## 4.1/ Exercice
Trouvez le nombre max d'heures de jeu dans la table, ainsi que le nombre min. Affichez en créant un alias le min et le max

## 4.2/ Exercice
Affichez le nom des/du joueur(s) ayant fait le plus d'heure de jeu, puis celui ayant fait le moins d'heure de jeu. Utilisez une sous requête, vous n'avez pas le choix...

```sql
SELECT col1, col2 FROM ma_table WHERE col1=(SELECT [clause col1] FROM maTable ) ;
```

## 5/ Exercice
Ajoutez une colonne bonus, de type SMALLINT UNSIGNED à la table gamers en utilisant une commande DDL (data definition language). Utilisez l'instruction AFTER pour placer cette nouvelle colonne après la colonne life. Vous essayerez également de supprimer la colonne puis de la recrééer.

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
|  1 | Abel    |    10 |   10 |  2952 |     450 | 2012-02-16       | AF       |
|  2 | Adam    |    11 |    5 |   300 |     450 | 2012-02-23       | AF       |
|  3 | Adrien  |     9 |   10 |  1220 |     450 | 2012-02-07       | SING     |
|  4 | Tony    |     7 |   10 |   577 |       0 | 2016-08-05       | SING     |
|  5 | Camille |     3 |    0 |    10 |    1000 | 2014-02-05       | AF       |
|  6 | Louise  |     1 |   10 |    82 |    2450 | 2016-02-13       | CAST     |
|  7 | Calvin  |    18 |  100 |    61 |     450 | 2016-02-13       | SING     |
|  8 | John    |    18 |  100 |     0 |     450 | 2016-02-13       | NULL     |
+----+---------+-------+------+-------+---------+------------------+----------+
```

## 7/ Exercice

Ajoutez maintenant un nouveau joueur ayant les caractéristiques suivantes:

```
+----+---------+-------+------+-------+---------+------------------+----------+
| id | name    | power | life | bonus | nb_hour | date_inscription | compagny |
+----+---------+-------+------+-------+---------+------------------+----------+
|  9 | Joana   |    11 |   10 |  1000 |      45 | 2016-10-13       | SING     |
+----+---------+-------+------+-------+---------+------------------+----------+
```

Trouvez les joueurs qui ont un 'a' dans leur nom. Puis tous les noms commençant par a. Et tous les noms dont l'avant dernière lettre est un e.