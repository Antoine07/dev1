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

function get_all_posts(){

	$pdo = get_pdo();

	$query = '
		SELECT p.*, a.name as author, c.title as category_name FROM posts as p 
		LEFT JOIN authors as a
		ON p.author_id = a.id
		LEFT JOIN categories as c 
		ON p.category_id = c.id
	';

	$result = $pdo->query($query);
	$posts = $result->fetchAll(PDO::FETCH_ASSOC);
	
	$pdo = null;

	return $posts;
}

function get_find_post($id){

	$pdo = get_pdo();

	$result = $pdo->query(sprintf(
		'SELECT * FROM posts 
		 WHERE id=%s', 
		(int) $id
		)
	);
	$post = $result->fetch(PDO::FETCH_ASSOC);
	$pdo = null;

	return $post;
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

	$query = sprintf('
		SELECT p.*, a.name as author FROM posts as p
		LEFT JOIN authors as a ON a.id=p.author_id 
		WHERE category_id=%s', 
		(int) $id
		);

	$result = $pdo->query($query);
	$authors = $result->fetchAll(PDO::FETCH_ASSOC);
	
	$pdo = null;

	return $authors;
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

	$result = $pdo->query(sprintf(
		'SELECT * FROM comments WHERE post_id=%s', 
		(int) $id
		)
	);
	$comments = $result->fetchAll(PDO::FETCH_ASSOC);
	$pdo = null;

	return $comments;
}