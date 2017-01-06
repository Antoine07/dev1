# FlashMessage

Objectif: nous allons créer un formulaire permettant d'envoyer un message en base de données.
Les scripts PHP vérifirons que le champ message n'est pas vide, dans le cas contraire on reverra le formulaire (redirection) avec
un message de type "flash message" (variable de session).
Si tout c'est bien passé le message sera enregistré en base de données, dans la table "notes". 

Si vous avez le temps vous pourrez également vérifier que le champ mail est valide et renvoyer le formulaire avec
les champs correctement rempli et les messages d'erreurs de soumission.

Dans un fichier "install.sql" écrire le code SQL permettant de créer:
- une base de données db_message
- un utilisateur "admin" avec le mot de passe "admin" ayant tous les droits d'administrateur sur la base de données db_message
- Ecrire le code permettant de Créer la table "notes" avec une clé primaire, un champ email VARCHAR(100) et champ TEXT
- Ecrire une commande pour insérer des données dans cet dernière table 

Exécutez ce fichier 

# Organisation des fichiers
Voici l'ensemble des fichiers que vous devriez avoir dans le dossier FlashMessage
- index.php, show.php, FlashMessage.php, Model.php, app.js

# Organisation de la vue

Suivez le wireframe suivant pour la vue:

```
        FlashMessage
        
Laissez-nous votre message
                                             
Email(*) []
Message (*) []

[Envoyer]

```

# Proposition pour les classes 

Voici ci-dessous les diagrammes de classe du projet

```
**************
FlashMessage
**************
**************
+ setFlashMessage($message, $priority = 'success')
+ getFlashMessage
**************

```
remarques: la méthode setFlashMessage ajouter à une variable $_SESSION['flashMessage'] le message avec une priorité et la méthode 
getFlashMessage retourne le message en réinitialisant la variable $_SESSION['flashMessage'] = null (par exemple).

```
**************
Model
**************
- pdo
**************

+ __construct(array $database)
+ create(array $data)

**************

```
remarques: la méthode __construct permet d'initialiser la connexion à PDO et la méthode create insert le message
en base de données dans la table "notes".