<?php
echo "Hello, World!<br>";

function sayHello($name) {
    return "Hello, $name!<br>";
}

$name = "John Doe";
sayHello($name);
echo "Original name: $name<br>";

function changeName(&$name) {
    $name = "Jane Doe";
}

changeName($name);
echo "Changed name: $name<br>";
?>