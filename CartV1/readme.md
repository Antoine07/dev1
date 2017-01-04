# Projet Panier

Vous développez un projet de panier et affichez dans une page principale la liste des produits commandés.

- listes des classes PHP utiles pour le projet

    - Une classe Product permettant de déterminer le nom et le prix des produits. 
    - Une classe Bike qui hérite de la classe Product.
    - Une classe StorageBike qui permettra de récupérer les produits stockés dans un fichier.

Voici le diagramme UML de la classe Product, le type sera fixé par défaut dans la classe Product et surchargé dans la classe
Bike.

```
**************
Product
**************
- name
- price
# type
**************

__construct($name, $price)
getName
setName(string $name)
getPrice
setPrice(string $price)

**************

```

Diagramme UML de la classe Bike

```
**************
Bike extends Product
**************
- color
# type = 1001
**************

__construct($name, $price)
getColor
setColor(string $color)

**************

```

Diagramme UML StorageBike

La méthode load permettra de récupérer les produits dans un tableau, ce dernier sera exploiter dans le projet pour afficher 
les produits.

```
**************
StorageBike
**************
- fileName
**************

__construct($fileName = 'bikes.csv')
+ load

**************

```

Pour terminer voici les données du fichier csv

```
"Brompton S",1300.5,red
"Brompton M",1700.5,green
"Brompton M1",1890.5, yellow
"Dahon S",890.8,black
"Dahon M",680.5,red
```
