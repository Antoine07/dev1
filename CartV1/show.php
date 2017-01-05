<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <style>
        body {
            padding-top: 50px;
        }

        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }

        .sum, .avg {
            display: block;
        }
    </style>
</head>
<body>
<nav class="starter-template">
    <div class="container">
        <h1>Boutique</h1>
    </div>
</nav>
<?php if (!empty($products)) : ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul>
                <!-- on parcourt le tableau d'objets de type Bike pour afficher les résultats -->
                <?php foreach ($products as $product): ?>
                    <li>Nom: <?php echo $product->getName(); ?>
                        <br> Prix: <?php echo $product->getPrice(); ?> &euro;
                        <br> Couleur: <?php echo $product->getColor(); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <?php else : ?>
        <div class="container">
            <div class="col-md-12">
                <blockquote>
                    <p>Il n'y pas de produit</p>
                </blockquote>
            </div>
        </div>

    <?php endif; ?>
</body>
</html>