<?php

class FlashMessage {

    public function __construct() {
        /**
         * On vérifie que les sessions sont activés par défaut en PHP elles ne le sont pas
         * Si la variable $_SESSION n'existe pas on active celle-ci sinon rien
         */
        if (!isset($_SESSION)) session_start();
    }

    /**
     * Méthode qui permet de définir un message flash
     *
     * @param $message
     * @param string $priority
     */
    public function setFlashMessage($message, $priority = 'success') {

        $_SESSION['flashMessage'] = [
                'message'  => $message,
                'priority' => $priority
        ];

    }

    public function getFlashMessage() {

        /**
         * Dans le cas où il n'y a pas de message à afficher on sort de la méthode
         */
        if (empty($_SESSION['flashMessage'])) return;

        /**
         * Si on arrive ici c'est qu'il y a un message a afficher, on l'affiche et on réinitialise
         * la variable flashMessage puis on retourne celle-ci dans le script courant
         */
        $message = $_SESSION['flashMessage'];

        $_SESSION['flashMessage'] = [];

        return $message;
    }

}