<?php
$servername = "localhost";
$id = "root";
$location = "";
$dbname = "potatoTomato";

$connection = new mysqli($servername, $id, $location, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>