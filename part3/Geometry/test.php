<?php

require_once 'Point.php';
require_once 'Distance.php';
require_once 'Vector.php';

$p = new Point(4,6);
$q = new Point(3,2);

echo '<pre>';
print_r($p);
echo '</pre>';

echo '<pre>';
print_r($q);
echo '</pre>';

$distance = new Distance;

echo '<pre>';
print_r($distance->calcul($p, $q));
echo '</pre>';

$vector = new Vector($p,$q);

echo '<pre>';
print_r($vector->getVector());
echo '</pre>';

