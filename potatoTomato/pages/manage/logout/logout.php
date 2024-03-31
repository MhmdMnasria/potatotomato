<?php

session_start();
session_destroy();
header("location: /potatotomato/pages/manage/login/login.php");
exit();

?>