<?php

/*------------------------------------------------------*\
			FrontController
\*------------------------------------------------------*/

require_once __DIR__.'/../app.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ( '/' === $uri) {
	home_action();
}elseif ('/index.php/single' === $uri && isset($_GET['id'])) {
	single_action($_GET['id']);
}elseif('/index.php/category' === $uri && isset($_GET['id'])) {
	category_action($_GET['id']);
}elseif ('/index.php/about' === $uri ) {
	about_action();
}elseif ('/index.php/dashboard' === $uri ) {
	dashboard_action();
}
elseif ('/index.php/post/create' === $uri ) {
	create_action();
}
elseif ('/index.php/post/store' === $uri ) {
	store_action();
}elseif ('/index.php/post/edit' === $uri && isset($_GET['id']) ) {
	edit_action($_GET['id']);
}elseif ('/index.php/post/update' === $uri && isset($_GET['id']) ) {
	update_action($_GET['id']);
}elseif ('/index.php/post/delete' === $uri && isset($_GET['id']) ) {
	delete_action($_GET['id']);
}
else {
	header('HTTP/1.1 404 Not Found');
	echo '<html><body><h1>Page Not Found</h1></body></html>';
}