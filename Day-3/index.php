<?php

$shortUrls = [];

function shortenUrl($url) {
    return substr(md5($url), 0, 6);
}

if($_SERVER["REQUEST_METHOD"]==="POST") {
    $original = trim($_POST['long_url']);
    if(!empty($original)) {
        $shortCode = shortenUrl($original);
        $shortUrls[$shortCode] = $original;

        echo "Printing ShortUrls array: <br>";
        print_r($shortUrls);

        echo "<p><strong>Original URL: </strong> $original</p>";
        echo "<p><strong>Shortened URL: </strong> <a href='?c=$shortCode'>http://localhost/practice/Day-3/?c=$shortCode</a></p>";
    }
}

if(isset($_GET['c'])) {
    $code = $_GET['c'];

    $sampleUrls = [
        'a1b2c3' => 'https://google.com',
        'd4e5f6' => 'https://openai.com'
    ];

    // array_push($sampleUrls, $code, 'https://openai.com');
    $sampleUrls[$code] = 'https://openai.com';

    print_r($sampleUrls);

    if(isset($sampleUrls[$code])) {
        $redirectTo = $sampleUrls[$code];
        echo "<script>window.location.href='$redirectTo';</script>";
        exit;
    }
    else {
        echo "<p style='color:red;'>Invalid or expired short URL.</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>URL Shortener</h2>
    <form action="" method="post">
        <label for="long_url">Enter Long URL: </label><br>
        <input type="text" name="long_url" id="long_url" style="width:300px;" required>
        <br><br>
        <button type="submit">Shorten</button>
    </form>
</body>
</html>