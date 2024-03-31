<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/potatotomato/pages/connection/connection.php');

session_start();

if (!$_SESSION["authentication"]) {
    header("Location: /potatotomato/pages/manage/login/login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Employee Profile</title>
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
    <div class="container">
        <h1>Applicants resume</h1>
        <?php
        $photo = $_GET['id'];
        $sql = "SELECT * FROM applicants WHERE id = '$_GET[id]'";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        $sql2 = "   SELECT branches.name
                        FROM applicants
                        JOIN branches ON applicants.branchId = branches.id
                        WHERE applicants.id = $photo;
                    ";

        $result2 = $connection->query($sql2);
        $branchName = $result2->fetch_assoc()["name"];
        echo "
                <div class='profile'>
                    <img src='$row[imageUrl]' alt='Employee Image'>
                    <div class='detail'>
                        <h2>Name: $row[name]</h2><br>
                        <p>Email: $row[email]</p><br>
                        <p>Phone Number:<span class='highlight'></span> $row[phone]</p><br>
                        <p>applied Since: <span class='highlight'></span>$row[applicationDate]</p><br>
                        <p>Branch ID: <span class='highlight'></span>$row[branchId] ($branchName)</p><br>
                        <p>Message: <span class='highlight'>$row[message]</span></p><br>
                        <a type='button' href='/potatotomato/pages/manage/accept/accept.php?id=$row[id]' class='view-profile-btn' style='background-color: limegreen;'>accept</a>
                        <a type='button' href='/potatotomato/pages/manage/reject/reject.php?id=$row[id]' class='view-profile-btn' style='background-color: red;'>reject</a>
                    </div>
                </div>
            ";
        ?>
        <br>
    </div>
    <footer>
        <p>Credits: Mohamed Mnasria &copy; 2024</p>
    </footer>
</body>

</html>