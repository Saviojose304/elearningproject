<?php
    session_start();
    include 'db.php';

    $user = $_SESSION['id'];
    $sql = "SELECT
    *
FROM
    course_enrolll
JOIN user_register ON user_register.id = course_enrolll.id
JOIN course ON course_enrolll.course_id = course.course_id
WHERE
    user_register.id = $user;";
    $result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>My Courses</title>
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
            <a class="nav-link active" aria-current="page" href="E-Learning.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-current="page" href="#courses">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#books">Books</a>
          </li>
            <?php if(isset($_SESSION['auth'])): ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php  echo $_SESSION['username'] ?>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="profile.php">My Course</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">My Notes</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="logout.php"> log out</a></li>
                </ul>
              </li>
              <?php else: ?>
                <a class="nav-link" href="login.php">Sign In</a>
              <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
  <!--Nan Bar-->
  <div class="Sub_head" style="margin-top: 40px;">
      <p class="h1">My Courses</p>
  </div>
  


<?php  while($row = $result->fetch_assoc()): ?>
          <div class="col-xl-3">
            <div class="card" style="width: 18rem;">
              <img src="<?= $row['course_img']; ?>" class="card-img-top" alt="img">
              <div class="card-body">
                <h5 class="card-title"><?= $row['course_name'];?></h5>
                <p class="card-text"><?= $row['course_des'];?></p>
              </div>
            </div>
          </div>
          <?php endwhile; ?>

<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>