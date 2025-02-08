<?php
include 'connect.php';

// $conn = mysqli_connect($servername, $username, $db_name, $password);

if (mysqli_connect_error()) {
    echo "Cannot Connect";
}

echo "connect";
