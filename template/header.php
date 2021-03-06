<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--  Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!--  My Custom Styles  -->
    <link rel="stylesheet" href="css/style.css">
    <title>Blogs</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="index.php">Blogs</a>

        <div class="d-flex">
            <button class="navbar-toggler mr-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <?php
                    if (isset($_SESSION['usersUid'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='add_blog.php'>Add Blog</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='includes/logout.inc.php'>Logout</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='sign_up.php'>Sign Up</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='sign_in.php'>Sign In</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</nav>
