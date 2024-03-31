<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/potatotomato/pages/connection/connection.php');
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
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
    <center>
        <h1 style="margin: 15px 0 15px 0;color: rgb(103, 34, 34);">Best employees</h1>
    </center>
    <div class="employee">
        <?php
        $photo = $_GET["id"];
        $employeeSql = "SELECT * FROM employees WHERE branchId = $photo ORDER BY salary DESC LIMIT 3";
        $employeeResult = $connection->query($employeeSql);
        while ($row = $employeeResult->fetch_assoc()) {
            echo
                " 
                    <article>
                        <div class='card'>
                            <img src='$row[imageUrl]' alt='employee photo' width='100%' height='auto'>
                            
                        </div> 
                        <div class='titles'>
                            <h2>$row[name]</h2>
                            <a type='button' href='/potatotomato/pages/profile/profile.php?id=$row[id]' class='view-profile-btn'>View Profile</a>
                        </div>
                    </article>
                ";
        }
        ?>
    </div>

    <?php
    echo "<center><a type='button' href='/potatotomato/pages/employees/employees.php?id=$photo' class='view-employees'>View All Employees</a></center>";
    ?>

    <br><br>
    <hr><br><br><br><br>

    <center>
        <h1 style="margin: 15px 0 15px 0;color: rgb(103, 34, 34);">Best product</h1>
    </center>
    <div class="product">
        <?php
        $productSql = " SELECT * FROM products 
                            WHERE branchId = $photo
                            ORDER BY products.price DESC
                            LIMIT 1";

        $productResult = $connection->query($productSql);
        if ($productRow = $productResult->fetch_assoc()) {
            echo
                "
                <center>
                    <div class='card'>
                        <img src=' $productRow[imageUrl] ' alt='product photo' width='100%' height='auto'>
                    </div>
                    <div class='titles'>
                        <h1> $productRow[name]</h1>
                        <h2>$ $productRow[price]</h2>
                    </div>
                </center>
                ";
        } else {
            echo "<br><br><br><br><center><h1 style='margin: 15px 0 15px 0;color: #3e391e;font-size:1.2em;'>sorry no products left ...</h1></center><br><br><br><br>";
        }
        echo "<center><a type='button' href='/potatotomato/pages/products/products.php?id=$photo' class='view-employees'>View All Products</a></center>";
        ?>
        <br>
    </div>

    <footer>
        <p>Credits: Mohamed Mnasria &copy; 2024</p>
    </footer>
</body>

</html>