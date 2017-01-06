<?php 

exec('mysql --user=root --password= --database db_monster -e"SELECT COUNT(*) FROM kermits"', $o);

echo '<pre>';
print_r($o);
echo '</pre>';

// si $output exist et vaut 0 alors il est temps d'envoyer le script mettre des données dans la base
if(empty($o))
	exec('mysql --user=root --password= < install.sql', $output) ;

require_once 'DB.php';
require_once 'Kermit.php';

$database = [
    'dns' => 'mysql:host=localhost;dbname=db_monster',
    'username' => 'root',
    'password' => ''
];

$options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // flux en utf8
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // mysql erreurs remontées
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // données dans des objetds
];

$db = new DB($database, $options);

$pdo = $db->get();

// model

// injection de PDO dans le modèle Kermit
$kermit = new Kermit($pdo);

echo '<pre>';
print_r($kermit->all());
echo '</pre>';

echo '<pre>';
print_r($kermit->find(1));
echo '</pre>';