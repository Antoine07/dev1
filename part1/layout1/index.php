<?php 
$link = new PDO("mysql:host=localhost;dbname=db_blog", 'root', '');
$result = $link->query('SELECT id, title, content FROM posts');
$posts = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $posts[] = $row;
}
$link = null; // fermer la connexion

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>les articles de mon blog</h1>
	<nav>
		<a href="/">Home</a>
	</nav>
	<?php foreach($posts as $post): ?>
		<h2><a href="single.php?id=<?php echo $post['id'] ?>"><?php echo $post['title'] ;?></a></h2>
	<?php endforeach; ?>
</body>
</html>
