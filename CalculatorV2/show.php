<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        Document</title>
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
        <h1>Calculatrice</h1>
    </div>
</nav>
<?php if ($result === null) : ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Simple</h2>
            <section class="calculator">
                <form action="index.php" method="post">
                    <input type="hidden" name="calOne" value="1">
                    <div class="form-group">
                        <label for="numberOne">Nombre Un</label>
                        <input id="numberOne" type="text" name="numberOne" size="5">
                    </div>
                    <div class="form-group">
                        <label for="numberTwo">Nombre deux</label>
                        <input id="numberTwo" type="text" name="numberTwo" size="5">
                    </div>
                    <div class="form-group">
                        <select name="operator" id="">
                            <option value="add">
                                Addition
                            </option>
                            <option value="mul">
                                Multiplication
                            </option>
                            <option value="sub">
                                Soustraction
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="memory">Mémoire</label>
                        <input id="memory" <?php echo ($memory)? 'checked' : ''?> type="checkbox" name="memory" value="1">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Calculer">
                    </div>
                </form>
            </section>
        </div>
        <div class="col-md-6">
            <h2>Moyenne</h2>
            <form action="index.php" method="post">
                <input type="hidden" name="calTwo" value="1">
                <div class="form-group">
                    <small>(*) séparez les nombres par une virgule</small>
                </div>
                <div class="form-group">
                    <label class="avg" for="avg">Moyenne (*)</label>
                    <textarea name="avg" id="avg" cols="30" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Calculer">
                </div>
            </form>
        </div>
    </div>
    <?php else : ?>
        <div class="container">
            <div class="col-md-12">
                <blockquote>
                    <p>Résultat: <?php echo $result; ?>
                        <br>
                        <a href="index.php">revenir à la calculatrice</a>
                    </p>
                </blockquote>
            </div>
        </div>

    <?php endif; ?>
</body>
</html>