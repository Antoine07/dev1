# Commandes d'aide

documentation [https://git-scm.com/docs]

## logs 
- git status avoir le statut de votre dépôt quel état
- git help [command]
- git log permet d'afficher l'ensemble de vos hash de commit avec des informations
- git log --oneline 
- git log master..origin/master voir les différences entre les deux branches
- git log -5
- git log -p -5 
- git log --stat
- git log --since=2.weeks

Pour quitter les logs de git tapez la lettre q dans la console, q pour quitter.

## Checkout

### Retour en arrière sans rien changer

``` bash
# Mettre le dépôt tel qu'il était lors du commit f597d47552d, le pointeur se déplace sur le commit
$ git checkout f597d47552d
# Pour remettre le pointeur sur le dernier commit
$ git checkout master

```

### Modifier un fichier dans l'historique

``` bash
# Le fichier index.html est stagé dans l'état dans lequel il se trouvait pour ce [sha1]
$ git checkout [sha1] index.html

$ git commit -m "retour en arrière pour le code dans index.html"

```

### Revert

défaire ce qui a été fait, cela peut entrainer des conflits qu'il faudra résoudre

``` bash
# Crée un commit qui annulera ce qui a été fait pour le commit 12916f5
$ git revert 12916f5

```

## Amend

Dans le cas où on a oublié du code dans un commit

``` bash

# On ajoute le code qui manquait
vim index.html

$ git add index.html
$ git commit --amend # associe les changements au dernier commit, le message du dernier commit s'ouvrira dans l'éditeur par défaut

# Si on souhaite uniquement modifier le message du commit

$ git commit --amend

```
## Reset annulation
La commande reset modifie l'historique, il ne faut jamais le faire sur des commits déjà publiés!

``` bash
# Annule le dernier commit et met tout dans le WD sans perte
$ git reset HEAD~ 

# Annule le dernier commit et met tout dans la staging area sans perte
$ git reset --soft HEAD~

# Annule le dernier commit et supprime les modifications...(danger)
$ git reset --hard HEAD~

# Retire un fichier de la staging area, sans perte de modif
$ git add [fileName]
$ git reset HEAD [fileName]

# On peut faire un git reset sur un commit, en utilisant les options précédentes, attention tous les commits suivants le commit annulé seront perdus:
$ git reste  f597d47552d 

$ git reset HEAD 
...

```

Git fait un fast-foward sur la branche master et dev, par exemple quand tous les commits de la branche master sont atteignables depuis la branche dev,
sinon Git fait un commit de merge

``` bash

$ git checkout master
$ git merge dev

# Forcer un commit de merge sur un fast-foward

$ git merge dev --no-ff

# Supprimer une branche 

$ git branch -d dev

# Voir toutes les branches non mergés

$ git branch --no-merged

# Forcer la suppression d'une branche, non mergé donc, en perdant le travail dessus:

$ git branch -D ma_branche

```

## Gestion de conflit

Pour fusionner deux branches Git repère le dernier commit commun entre les deux branches et utilise les modifs des deux branches.

Il analyse trois versions différentes du dépôt:

- version dernier commit
- version de la première branche à fusionner actuelle
- version de la deuxième branche à fusionner actuelle

Il faut résoudre chaque conflit, lorsque deux versions du même fichier ont été modifié aux mêmes endroits.

``` bash
tagtagtag HEAD 
	Music Pi 
tagtagtag
	SONIC 
tagtagtag branchB  

$ git add . 
$ git commit # message de merge par défaut

```
On peut avoir plusieurs conflits à gérer dans plusieurs fichiers...

## Stash (remisé)

Si des fichiers suivis par Git, modifiés mais non commité, sur une branche particulière existent, alors on ne peut pas changer de branche. Cependant, on peut remiser son code sur la branche particulière pour y revenir plus tard.

 ``` bash

 $ git branch
 master
 dev
 * feature_route
 $ git stach
 $ git checkout master
 # correction d'un bug...
 $ git checkout feature_route
 # liste les stash
 $ git stash list
 stash@{0}: WIP on master: 01524a bug important 
 stash@{1}: WIP on master: 452ets un test non validé
 # remet le code remisé dans le WD on peut ajouter --index pour le re-stagé si il l'était
 $ git stash apply
 # ou appliquer un stash particulier
 $ git stash apply stash@{1}
 # supprime le stash
 $ git stash drop 

 ```