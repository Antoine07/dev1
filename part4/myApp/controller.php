<?php

function home_action()
{
	
	$flash_message = get_flash_message();

	$posts =  get_all_posts();
	$categories = get_all_categories();
	$authors = get_all_authors();

	include '../views/home.php' ;
}

function single_action($id)
{
	$post =  get_find_post($id);
	$categories = get_all_categories();
	$authors = get_all_authors();

	include '../views/single.php' ;
}

function category_action($id)
{

	$posts = get_posts_by_cat($id);
	$categories = get_all_categories();
	$authors = get_all_authors();

	include '../views/category.php';
}

function author_action($id)
{

	$posts = get_posts_by_cat($id);
	$categories = get_all_categories();
	$authors = get_all_authors();

	include '../views/author.php';
}

function slide_action()
{
	$categories = get_all_categories();
	$authors = get_all_authors();

	include '../views/slide.php';
}

function about_action()
{
	session_start();

	$categories = get_all_categories();
	$authors = get_all_authors();

	if(!isset($_GET['back']))
	{
		$_SESSION['old'] = [];
		$_SESSION['errors'] = [];
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$_SESSION['old']['email'] = $_POST['email'];
		$_SESSION['old']['message'] = $_POST['message'];

		$_SESSION['errors'] = [];

		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
			$_SESSION['errors']['email'] = 'Veuillez renseigner un email valide';
			$_SESSION['old']['email'] = '';
		}

		if(empty( $_POST['message'])) $_SESSION['errors']['message'] = 'message obligatoire';

		if(empty($_SESSION['errors']))
		{
			$transport = Swift_SmtpTransport::newInstance(getEnv('SMTP_SERVER'), getEnv('SMTP_PORT'))
			->setUsername(getEnv('EMAIL_USERNAME'))
			->setPassword(getEnv('EMAIL_PASSWORD'));

			$mailer = Swift_Mailer::newInstance($transport);

			$message = Swift_Message::newInstance('Wonderful Subject')
			->setFrom(array($_POST['email'] => 'John Doe'))
			->setTo(array('tony@hicode.ovh','antoine.lucsko@wanadoo.fr', 'antoine.lucsko@gmail.com'))
			->setBody($_POST['message']);

			if(!$mailer->send($message))
			{
				set_flash_message('Une erreur c\'est produit lors de l\'envoi de votre message.');
				header('Location: /index.php/about');
            	exit; // arrête les script après une redirection 

            }
            
            set_flash_message('Merci pour votre email');

            $_SESSION['old'] = [];
            $_SESSION['errors'] = [];

            header('Location: '. url());
            exit;

        }else{
        	header('Location: /index.php/about?back=1');
        	exit;

        }
        
    }
    
    include '../views/about.php';

}

// Dashboard

function dashboard_action()
{
	
}