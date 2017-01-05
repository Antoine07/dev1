<?php

class Product {
    private $price;
    private $name;
    protected $type = null;

    public function __construct(string $name, float $price) {
        $this->setName($name);
        $this->setPrice($price);
    }

    /**
     * @return float
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price) {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name) {
        $this->name = $name;
    }

}