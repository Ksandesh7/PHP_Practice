<?php

class Product {
    protected $name;
    protected $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getSummary() {
        return "Product: {$this->name}, Price: ₹{$this->price}";
    }

    public function getPrice() {
        return $this->price;
    }

    public function getName() {
        return $this->name;
    }

    public function __destruct() {
        // echo "Product '{$this->name}' destroyed.</br>";
    }
}

?>