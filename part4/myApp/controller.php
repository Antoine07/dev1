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

            header('Location: /');
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

	$flash_message = get_flash_message();
	$categories = get_all_categories();
	$posts =  get_all_posts_admin(); // ajout d'une méthode pour afficher tous les posts sans statut 

	include '../views/dashboard.php';
}

function create_action()
{
	$categories = get_all_categories();

	session_start();
	
	// netoyer les variables de session si on ne vient pas de l'action store
	if(!isset($_GET['back']))
	{
		$_SESSION = [];
	}

	include '../views/create.php';
}

function store_action()
{
	// on vérifie que l'on arrive bien sur cette action en POST
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		session_start();

	// initialisation des valeurs que l'on passera si besoin au formulaire pour réafficher les valeurs
	// des champs si besoin
		$_SESSION['old']['title'] = $_POST['title'];
		$_SESSION['old']['content'] = $_POST['content'];
		$_SESSION['old']['category'] = $_POST['category'];
		$_SESSION['old']['status'] = $_POST['status'];

		$_SESSION['errors'] = [];

	// titre obligatoire
		if(empty($_POST['title']))
		{
			$_SESSION['errors']['title'] = 'Le titre est obligatoire';
		}

	// contenu obligatoire
		if(empty($_POST['content']))
		{
			$_SESSION['errors']['content'] = 'Le contenu est obligatoire';
		}

	// si aucune erreur on enregistre en base
		if(empty($_SESSION['errors']))
		{
		// on vérifie avant de rentrer les données en base le type de nos variables
			$status = in_array($_POST['status'], ['published', 'unpublished'])? $_POST['status'] : 'unpublished';

			$category_id = ($_POST['category'] == 'null')? null :  (int) $_POST['category'] ;

			$published_at = ($_POST['status'] =='published')? date('Y-m-d h:i:s') : null;

		// on insert les données en base de données, méthode à mettre en place
			insert_post(
			$_POST['title'],  // le champ title sera protégé avec la méthode prepare
			$_POST['content'], // le champ title sera protégé avec la méthode prepare
			$status, 
			$category_id,
			$published_at
			);

		// on netoye les donnes de session
			$_SESSION = [];

			set_flash_message('L\'article a été inséré avec succès');
			header('Location: /index.php/dashboard');
			exit;

		}else{

		// si il y a des erreurs on retourne sur le formulaire create 
			header('Location: /index.php/post/create?back=1');
			exit;
		}

	}
}

function edit_action($id)
{
	$post =  get_find_post($id);
	$categories = get_all_categories();

	include '../views/edit.php' ;
}

function update_action($id)
{
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{

		
	}

}

function delete_action($id)
{
	

}