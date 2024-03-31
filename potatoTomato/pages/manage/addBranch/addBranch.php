<?php

include ($_SERVER['DOCUMENT_ROOT'] . '/potatotomato/pages/connection/connection.php');

session_start();

if (!$_SESSION["authentication"]) {
    header("Location: /potatotomato/pages/manage/login/login.php");
    exit();
}

$id = "";
$location = "";
$photo = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["name"];
    $location = $_POST["location"];
    $photo = $_POST["imageUrl"];

    if (empty($id) || empty($location) || empty($photo)) {
        $errorMessage = "Fill in all the fields";
    } else {
        $sql = "INSERT INTO branches (name, location, imageUrl)
                        VALUES ('$id', '$location', '$photo')";

        $result = $connection->query($sql);

        if ($result) {
            $successMessage = "Registered with success";

            $id = "";
            $location = "";
            $photo = "";

            header("location: /potatotomato/pages/manage/dashboard/dashboard.php");


        } else {
            die("Connection error: " . $connection->error);
        }
    }
}
?>