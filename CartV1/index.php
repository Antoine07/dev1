<?php
/**
 * Initialisation du projet
 */

require_once __DIR__ . '/Product.php';
require_once __DIR__ . '/Bike.php';
require_once __DIR__ . '/StorageBike.php';

/**
 * Variables
 */
$storage = new StorageBike();

/**
 * On récupère l'ensemble des message dans le fichier dans une variable $products
 */
$products = $storage->load();

/**
 * Vue
 */
include 'show.php';