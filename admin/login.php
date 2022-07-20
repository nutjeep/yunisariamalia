<?php
session_start();
if(isset($_SESSION["login"])) {
  header("Location: index.php");
}

include 'connection.php';

if(isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $query = "SELECT * FROM `users` WHERE `username` = '$username'";

  $result = mysqli_query($conn, $query);

  // cek username
  if (mysqli_num_rows($result) === 1) {

    // cek password
    $data = mysqli_fetch_assoc($result);
    // 'password_verify' = mengecek apakah sebuah string sama dengan password_hash
    if (password_verify($password, $data["password"])) {
      // set SESSION
      $_SESSION["login"] = true;

      header("Location: index.php");
      exit;
    }
  } else { $error = true; }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- GFont -->  
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    
    <!-- Animate CSS -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Local CSS -->
    <link rel="stylesheet" href="../css/main.css?version=<?php echo filemtime('../css/main.css'); ?>">
    <link rel="stylesheet" href="../css/login-form.css?version=<?php echo filemtime('../css/login-form.css'); ?>">
    
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <title>Login Form</title>
  </head>
  <body>
    <div class="login-form" id="login-form">
      <div class="title">
        <h1>hi, <span>yuni</span></h1>
      </div>
      <div class="content">
        <?php if(isset($error)) {
          echo "<p style='color: red; font-style: italic; text-shadow: 1px 1px rgba(0,0,0,0.8) ;'>Username or Password is not correctly</p>";
        } ?>
          
        <form action="" method="post">
          <div class="form-floating mb-3">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
            <label for="floatingInput" name="username">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="button">
            <button class="btn btn-primary login" type="submit" name="submit">Login</button>
            <a href="registration.php">
              <button class="btn" type="button">Register</button>
            </a>
          </div>
        </form>
      </div>
  
      <div class="main-page">
        <a href="../index.php">
          <p>Back to Main page</p>
        </a>
      </div>
    </div>

    <script>
      const loginFormBackground = document.body;
      loginFormBackground.style.background = 'url(../img/login-form.jpg)';
      loginFormBackground.style.backgroundSize = 'cover';
      loginFormBackground.style.backgroundRepeat = 'no-repeat';

      // Login Button
      const login = document.querySelector('.login');
      login.addEventListener('click', function(){
        window.location = 'admin.html';
      });
    </script>

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  </body>
</html>
