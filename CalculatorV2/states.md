#  Projet Calculatrice V2

Reprendre le même projet que précédement mais introduisez maintenant une option sur le premier formulaire "mémoire"
Vous utiliserez les variables de session.

Indications: vous utiliserez les variables de session en PHP, initialisez celle-ci à l'instanciation de la classe Calculator. Vous
pouvez par exemple utiliser une variable $_SESSION['result'] = 0 et gardez les résulats en mémoire comme dans une vraie 
calculatrice. 

Pour le formulaire lui-même ajouter une checkbox pour sélectionner cette option mémoire, faites en sorte de garder cette option 
cochée

```
**************
Calculator
**************
- precision
- result
**************

+ __construct($precision = 1)
+ mul(float $a, float $b):float
+ sub(float $a, float $b):float
+ add(float $a, float $b): float
+ avg(array $numbers): float
+ setMemory(bool $m)
+ setResult(float $res)
+ result():float
+ reset()
+ isMemory():bool

**************

```
