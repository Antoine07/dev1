<?php 

if(isset($_GET['id']))
{
	$link = new PDO("mysql:host=localhost;dbname=db_blog", 'root', '');
	$result = $link->query(sprintf('SELECT id, title, content FROM posts WHERE id=%s', (int) $_GET['id'] ));

	$post = $result->fetch(PDO::FETCH_ASSOC);
	
	$link = null; // fermer la connexion
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<nav>
		<h1>Les articles de mon blog</h1>
		<a href="/">Accueil</a>
	</nav>

	<?php if(!empty($post)) :?>
		<h2><?php echo $post['title'] ?></h2>
		<p><?php echo $post['content'] ?></p>
	<?php else: ?>
		<p>désolé aucun article</p>
	<?php endif ; ?>
	
</body>
</html>
