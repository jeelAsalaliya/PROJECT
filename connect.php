<?php

$server_name = "localhost";
$username = "root";
$db_name = "jkl";
$password = "";

//$conn = mysqli_connect($server_name, $username, $password, $db_name);
$conn = mysqli_connect('localhost', 'root', '', 'jkl');
if (!$conn) {
    echo "not connected";
} else {
    echo "Connected successfully!";
}
