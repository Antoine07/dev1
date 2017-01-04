<?php

/**
 *  Classe métier permettant de réaliser le projet
 *
 * Class Calculator
 */
class Calculator {

    private $memory = false;
    private $precision = null;

    /**
     *  __constructeur permet de définir une valeur à l'instanciation de la classe
     *
     *  On peut également assigner une valeur par défaut à la valeur $precision, ce paramètre devient alors
     *  facultatif
     *
     * Calculator constructor.
     * @param int $precision
     */
    public function __construct(int $precision = 1) {
        $this->precision = $precision;

        session_start();

        if ( empty($_SESSION['result']) )
            $_SESSION['result'] = 0;

        if (empty($_SESSION['memory'])) $_SESSION['memory'] = false;

        $this->memory = $_SESSION['memory'];
    }

    public function mul(float $a, float $b) {

        if ($this->memory) {
            $this->setResult(($a * $b));

            return $this->result();
        }

        return round(($a * $b), $this->precision);

    }

    public function sub(float $a, float $b) {

        $res = $a - $b;

        if ($this->memory) {
            $this->setResult($res);

            return $this->result();
        }

        return round($res, $this->precision);
    }

    public function add(float $a, float $b) {

        $res = $a + $b;

        if ($this->memory) {
            $this->setResult($res);

            return $this->result();
        }

        return round($res, $this->precision);
    }

    public function avg(array $numbers) {

        $count = count($numbers);

        /*
         * On lance une exception si $count vaut zéro, les exceptions sont largement utilisées en Objet
         * pour gérer les erreurs/exceptions dans le code. En effet, une application Objet comporte bcp de classes
         * il faut donc une technique pour faire remonter les erreurs/exceptions de manière simple et unique.
         */
        if (!$count) throw new Exception('Division by zero.');

        $avg = (array_sum($numbers) / $count);

        return round($avg, $this->precision);

    }

    public function setMemory(bool $m) {

        $_SESSION['memory'] = $m;

        $this->memory = $m;

    }

    private function setResult(float $res) {

        $_SESSION['result'] += $res;

    }

    public function result() {
        return round(($_SESSION['result']), $this->precision);
    }

    public function reset() {

        $_SESSION = null;
    }

    public function isMemory() {

        if (empty($_SESSION['memory'])) return false;

        return $_SESSION['memory'];
    }

}