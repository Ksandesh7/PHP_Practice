<?php

$contacts = [
    ['name'=>'Alice Johnson', 'email'=>'alice@example.com', 'phone'=>'123-456-7890'],
    ['name'=>'Bob Smith', 'email'=>'bob@example.com','phone'=> '987-654-3210'],
    ['name'=>'Charlie Brown', 'email'=>'charlie@example.com','phone'=> '555-555-5555'],
];

echo "Total contacts: " . count($contacts) . "<br>";
$names = array_column($contacts, 'name');
sort($names);
echo "Sorted names:" . implode(", ", $names) . "<br><br>";


function displayContactCard($contacts) {
    echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px; width: 300px;'>";
    echo "<strong>Name: </strong> " . $contacts['name'] . "<br>";
    echo "<strong>Email: </strong> " . $contacts['email'] . "<br>";
    echo "<strong>Phone: </strong> " . $contacts['phone'] . "<br>";
    echo "</div>";
}

foreach($contacts as $contact) {
    displayContactCard($contact);
}

?>