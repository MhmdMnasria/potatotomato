<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/potatotomato/pages/connection/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Product Details</title>
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
        <h1>Product Details</h1>
        <?php
        $photo = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id = $photo";
        $result = $connection->query($sql);
        $product = $result->fetch_assoc();

        echo "
                <div class='profile'>
                    <img src='$product[imageUrl]' alt='Employee Image'>
                    <div class='detail'>
                        <h2>Name: $product[name]</h2><br>
                        <p>Price:<span class='highlight'></span> $$product[price]</p><br>
                        <p>description: <span class='highlight'>$product[description]</span></p><br>
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