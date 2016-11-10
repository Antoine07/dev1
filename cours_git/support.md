# Commandes d'aide

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