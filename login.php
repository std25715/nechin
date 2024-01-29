<?php
    include "nav.php";
    $err_login = "";
    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        if($db->sel("select * from user where username='$username'") AND $db->sel("select * from user where password='$password'")){
            session_start();
            $_SESSION["login"] = 1;
            $_SESSION["username"] = $username;
            echo "<script>alert('Login Success !');</script>";
            echo "<script type='text/javascript'>document.location='index.php'</script>";
        }
        else{
            $err_login = "Username or Password Incorrect !";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <section>
        <div class="container mt-5 pt-5 pb-5">
            <div class="row">
                <div class="col-12 col-sn-8 col-nd-6">
                    <div class="card">
                        <h1>Login</h1>
                        <div class="card-body">
                            <form action="" method="post">
                                <input type="text" name="username" id="" class="form-control my-4 py-2"
                                    placeholder="Username">
                                <input type="password" name="password" id="" class="form-control my-4 py-2"
                                    placeholder="Password">
                                <div class="error-message"><?php echo "$err_login"?></div>
                                <div class="text-center mt-3">
                                    <input class="btn btn-purple" type="submit" value="Login" name="login">
                                    <a href="register.php" class="nav-link">Don't have an account ?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>