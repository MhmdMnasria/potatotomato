<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/potatotomato/pages/connection/connection.php');
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
        <h1>Employee Profile</h1>
        <?php
        $photo = $_GET['id'];
        $sql = "SELECT * FROM employees WHERE id = $photo";
        $result = $connection->query($sql);
        $product = $result->fetch_assoc();

        $sql2 = "   SELECT branches.name
                        FROM employees
                        JOIN branches ON employees.branchId = branches.id
                        WHERE employees.id = $photo;
                    ";

        $result2 = $connection->query($sql2);
        $branchName = $result2->fetch_assoc()["name"];
        echo "
                <div class='profile'>
                    <img src='$product[imageUrl]' alt='Employee Image'>
                    <div class='detail'>
                        <h2>Name: $product[name]</h2><br>
                        <p>Position: $product[position]</p><br>
                        <p>Salary:<span class='highlight'></span> $$product[salary]</p><br>
                        <p>Since: <span class='highlight'></span>$product[hireDate]</p><br>
                        <p>Branch: <span class='highlight'></span>$branchName</p>
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