<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/potatotomato/pages/connection/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/d54f5cee2c.js" crossorigin="anonymous"></script>
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
    <h1 class="title">Me :)</h1>
    <div class="container">
        <img class="cj" src="/potatotomato/assets/photo.jpeg">
        <div class="links">
            <a target="_blank" href="https://www.facebook.com/MhmdMnasria/"><i
                    class="fa-brands fa-facebook face"></i></a>
            <a target="_blank" href="https://www.instagram.com/mhmdmnasria_dev/"><i
                    class="fa-brands fa-instagram insta"></i></a>
            <a target="_blank" href="https://github.com/MhmdMnasria"><i class="fa-brands fa-github git"></i></a>
            <a target="_blank" href="mailto:mhmdmnasria@gmail.com"><i class="fa-brands fa-google"></i></a>
        </div>
    </div>
    <footer>
        <p>Credits: Mohamed Mnasria &copy; 2024</p>
    </footer>
</body>

</html>