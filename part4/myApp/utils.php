<?php 

// set la valeur de session
function set_flash_message($message, $type='warning')
{
	// on vérifie que la session n'existe pas avant dans créer une
	if (!isset($_SESSION))
		session_start();

	$_SESSION['flash_message'] = [
	'message' => $message,
	'type'    => $type,
	];

}

// retourne le message flash puis vide la variable de session
function get_flash_message()
{

	if (!isset($_SESSION))
		session_start();

	if(empty($_SESSION['flash_message'])) return;
	
	$flash =  $_SESSION['flash_message'];

	$_SESSION['flash_message'] = [];

	return $flash;

}

// todo gestion des urls absolu dans les vues, écrire l'uri comme suit 'assets.images' pour assets/images plus pratique dans le code
function url($uri=null, $params = [])
{
	if(is_null($uri))
		return getEnv('URL_SITE');

	$uri = explode('.', $uri);

	return getEnv('URL_SITE') . '/' .implode('/', $uri);
}
