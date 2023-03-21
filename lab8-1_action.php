<?php
$fn;
$key;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fn = $_POST['firstname'];
    $key = $_POST['key'];
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $fn = $_GET['firstname'];
    $key = $_GET['key'];
}

$file = file('data.txt') or die("ERROR: Cannot Find file");
$delimiter = ',';

if (isset($fn) && isset($key) && $fn != '' && $key != ''){
    foreach ($file as $line) {
        $array = explode($delimiter, $line);
        $lineKey = $array[0];
        $lineName = $array[1];
        $lineText = $array[2];
        $lineImg = $array[3];

        if (strcasecmp($fn, $lineName) == 0 && strcasecmp($key, $lineKey) == 0) {
            echo '<h1>'.$lineText.'</h1>
                <figure>
                    <img src="'.$lineImg.'">
                    <figcaption>'.$lineText.'</figcaption>
                </figure>';
        }
    }

} else {
    die("ERROR: Fields are incomplete");
}

?>