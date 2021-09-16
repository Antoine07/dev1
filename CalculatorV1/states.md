#  Projet Calculatrice

Vous implémentez une classe Calculator, permettant d'effectuer des opérations classiques de calcul.
Suivez le schéma ci-dessous (diagramme UML) pour écrire le code utile de la classe, précisons que dans un diagramme UML
les symboles suivants désignent la portée des membres d'une classe:

```text
+ public
- private
```
```text
**************
Calculator
**************
- precision
**************

+ __construct($precision = 1)
+ mul(float $a, float $b):float
+ sub(float $a, float $b):float
+ add(float $a, float $b): float
+ avg(array $numbers): float

**************

```

## Organisation et présentation des résultat

Faites un dossier CalculatorV1 et dans celui-ci créez un fichier Calculator.php pour la classe, un fichier index.php
qui traitera les données, c'est dans ce fichier que vous importerez la classe Calculator.php et que vous traiterez le formulaire
de la calculatrice. Le fichier show.php gérera l'affichage de la calculatrice, suivez le wireframe ci-dessous pour cette page:

Notez que la cible des formulaires sera le fichier index.php

```
        Calculatrice
        
Formulaire 1                                              Formulaire 2 

Nombre 1 :[  ]                                            Calculer la moyenne:                                                []  
Nombre 2 :[  ]                                            Saisir les nombres dans le champs suivant en les séparants par 
                                                          une virgule:
                                                          [           ]
Opérateur: [ addition, multiplication, soustraction ]     [Calculer]

[Calculer]

```

Une fois que l'on a envoyé le formulaire, cible index.php, vous afficherez le résultat dans la même page show.php, faites une condition sur 
une variable $result = null pour afficher les formulaires ou le résultat lui-même. Un bouton pour revenir à la page présentant
les deux formulaires de calcul sera également présent dans cette page, voyez le wireframe suivant:

```
résultat: 10
[revenir aux formulaires]

```
