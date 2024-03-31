<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/potatotomato/pages/connection/connection.php');

$id = "";
$salary = "";
$email = "";
$message = "";
$branchId = "";
$photo = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["name"];
    $salary = $_POST["phone"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $branchId = $_POST["branchId"];
    $photo = $_POST["photo"];

    if (empty($id) || empty($salary) || empty($email) || empty($message) || empty($branchId) || empty($photo)) {
        $errorMessage = "Fill in all the fields";
    } else {
        $sql = "INSERT INTO applicants (name, email, phone, message, branchId, imageUrl)
                    VALUES ('$id', '$email', '$salary', '$message', '$branchId', '$photo')";

        $result = $connection->query($sql);

        if ($result) {
            $successMessage = "Registered with success";

            $id = "";
            $salary = "";
            $email = "";
            $message = "";
            $branchId = "";
            $photo = "";

            header("location: /potatotomato/pages/main/index.php");


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

    <h1 class="title">Job application</h1>
    <?php
    if ($errorMessage) {
        echo "<h1 class='title error' style='color:rgb(244, 234, 212)'>$errorMessage...</h1>";
    }
    ?>
    <div class="container">
        <form action="application.php" method="post">
            <label>Full Name</label>
            <input type="text" class="input" name="name" value="<?php echo $id ?>">
            <label>Phone Number</label>
            <input type="text" class="input" name="phone" value="<?php echo $salary ?>">
            <label>Email</label>
            <input type="text" class="input" name="email" value="<?php echo $email ?>">
            <label>Message</label>
            <textarea class="input" name="message"><?php echo $message ?></textarea>


            <label>Branch Id</label>
            <input list="branchId" name="branchId">
            <datalist id="branchId">
                <?php
                $sql = "SELECT id ,name FROM branches";
                $result = $connection->query($sql);

                if (!$result) {
                    die("connection error: " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "<option value='$row[id]'>$row[name]</option>";
                }

                ?>
            </datalist>


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