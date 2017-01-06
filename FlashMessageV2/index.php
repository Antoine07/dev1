<?php

require_once 'FlashMessage.php';
require_once 'Model.php';

$flashMessage = new FlashMessage();

$message = $flashMessage->getFlashMessage();

$model = new Model([
        'dns'  => 'mysql:host=localhost;dbname=db_message',
        'username' => 'root',
        'password' => ''
]);

if (!empty($_POST)) {
    /**
     * Si message est vide alors on retourne sur la page index.php en affichant un message
     */
    if (empty($_POST['message'])) {
        $flashMessage->setFlashMessage('Vous devez laisser un message merci');

        header('Location: index.php');
        exit();
    }

    $email = $_POST['email'];
    $message = $_POST['message'];

    // La fonction filter_var permet de vérifier la bonne syntaxe de l'email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $data['email'] = $email;
        $data['message'] = $message;

        $model->create($data);

        $flashMessage->setFlashMessage('Merci pour votre message et à bientôt');

        header('Location: index.php');
        exit();
    }
}

include 'show.php';