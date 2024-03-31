<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/potatotomato/pages/connection/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Potato Tomato</title>
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
    <h1 class="title">Our Branches</h1>
    <div class="container">

        <?php

        $sql = "SELECT * FROM branches";
        $result = $connection->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo
                "
                    <a href='/potatotomato/pages/branch/branch.php?id=$row[id]'> 
                        <div class='card'>
                            <img src='$row[imageUrl]' alt='branch photo' width='100%' height='auto'>
                            <div class='titles'>
                                <h2><strong>Branch Name:</strong> $row[name]</h2>
                                <h3>Location :$row[location]</h3>
                                <h3>ID: $row[id]</h3>
                            </div>
                        </div>
                    </a>
                ";
        }
        ?>

    </div>
    <footer>
        <p>Credits: Mohamed Mnasria &copy; 2024</p>
    </footer>
</body>

</html>