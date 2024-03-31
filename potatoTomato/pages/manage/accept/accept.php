<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/potatotomato/pages/connection/connection.php');

session_start();

if (!$_SESSION["authentication"]) {
    header("Location: /potatotomato/pages/manage/login/login.php");
    exit();
}

error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
$id = "";
$salary = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $photo = $_GET["id"];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["position"];
    $salary = $_POST["salary"];
    $photo = $_POST["id"];

    if (empty($id) || empty($salary)) {
        $errorMessage = "Fill in all the fields";
    } else {

        $sql = "SELECT * FROM applicants WHERE id = '$photo'";

        $result = $connection->query($sql);
        $row = $result->fetch_assoc();


        $sql2 = "INSERT INTO employees (name, position, salary, branchId, imageUrl)
                    VALUES ('$row[name]', '$id', '$salary', '$row[branchId]', '$row[imageUrl]')";

        $result2 = $connection->query($sql2);

        if ($result2) {
            $successMessage = "Registered with success";

            $id = "";
            $salary = "";

            header("location: /potatotomato/pages/manage/dashboard/dashboard.php");

        } else {
            die("Connection error: " . $connection->error);
        }

        $sql3 = "DELETE FROM applicants WHERE id='$photo'";
        $result3 = $connection->query($sql3);
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

    <h1 class="title">Job application</h1>
    <?php
    if ($errorMessage) {
        echo "<h1 class='title error' style='color:rgb(244, 234, 212)'>$errorMessage...</h1>";
    }
    ?>
    <div class="container">
        <form action="accept.php" method="post">
            <input name="id" id="id" type="text" hidden value=<?php echo $photo ?>>
            <label>Position</label>
            <input type="text" class="input" name="position" value="<?php echo $id ?>">
            <label>Salary</label>
            <input type="text" class="input" name="salary" value="<?php echo $salary ?>">

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