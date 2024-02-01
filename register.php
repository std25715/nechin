<?php
    include "nav.php";
    $err_username = "";

    if(isset($_POST["register"])){
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $role = "member";
        $balance = 0;
        if($db->sel("select * from user where username='$username'")){
            $err_username = "Username is already used !";
        }
        else{
            if($db->add("user","username,email,password,role,balance","'$username','$email','$password','$role','$balance'")){
                session_start();
                $_SESSION["login"] = 1;
                $_SESSION["username"] = $username;
                echo "<script>alert('Register Success !');</script>";
                echo "<script type='text/javascript'>document.location='index.php'</script>";
            }
            else{
                echo "<script>alert('Error ! Can't Register');</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <section>
        <div class="container mt-5 pt-5 pb-5">
            <div class="row">
                <div class="col-12 col-sn-8 col-nd-6">
                    <div class="card">
                        <h1>Register</h1>
                        <div class="card-body">
                            <form action="" method="post">
                                <input type="text" name="username" id="username" class="form-control my-4 py-2"
                                    placeholder="Username" required>
                                <div class="error-message"><?=$err_username?></div>
                                <input type="email" name="email" id="email" class="form-control my-4 py-2"
                                    placeholder="Email" required>
                                <input type="password" name="password" id="password" class="form-control my-4 py-2"
                                    placeholder="Password" required>
                                <input type="password" name="confirmpassword" id="confirmpassword"
                                    class="form-control my-4 py-2" placeholder="Confirm Password" required>
                                <div class="form-text confirm-message"></div>
                                <div class="text-center mt-3">
                                    <input class="btn btn-purple" type="submit" value="Register" name="register"
                                        id="register">
                                    <a href="login.php" class="nav-link">Already have an account ? </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
$('#password, #confirmpassword').on('keyup', function() {

    $('.confirm-message').removeClass('success-message').removeClass('error-message');

    let password = $('#password').val();
    let confirm_password = $('#confirmpassword').val();

    if (password === "") {
        $('.confirm-message').text("Password Field cannot be empty").addClass('error-message');
        $("#register").attr('disabled', 'disabled');
    } else if (confirm_password === "") {
        $('.confirm-message').text("Confirm Password Field cannot be empty").addClass('error-message');
        $("#register").attr('disabled', 'disabled');
    } else if (confirm_password === password) {
        $('.confirm-message').text('Password Match!').addClass('success-message');
        $("#register").prop('disabled', false);
    } else {
        $('.confirm-message').text("Password Doesn't Match!").addClass('error-message');
        $("#register").attr('disabled', 'disabled');
    }

});
</script>

</html>