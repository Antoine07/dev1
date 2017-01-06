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
        .sum, .message {
            display: block;
        }
        .flash{
            height: 90px;
        }
    </style>
</head>
<body>
<nav class="starter-template">
    <div class="container">
        <h1><a href="index.php">Flash Message</a></h1>
    </div>
</nav>
    <div class="container flash">
        <div class="row">
            <div class="col-md-12">
                <?php if (!empty($message)): ?>
                <div class="alert alert-<?php echo $message['priority']; ?>">
                    <strong><?php echo $message['message']; ?></strong>
                </div>
                <?php endif ?>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="index.php" method="post">
                <div class="form-group">
                    <small>(*) Champ obligatoire</small>
                </div>
                <div class="form-group">
                    <label class="email" for="message">Email (*)</label>
                    <input type="email" name="email">
                </div>
                <div class="form-group">
                    <label class="message" for="message">Message (*)</label>
                    <textarea name="message" id="message" cols="30" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Message">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="app.js"></script>
</body>
</html>