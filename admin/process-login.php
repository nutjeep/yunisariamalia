<?php
include 'connection.php';

if(isset($_POST)) {
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
        header("Location: index.php");
        exit;
    }
  }
}