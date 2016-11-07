<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap template</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
  <style>
    body {
      padding-top: 5rem;
    }
  </style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <nav class="navbar navbar-fixed-top navbar-dark bg-inverse">
    <a class="navbar-brand" href="<?php echo getEnv('URL_SITE') ?>">Blog</a>
    <ul class="nav navbar-nav">
     <?php foreach($categories as $category): ?>
      <li class="nav-item active" ><a class="nav-link" href="/index.php/category?id=<?php echo $category['id']?>"><?php echo $category['title'] ?></a></li>
    <?php endforeach; ?>
    <li class="nav-item active" ><a class="nav-link" href="/index.php/slide">Slide</a></li>
    <li class="nav-item active" ><a class="nav-link" href="/index.php/about">Contactez nous</a></li>
  </ul>
</nav>
<div class="container">
 <div class="row">
   <div class="col-md-8">
    <?php if(!empty($flash_message)): ?>
      <div class="alert alert-<?php echo $flash_message['type'] ?>">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong><?php echo $flash_message['type'] ?></strong> <?php echo $flash_message['message'] ?>
      </div>
    <?php endif; ?>
    <?php echo $content?? '' ; ?></div>
    <div class="col-md-4">
     <h2>Les auteurs du blog</h2>
     <?php foreach($authors as $author): ?>
      <li><a href="/author?id=<<?php echo $author['id'] ?>"><?php echo $author['name'] ?></a></li>
    <?php endforeach ?>
  </div>
</div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="/assets/js/slide.js" ></script>
</body>
</html>