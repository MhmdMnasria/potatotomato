<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/potatotomato/pages/connection/connection.php');

session_start();

if (isset($_SESSION["authentication"])) {
    header("Location: /potatotomato/pages/manage/dashboard/dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["user"];
    $location = $_POST["pass"];


    $sql = "SELECT * FROM managers WHERE username = '$id' AND passcode = '$location'";
    $result = $connection->query($sql);

    if ($row = $result->fetch_assoc()) {
        $_SESSION["authentication"] = true;
        $_SESSION["username"] = $id;
        $_SESSION["id"] = $row["employeeId"];
        mail("mhmdmnasria@gmail.com", "logged in", "logged in potato tomato");
        header("location: /potatotomato/pages/manage/dashboard/dashboard.php");

    } else {
        echo "<script>alert('incorrect username or password ');</script>";
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>

<body>
    <header>
        <a href="/potatotomato/pages/intro/">
            <img src="/potatotomato/assets/logomini.jpg" alt="logo">
        </a>
        <nav>
            <a href="/potatotomato/pages/manage/login/login.php">Manage</a>
            <a href="/potatotomato/pages/contact/contact.php">Contact Us</a>
        </nav>
    </header>

    <h1>Login Form</h1>
    <div class="container">
        <form action="login.php" onsubmit="return verif()" method="post">
            <div class="">

                <label>Username</label>
                <input type="text" class="input" name="user">

                <label>Password</label>
                <input type="password" class="input" name="pass">
            </div>


            <input type="submit" value="login">
        </form>
    </div>
    <footer>
        <p>Credits: Mohamed Mnasria &copy; 2024</p>
    </footer>
</body>

</html>