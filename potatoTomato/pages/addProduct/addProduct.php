<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/potatotomato/pages/connection/connection.php');

$position = "";
$description = "";
$branchId = $_GET["id"];
$photo = "";
$price = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $position = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $photo = $_POST["photo"];

    if (empty($position) || empty($description) || empty($photo)) {
        $errorMessage = "Fill in all the fields";
    } else {
        $sql = "INSERT INTO products (name, description, branchId, imageUrl, price)
                    VALUES ('$position', '$description', '$branchId', '$photo', '$price')";

        $result = $connection->query($sql);

        if ($result) {
            $successMessage = "Registered with success";

            $position = "";
            $description = "";

            $photo = "";
            $price = "";

            header("location: /potatotomato/pages/branch/branch.php?id=$branchId");
            $branchId = "";

        } else {
            die("Connection error: " . $connection->error);
        }
    }
}
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

    <h1 class="title">Add A product</h1>
    <?php
    if ($errorMessage) {
        echo "<h1 class='title error' style='color:rgb(244, 234, 212)'>$errorMessage...</h1>";
    }
    ?>
    <div class="container">
        <form action="addProduct.php?id=<?php echo $branchId ?>" method="post">
            <label>Product Name</label>
            <input type="text" class="input" name="name" value="<?php echo $position ?>">
            <label>Price</label>
            <input type="text" class="input" name="price" value="<?php echo $price ?>">
            <label>describe the product</label>
            <textarea class="input" name="description"><?php echo $description ?></textarea>


            <label>Your Photo URL</label>
            <input type="text" class="input" name="photo" value="<?php echo $photo ?>">

            <div class="buttons">
                <button type="submit">Submit</button>
                <button type="reset">Cancel</button>
            </div>

        </form>
    </div>

    <footer>
        <p>Credits: Mohamed mnasria &copy; 2024</p>
    </footer>
</body>