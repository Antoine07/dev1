# SQL
 Pour se connecter au serveur MySQL

Vous donnerez le mot de passe en le précisant au prompt suivant
```
$ mysql -u root -p 
$ mysql -u root -p --database db_blog
```

Se connecter à une base après s'être authentifier en root par exemple

```
$ mysql -u root -p 
mysql> use db_blog
```

En console vous pouvez, une fois sur votre base de données utilisez le SQL directement pour interagir avec la DB. Pensez à bien terminer les instructions par un ;

```
mysql> INSERT INTO posts (title, status) VALUES ('PHP7', 'published'), ('MySQL', 'unpublished'), ('Angular', 'published');
```

# PHP

En ligne de commande pour savoir quel version de PHP vous avez en CLI

```
$ php -v
```

Lancer le serveur PHP, que pour les tests en développement pas en production. Permet d'avoir des URLs courtent.
Attention, de bien vérifier que vous avez un index dans le dossier dans lequel vous lancez le serveur PHP.

```
$ php -S localhost:8000
```

# Console

listes les fichiers même cachés
```
$ ls -al   

```

savoir où vous êtes dans la console

```
$ pwd

```