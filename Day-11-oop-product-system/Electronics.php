<?php

require_once "Product.php";

class Electronics extends Product {
    private $brand;

    public function __construct($name, $price, $brand) {
        parent::__construct($name, $price);
        $this->brand = $brand;
    }

    public function getSummary() {
        return "🔌 Electronics: {$this->name} ({$this->brand}), ₹{$this->price}";
    }
}

?>