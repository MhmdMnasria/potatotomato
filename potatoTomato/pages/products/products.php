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
        <div class="currency">
            <h3>select currency</h3>
            <form action="products.php" method="GET" onsubmit="setCurrency()">
                <input hidden name="id" value="<?php echo $_GET["id"] ?>">
                <input list="currency" id="selectedCurrency" name="currency" required>
                <datalist id="currency">
                    <?php
                    $sql = "SELECT DISTINCT country FROM coefficients ORDER BY country ASC";
                    $result = $connection->query($sql);

                    if (!$result) {
                        die("connection error: " . $connection->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='$row[country]'></option>";
                    }
                    ?>
                </datalist>
                <button type="submit" class="curr-btn">Change</button>
            </form>

            <script>
                function setCurrency() {
                    var selectedCurrency = document.getElementById('selectedCurrency').value;
                    document.getElementById('currency').value = selectedCurrency;
                }
            </script>
        </div>
        <nav>

            <a href="/potatotomato/pages/manage/login/login.php">Manage</a>
            <a href="/potatotomato/pages/contact/contact.php">Contact Us</a>
        </nav>
    </header>
    <div class="apply">
        <p style="color:bisque;">- How to add a product ?</p>
        <br>
        <h4 style="color:white;font-weight:400;padding-right:20px;">

            To add a product to our inventory, begin by thoroughly exploring our existing
            product range to grasp our brand identity and market positioning. Next, conduct
            meticulous market research to pinpoint potential niches or gaps in our offerings,
            considering customer preferences and competitor analysis. Collaborate closely
            with product development teams to conceptualize and refine the new product,
            emphasizing quality and innovation. Prioritize rigorous testing and validation
            to ensure the product meets our high standards and complies with relevant
            regulations. Once ready for launch, coordinate marketing efforts to effectively
            promote the new product and maximize its impact. We appreciate your dedication to
            enhancing our inventory and look forward to the success of your addition. click on <span
                style="font-weight:550;;color: dodgerblue "> "add a product" </span> to add your product.
        </h4>
        <a class="join-btn" type="button"
            href="/potatotomato/pages/addProduct/addProduct.php?id=<?php echo $_GET["id"] ?>">add a product</a>

    </div>
    <hr>
    <center>
        <h1> list of Products</h1>
    </center>

    <div class="container">
        <center>
            <table>
                <thead>
                    <tr>
                        <th style="width:200px;">photo</th>
                        <th>name</th>
                        <th>price</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $photo = $_GET['id'];
                    $sql = "SELECT id, imageUrl, name, price FROM products 
                            WHERE branchId = $photo";

                    $result = $connection->query($sql);


                    $coef = 1;
                    $symbol = "$";
                    if (isset($_GET["currency"])) {
                        $curr = $_GET["currency"];
                        $sql2 = "SELECT coef, symbol FROM coefficients WHERE country = '$curr'";
                        $result2 = $connection->query($sql2);
                        $row2 = $result2->fetch_assoc();
                        $coef = $row2["coef"];
                        $symbol = $row2["symbol"];
                    }

                    while ($row = $result->fetch_assoc()) {

                        $photo = number_format($row["price"] * $coef, 2, '.', '');
                        echo
                            "
                                <tr>
                                    <td>
                                        <img src='$row[imageUrl]' alt='employee image'>
                                    </td>
                                    <td  class='data-text'>$row[name]</td>
                                    <td  class='data-text'>$symbol $photo</td>
                                    <td><a type='button' href='/potatotomato/pages/productProfile/productProfile.php?id=$row[id]' class='view-profile-btn'>View Product</a></td>
                                </tr>
                            ";
                    }
                    ?>
                </tbody>
            </table>
        </center>
    </div>

    <footer>
        <p>Credits: Mohamed Mnasria &copy; 2024</p>
    </footer>
</body>

</html>