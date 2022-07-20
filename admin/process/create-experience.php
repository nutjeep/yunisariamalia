<?php
include '../connection.php';

$category    = $_POST['select-item'];
$title       = $_POST['title'];
$description = $_POST['description'];
$year        = $_POST['year'];

$insert = "INSERT INTO `tb_experience` (`id`, `category`, `title`, `description`, `year`) VALUES (NULL, '$category', '$title', '$description', '$year');";

$insert = mysqli_query($conn, $insert);

if($insert) {
    echo "<script>
            let text = 'Data has been added';
            alert(text);
            window.location.href = '../admin-experience.php';
          </script>
        ";
}