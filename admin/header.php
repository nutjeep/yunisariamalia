<?php
session_start();

if(!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Muhammad Najib Abdulloh">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Local CSS -->
    <link rel="stylesheet" href="../css/main.css?version=<?php echo filemtime('../css/main.css'); ?>">
    <link rel="stylesheet" href="../css/admin.css?version=<?php echo filemtime('../css/admin.css'); ?>">

    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <title>Admin | Yuni </title>
  </head>
  <body>
    <div class="glassmorphism">
      <!-- Navigation Bar -->
      <div class="nav">
        <div class="nav-logo">
          <a href="../index.php"><img src="../img/logo-nav.png" alt="Logo"></a>
        </div>
        <div class="nav-menu">
          <ul>
            <li><a href="index.php"><i class="bi bi-person-circle me-2"></i><p>About</p></a></li>
            <li><a href="admin-experience.php"><i class="bi bi-cursor me-2"></i><p>Experience</p></a></li>
            <li><a href="admin-publication.php"><i class="bi bi-journal-text me-2"></i><p>Publication</p></a></li>
            <li><a href="admin-award.php"><i class="bi bi-award me-2"></i><p>Award</p></a></li>
            <li><a href="admin-setting.php"><i class="bi bi-gear me-2"></i><p>Setting</p></a></li>
            <li><a href="logout.php"><i class="bi bi-box-arrow-left me-2"></i><p>Log out</p></a></li>
          </ul>
        </div>
        <div class="nav-empty"></div>
      </div>