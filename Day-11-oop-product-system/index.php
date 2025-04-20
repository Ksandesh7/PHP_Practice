<?php

require_once "Book.php";
require_once "Electronics.php";

$book1 = new Book("The Pragmatic Programmer", 599, "Andrew Hunt");
$phone = new Electronics("iPhone 13", 69999, "Apple");
$laptop = new Electronics("Dell XPS 13", 89999, "Dell");

echo $book1->getSummary(). "<br>";
echo $phone->getSummary(). "<br>";
echo $laptop->getSummary(). "<br>";

$total = $book1->getPrice() + $phone->getPrice() + $laptop->getPrice();

echo "<br><strong>Total Price: </strong> ₹$total";

?>