<?php

class Bike extends Product {

    private $color;
    protected $type = '1001';

    public function __construct($name, $price, $color) {
        parent::__construct($name, $price);

        $this->setColor($color);
    }

    /**
     * @return string
     */
    public function getColor() {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color) {
        $this->color = $color;
    }

}