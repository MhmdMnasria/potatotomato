<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/potatotomato/pages/connection/connection.php');

session_start();

if (!$_SESSION["authentication"]) {
    header("Location: /potatotomato/pages/manage/login/login.php");
    exit();
}

$sql = "SELECT * FROM employees WHERE id = '$_SESSION[id]'";
$result = $connection->query($sql);


$row = $result->fetch_assoc();

if (!$row["name"]) {
    session_destroy();
    header("Location: /potatotomato/pages/manage/login/login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>dashboard</title>

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

                    <a href="/potatotomato/pages/manage/deleteBranch/deleteBranch.php" class="dso">remove Branch</a><br>

                    <a href="/potatotomato/pages/manage/addManager/addManager.php" class="dso">add manager</a><br>
                    <a href="/potatotomato/pages/manage/deleteManager/deleteManager.php" class="dso">remove
                        manager</a><br>
                    <a href="/potatotomato/pages/manage/logout/logout.php" class="dso">logout</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <section class="applicants1">
            <h1>Manage applicants</h1>

            <table>
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Branch</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT id, imageUrl, name, branchId FROM applicants";

                    $result = $connection->query($sql);

                    if (!$result) {
                        die("error: " . $connection->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo "
                            <tr>
                                <td>
                                    <img src='$row[imageUrl]'>
                                </td>
                                <td class='data-text'>$row[name]</td>
                                <td class='data-text'>$row[branchId]</td>
                                <td><a type='button' href='/potatotomato/pages/manage/applicant/applicant.php?id=$row[id]' class='view-profile-btn'>View applicant</a></td>
                            </tr>
                            ";
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <section class="applicants2">
            <h1>Add a branch</h1>

            <form action="/potatotomato/pages/manage/addBranch/addBranch.php" method="post">
                <label>Branch Name</label>
                <input type="text" name="name">

                <label>Branch Location</label>
                <input type="text" name="location">

                <label>Image Url</label>
                <input type="text" name="imageUrl">


                <div class="buttons">
                    <button type="submit">Submit</button>
                    <button type="reset">Cancel</button>
                </div>
            </form>

        </section>
    </div>

    <footer>
        <p>Credits: Mohamed Mnasria &copy; 2024</p>
    </footer>

</body>

</html>