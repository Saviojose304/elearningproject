<?php
include 'db.php';

if ($_POST) {

  $username = $_REQUEST['username'];
  $email = $_REQUEST['email'];
  $phone = $_REQUEST['phone'];
  $pass = $_REQUEST['user_password'];

  $sql = "INSERT INTO user_register(username,email,phone,pass) VALUES ('$username','$email','$phone','$pass')";

  if ($mysqli->query($sql) === true) {
    echo '<script>alert("Registered successfully")</script>';
    echo "<script>window.location.replace('login.php') </script>";

  } else {
    echo "Error:Could not able to execute $sql. " . $mysqli->error;
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
  <link rel="stylesheet" href="register.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <title>Register</title>
  <script src="registervalidation.js"></script>
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
            <a class="nav-link active" href="login.php">Log In</a>
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

              <h3 class="mb-5">Register Your Account</h3>
              <form method="POST" autocomplete="off">
                <span><i class="bi bi-person-fill icon"></i></span>
                <input type="text" placeholder="Enter your Username" name="username" id="username" onkeyup="validateName()" required><br>
                <div class="red-text" id="name_err"></div> <br>
                
                <span><i class="bi bi-envelope-fill icon"></i></span>
                <input type="text" placeholder="Enter your e-mail" name="email" id="email" onkeyup="validateEmail()" required><br>
                <div class="red-text" id="email_err"></div> <br>
                <span><i class="bi bi-telephone-fill icon"></i></span>
                <input type="text" placeholder="Enter phone number" name="phone" id="phone" onkeyup="validatePhone()" required> <br>
                <div class="red-text" id="phone_err"></div> <br>
                <span><i class="bi bi-lock-fill icon"></i></span>
                <input type="password" placeholder="Enter your password" name="user_password" id="password" onkeyup="validatePassword()" required><br>
                <div class="red-text" id="pass_err"></div> <br>
                <span><i class="bi bi-lock-fill icon"></i></span>
                <input type="password" placeholder="Confirm your password" name="repassword" id="repassword" onkeyup="validateRepass()" required> <br>
                <div class="red-text" id="repass_err"></div>

                <button style="width: 90%;" class="btn btn-primary btn-lg btn-block" type="submit" id="submit" name="submit">Sign Up</button>
              </form>
              <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="login.php" class="link-danger">Log In</a></p>
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