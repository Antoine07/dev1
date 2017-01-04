<?php

require_once 'Calculator.php';

$calculator = new Calculator;

$res = $calculator->add('10.0', '10.0');

var_dump($res);

$res = $calculator->mul(6.0, 7.0);

var_dump("6*7" . $res);

try {
    $calculator->add('foo', 4.0);

} catch (TypeError $e) {
    var_dump($e->getMessage());
}

$calculator->setMemory(true);

$calculator->mul(6.0, 7.0);

$calculator->add(10.0, 10.0);

var_dump("menory 6*7 + 10 +10" . $calculator->result());

