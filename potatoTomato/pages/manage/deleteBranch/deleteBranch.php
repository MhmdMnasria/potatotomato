<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/potatotomato/pages/connection/connection.php');

session_start();

if (!$_SESSION["authentication"]) {
    header("Location: /potatotomato/pages/manage/login/login.php");
    exit();
}

$id = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    if (empty($id)) {
        $errorMessage = "Fill in all the fields";
    } else {

        $sql = "DELETE managers 
        FROM managers 
        JOIN employees ON managers.employeeId = employees.id
        WHERE employees.branchId = '$id'";
        $result = $connection->query($sql);

        $sql = "DELETE FROM employees WHERE branchId = '$id'";
        $result = $connection->query($sql);

        $sql = "DELETE FROM products WHERE branchId = '$id'";
        $result = $connection->query($sql);



        $sql = "DELETE FROM branches WHERE id = '$id'";

        $result = $connection->query($sql);

        if ($result) {
            $successMessage = "Registered with success";

            $id = "";

            header("location: /potatotomato/pages/manage/login/login.php");


        } else {
            die("Connection error: " . $connection->error);
        }
    }
}


$sql = "SELECT * FROM employees WHERE id = '$_SESSION[id]'";
$result = $connection->query($sql);

$row = $result->fetch_assoc();

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
            <div class="dropdown">
                <a href="#">menu</a>
                <div class="dropdown-content">
                    <a href="/potatotomato/pages/profile/profile.php?id= <?php echo $row["id"] ?>" class="dso">name
                        <br><span class='option'>
                            <?php echo $row["name"] ?> <br> ID:
                            <?php echo $row["id"] ?>
                        </span></a><br>
                    <a href="/potatotomato/pages/manage/addManager/addManager.php" class="dso">add manager</a><br>
                    <a href="/potatotomato/pages/manage/deleteManager/deleteManager.php" class="dso">remove
                        manager</a><br>

                    <a href="/potatotomato/pages/manage/dashboard/dashboard.php" class="dso">dashboard</a>
                    <a href="/potatotomato/pages/manage/logout/logout.php" class="dso">logout</a>
                </div>
            </div>
        </nav>
    </header>

    <h1 class="title">Remove Branch</h1>
    <?php
    if ($errorMessage) {
        echo "<h1 class='title error' style='color:rgb(244, 234, 212)'>$errorMessage...</h1>";
    }
    ?>
    <div class="container">
        <form action="deleteBranch.php" method="post">

            <label>Branch Id</label>
            <input list="id" name="id">
            <datalist id="id" name="id">
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