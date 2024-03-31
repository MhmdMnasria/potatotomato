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
        <nav>
            <a href="/potatotomato/pages/manage/login/login.php">Manage</a>
            <a href="/potatotomato/pages/contact/contact.php">Contact Us</a>
        </nav>
    </header>
    <div class="apply">
        <p>- want to apply ?</p>
        <br>
        <h4 style="color:white;font-weight:400;padding-right:20px;">
            To apply for a job with us, start by browsing our available positions on our
            page and carefully review the job descriptions to find the best fit. Update your resume
            and craft a concise cover letter expressing your interest and qualifications. Once
            ready, click <span style="font-weight:550;;color: dodgerblue "> "Join Our Team" </span> for your chosen
            position and complete the online application
            form, ensuring all information is accurate. Upload your resume and cover letter, then
            submit your application. Afterward, expect a confirmation email acknowledging receipt
            of your application, which may include further instructions. If you don't hear back
            within a reasonable timeframe, consider a polite follow-up with our HR department.
            We appreciate your interest and wish you the best of luck with your application!
        </h4>
        <a class="join-btn" type="button" href="/potatotomato/pages/application/application.php">join our team</a>

    </div>
    <hr>
    <center>
        <h1> list of employees</h1>
    </center>

    <div class="container">
        <center>
            <table>
                <thead>
                    <tr>
                        <th style="width:200px;">photo</th>
                        <th>name</th>
                        <th>position</th>
                        <th>salary</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $photo = $_GET['id'];
                    $sql = "SELECT id, name, position, salary, imageUrl FROM employees WHERE branchId = $photo";
                    $result = $connection->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        echo
                            "
                                <tr>
                                    <td>
                                        <img src='$row[imageUrl]' alt='employee image'>
                                    </td>
                                    <td  class='data-text'>$row[name]</td>
                                    <td  class='data-text'>$row[position]</td>
                                    <td  class='data-text'>$$row[salary]</td>
                                    <td><a type='button' href='/potatotomato/pages/profile/profile.php?id=$row[id]' class='view-profile-btn'>View Profile</a></td>
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