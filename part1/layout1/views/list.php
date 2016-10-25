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