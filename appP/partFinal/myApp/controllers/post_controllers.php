<?php
// Dashboard

function dashboard_action()
{

	$flash_message = get_flash_message();

	$paginate = 1 ;

	if(isset($_GET['page'])) $paginate = (int) $_GET['page'];

	$categories = get_all_categories();
	$posts =  get_all_posts_admin(($paginate-1)*10, 'all');

	$pages = paginate();

	include '../views/dashboard.php';
}

function create_action()
{
	$categories = get_all_categories();

	session_start();
	
	if(!isset($_GET['back']))
	{
		$_SESSION['old'] = [];
		$_SESSION['errors'] = [];
	}

	include '../views/create.php';
}

function store_action()
{

	session_start();

	$_SESSION['old']['title'] = $_POST['title'];
	$_SESSION['old']['content'] = $_POST['content'];
	$_SESSION['old']['category'] = $_POST['category'];
	$_SESSION['old']['status'] = $_POST['status'];

	$_SESSION['errors'] = [];

	if(empty($_POST['title']))
	{
		$_SESSION['errors']['title'] = 'Le titre est obligatoire';
	}

	if(empty($_POST['content']))
	{
		$_SESSION['errors']['content'] = 'Le contenu est obligatoire';
	}

	if(empty($_SESSION['errors']))
	{
		$status = in_array($_POST['status'], ['published', 'unpublished'])? $_POST['status'] : 'unpublished';
		$category_id = ($_POST['category'] == 'null')? null :  (int) $_POST['category'] ;
		$published_at = ($_POST['status'] =='published')? date('Y-m-d h:i:s') : null;

		insert_post(
			$_POST['title'], 
			$_POST['content'], 
			$status, 
			$category_id,
			$published_at
			);

		$_SESSION['errors'] = [];
		$_SESSION['old'] = [];

		set_flash_message('L\'article a été inséré avec succès');
		header('Location: /index.php/dashboard');
		exit;

	}else{

		header('Location: /index.php/post/create?back=1');
		exit;
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
	session_start();

	$_SESSION['old']['title'] = $_POST['title'];
	$_SESSION['old']['content'] = $_POST['content'];

	$_SESSION['errors'] = [];

	if(empty($_POST['title']))
	{
		$_SESSION['errors']['title'] = 'Le titre est obligatoire';
	}

	if(empty($_POST['content']))
	{
		$_SESSION['errors']['content'] = 'Le contenu est obligatoire';
	}

	if(empty($_SESSION['errors']))
	{
		$status = in_array($_POST['status'], ['published', 'unpublished'])? $_POST['status'] : 'unpublished';
		$category_id = ($_POST['category'] == 'null')? null :  (int) $_POST['category'] ;
		$published_at = ($_POST['status'] =='published')? date('Y-m-d h:i:s') : null;

		update_post(
			$id,
			$_POST['title'], 
			$_POST['content'], 
			$status, 
			$category_id,
			$published_at
			);

		$_SESSION['errors'] = [];
		$_SESSION['old'] = [];

		set_flash_message('L\'article a été modifié avec succès');
		header('Location: /index.php/dashboard');
		exit;

	}else{

		header('Location: /index.php/post/create?back=1');
		exit;
	}

}

function delete_action($id)
{
	delete_post($id);

	set_flash_message('L\'article a été supprimer avec succès');
	header('Location: /index.php/dashboard');
	exit;
}