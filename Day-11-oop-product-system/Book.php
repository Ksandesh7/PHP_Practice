<?php 

require_once "Product.php";

class Book extends Product {
    private $author;

    public function __construct($name, $price, $author) {
        parent::__construct($name, $price);
        $this->author = $author;
    }

    public function getSummary() {
        return "📘 Book: {$this->name} by {$this->author}, ₹{$this->price}";
    }
}

?>