<?php

class Model {

    private $pdo;

    public function __construct(array $database) {

        /**
         * On détermine les options à passer à PDO,
         * connexion en utf-8 avec la base de données entre PHP et MySQL
         * On demande à PDO de nous remonter les erreurs MySQL
         * Et on demande d'afficher les résultats en objets
         */
        $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // flux en utf8
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // mysql erreurs remontées
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // données dans des objetds
        ];

        $this->pdo = new PDO(
                $database['dns'],
                $database['username'],
                $database['password'], $options);
    }

    public function create(array $data) {

        $stmt = $this->pdo->prepare('
            INSERT INTO notes (email, message) VALUES (?, ?)
            ');

        $stmt->bindValue(1, $data['email'], PDO::PARAM_STR);
        $stmt->bindValue(2, $data['message'], PDO::PARAM_STR);

        $stmt->execute();
    }

}