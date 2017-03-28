<?php
$mysqli = new mysqli("localhost", "root", "root", "cb");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
    $mysqli2 = new mysqli("localhost", "root", "root", "cb");
    if ($mysqli2->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli2->connect_error;
    }
    $mysqli3 = new mysqli("localhost", "root", "root", "cb");
    if ($mysqli3->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli3->connect_error;
    }

$mysqli->set_charset("utf8");

$mysqli2->set_charset("utf8");

$mysqli3->set_charset("utf8");
?>
