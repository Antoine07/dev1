<?php  
/*
* @author: Tony
*/

function get_pdo()
{
	// attention à bien définir ces variables dans votre fichier .env
	$host = getenv('DB_HOST');
	$dbname = getenv('DB_NAME');
	$user = getenv('DB_USER');
	$password = getenv('DB_PASSWORD');

	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password, [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
	
	return $pdo;
}

// posts front
function get_all_posts($paginate = 0){

	$pdo = get_pdo();

	$prepare = $pdo->prepare("
		SELECT p.*, a.name as author, c.title as category_name 
		FROM posts as p 
		LEFT JOIN authors as a
		ON p.author_id = a.id
		LEFT JOIN categories as c 
		ON p.category_id = c.id
		WHERE p.status='published' 
		ORDER BY published_at
		LIMIT ?,10
		");

	$prepare->bindValue(1,$paginate, PDO::PARAM_INT);

	$prepare->execute();
	$posts = $prepare->fetchAll(PDO::FETCH_ASSOC);
	
	$pdo = null;

	return $posts;
}

// posts admin
function get_all_posts_admin($paginate = 0){

	$pdo = get_pdo();

	$prepare = $pdo->prepare("
		SELECT p.*, a.name as author, c.title as category_name 
		FROM posts as p 
		LEFT JOIN authors as a
		ON p.author_id = a.id
		LEFT JOIN categories as c 
		ON p.category_id = c.id
		ORDER BY published_at DESC
		LIMIT ?,10
		");
	
	 // pour la limite c'est un int il faut absolument le définir dans le bindValue, n'utilisez pas de array dans execute
	$prepare->bindValue(1,$paginate, PDO::PARAM_INT);

	$prepare->execute();
	$posts = $prepare->fetchAll(PDO::FETCH_ASSOC);
	
	$pdo = null;

	return $posts;
}


function get_find_post($id){

	$pdo = get_pdo();

	$prepare = $pdo->prepare("
		SELECT p.*, a.name as author, c.title as category_name, c.id as category_id 
		FROM posts as p 
		LEFT JOIN authors as a
		ON p.author_id = a.id
		LEFT JOIN categories as c 
		ON p.category_id = c.id
		WHERE p.id = ?
		");

	$prepare->bindValue(1,$id, PDO::PARAM_INT);

	$prepare->execute();
	$posts = $prepare->fetch(PDO::FETCH_ASSOC);
	
	$pdo = null;

	return $posts;
}

function get_all_categories()
{
	$pdo = get_pdo();

	$result = $pdo->query('SELECT * FROM categories');
	$categories = $result->fetchAll(PDO::FETCH_ASSOC);
	
	$pdo = null;

	return $categories;
}

function get_posts_by_cat($id)
{
	$pdo = get_pdo();

	$prepare = $pdo->prepare('
		SELECT p.*, a.name as author 
		FROM posts as p
		LEFT JOIN authors as a 
		ON a.id=p.author_id 
		WHERE p.category_id=? ;'
		);

	$prepare->bindValue(1,$id, PDO::PARAM_INT);

	$prepare->execute();

	$posts = $prepare->fetchAll(PDO::FETCH_ASSOC);
	$pdo = null;

	return $posts;
}

function get_all_authors()
{
	$pdo = get_pdo();

	$result = $pdo->query('SELECT * FROM authors');
	$authors = $result->fetchAll(PDO::FETCH_ASSOC);
	
	$pdo = null;

	return $authors;
}

function get_comments_by_post($id)
{
	$pdo = get_pdo();

	$prepare = $pdo->prepare(
		'SELECT * FROM comments WHERE post_id=?');

	$prepare->bindValue(1,$id, PDO::PARAM_INT);
	$prepare->execute();

	$comments = $prepare->fetchAll(PDO::FETCH_ASSOC);

	$pdo = null;

	return $comments;
}

// pagination

function paginate($nbPosts=10)
{
	$pdo = get_pdo();

	$prepare = $pdo->prepare("
		SELECT COUNT(*) as nb FROM `posts`
		");

	$prepare->execute();
	$count = $prepare->fetch(PDO::FETCH_ASSOC);

	$page = ceil($count['nb'] / $nbPosts) ;

	return range(1, $page);

}

function insert_post($title, $content, $status, $category_id, $published_at)
{

	$pdo = get_pdo();

	$prepare = $pdo->prepare('
		INSERT INTO posts (title, content, status, category_id, published_at) VALUES (?,?,?,?,?)
		');

	// si vous passez toutes les valeurs dans le execute PDO transformera celle-ci en chaîne de caractère, il le fera aussi pour un id, cependant cela ne posera pas de problème à MySQL, il est un peu permisif sur les types. Concrètement il transtypera pour l'id. Mais pas pour tous les champs, alors attention à cette technique.
	return $prepare->execute([$title, $content, $status, $category_id, $published_at]);


}

// update resource post
function update_post($id, $title, $content, $status, $category_id, $published_at)
{

	$pdo = get_pdo();

	$prepare = $pdo->prepare('
		UPDATE posts SET title=?, content=?, status=?, category_id=?, published_at=? WHERE id=?
		');

	return $prepare->execute([$title, $content, $status, $category_id, $published_at, $id]);

}

function delete_post($id)
{
	$pdo = get_pdo();

	$prepare = $pdo->prepare('
		DELETE FROM posts WHERE id=?
		');

	return $prepare->execute([$id]);
}