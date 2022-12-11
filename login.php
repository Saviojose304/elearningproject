<?php

include 'db.php';

session_start();
if(isset($_SESSION['auth']))
{
    header("location:E-Learning.php");
    return;
}

if($_POST)
{
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $sql ="SELECT * FROM user_register WHERE email ='$email' and pass ='$pass'";

    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();

   if(count($row)> 0){
        $_SESSION['auth'] = "true";
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] =$row['username'];
        $_SESSION['email']= $row['email'];
        echo '<script>alert("Login successfully")</script>';
        echo "<script>window.location.replace('E-Learning.php') </script>";
   }
   else{
        echo '<script>alert("Email or Password is wrong Try again")</script>';
   }
}
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Log In</title>
    <script>
        function validateEmail() {
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var regex = /^\s/;
            var email = document.getElementById("email");
            if (email.value.match(regex)) {
                text = "Email is required";
                document.getElementById("email_err").innerHTML = text;
                document.getElementById("submit").disabled = true;
                return true;
            }
            if (email.value.match(filter)) {
                text = ""
                document.getElementById("email_err").innerHTML = text;
                document.getElementById("submit").disabled = false;
                return false;
            } else {
                text = "Please enter valid email"
                document.getElementById("email_err").innerHTML = text;
                document.getElementById("submit").disabled = true;
                return true;
            }
        }

        function validatePassword() {
            var pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
            var regex = /^\s/;
            var password = document.getElementById("password");
            if (password.value.match(regex)) {
                text = "Password is required";
                document.getElementById("pass_err").innerHTML = text;
                document.getElementById("submit").disabled = true;
                return true;
            }
            if (password.value.length <= 6) {
                text = "Password minimum length is 6";
                document.getElementById("pass_err").innerHTML = text;
                document.getElementById("submit").disabled = true;
                return true;
            }
            if (password.value.length >= 12) {
                text = "Password maximum length is 12";
                document.getElementById("pass_err").innerHTML = text;
                document.getElementById("submit").disabled = true;
                return true;
            }
            if (password.value.match(pwd_expression)) {
                text = "";
                document.getElementById("pass_err").innerHTML = text;
                document.getElementById("submit").disabled = false;
                return false;
            } else {
                text = "Upper case, Lower case, Special character and Numeric letter are required in Password filed";
                document.getElementById("pass_err").innerHTML = text;
                document.getElementById("submit").disabled = true;
                return true;
            }
        }
    </script>
</head>

<body>
    <!--Nan Bar-->
    <nav class="navbar navbar-expand-lg fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">EarnKnowledge</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="navbar-toggler-icon"></i>
            </button>
            <div class="collapse justify-content-end navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="E-Learning.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-current="page" href="#">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="Register.php">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Nan Bar-->
    <!--Form-->
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Log In</h3>
                            <form method="POST" autocomplete="off">
                                <span><i class="bi bi-envelope-fill icon"></i></span>
                                <input type="text" placeholder="Enter your e-mail" name="email" id="email" onkeyup="validateEmail()" required><br>
                                <div class="red-text" id="email_err"></div> <br>
                                <span><i class="bi bi-lock-fill icon"></i></span>
                                <input type="password" placeholder="Enter your password" name="password" id="password" onkeyup="validatePassword()" required>
                                <div class="red-text" id="pass_err"></div> <br>
                                <button style="width: 90%;" class="btn btn-primary btn-lg btn-block" id="submit" type="submit">Login</button>
                            </form>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="Register.php" class="link-danger">Register</a></p>
                            <hr class="my-4">
                            <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;width: 100%;margin-bottom: 25px;" type="submit"><i class="bi bi-google me-2"></i> Sign in with google</button>
                            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998; width:100%;" type="submit"><i class="bi bi-facebook me-2"></i>Sign in with facebook</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Form-->




    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>