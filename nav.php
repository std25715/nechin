<?php
    include_once "_oop.php";
    $db = new db();
    session_start();
    $login_bar = "";
    $balance = 0;
    if(isset($_SESSION["login"])){
        $username = $_SESSION["username"];
        $login_status = $_SESSION["login"];
        if($login_status = 1){
            if($row = $db->sel("select balance from user where username = '$username'")){
                if($row = $db->res->fetch_assoc()){
                    $balance = $row["balance"];
                }
            }
            else{
                echo "error";
            }
            $login_bar = "
            <a href=\"topup.php\" class=\"btn btn-light\">$.$balance</a>
            <a href=\"index.php\" class=\"btn btn-dark\">$username</a>
            <a href=\"logout.php\" class=\"btn btn-danger\">Logout</a>";

        }
        else{
            $login_bar = '<a href="login.php" class="btn btn-primary">Login</a>
            <a href="register.php" class="btn btn-success">Register</a>';
        }
    }
    else{
        $login_bar = '<a href="login.php" class="btn btn-primary">Login</a>
            <a href="register.php" class="btn btn-success">Register</a>';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>NechinShop</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <style>
    body {
        font-family: 'Kanit', sans-serif;
        background-color: #20141c;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-purple">
        <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="" width=70px height=auto></a>
        <button class="navbar-toggler c-white" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="store.php">Store</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="topup.php">Topup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="history.php">History</a>
                </li>
            </ul>
            <form class="d-flex">
                <?=$login_bar?>
            </form>
        </div>
    </nav>
</body>

</html>