<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/potatotomato/pages/connection/connection.php');

session_start();

if (!$_SESSION["authentication"]) {
    header("Location: /potatotomato/pages/manage/login/login.php");
    exit();
}

error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

$sql = "DELETE FROM applicants WHERE id='$_GET[id]'";
$result = $connection->query($sql);
if (!$result) {
    die("error: " . $connection->error);
}

header("location: /potatotomato/pages/manage/dashboard/dashboard.php");

exit();

?>