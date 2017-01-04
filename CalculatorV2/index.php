<?php
/**
 * Init project Calculatrice V.1
 */
require_once 'Calculator.php';

$precision = 2;

$calculator = new Calculator($precision);

$result = null;

$memory = $calculator->isMemory();

if (!empty($_POST)) {

    $memory = !empty($_POST['memory'])? true : false;


    if(!$memory){
        $calculator->reset();
    }

    $calculator->setMemory($memory);

    if (!empty($_POST['calOne'])) {
        $numberOne = (float) $_POST['numberOne'];
        $numberTwo = (float) $_POST['numberTwo'];

        $operator = $_POST['operator'];

        switch ($operator) {

            case 'add':
                $result = $calculator->add($numberOne, $numberTwo);

                break;

            case 'mul':
                $result = $calculator->mul($numberOne, $numberTwo);
                break;

            case 'sub':
                $result = $calculator->sub($numberOne, $numberTwo);
                break;

            default:
                $result = 'je ne connais pas cet opérateur';

        }

    }

    if (!empty($_POST['calTwo'])) {

        $avg = $_POST['avg'];

        if (!empty($avg)) {
            $numbers = explode(',', $avg);

            $avg = $calculator->avg($numbers);

            $result = "Moyenne: $avg";
        }
    }

}

include 'show.php';