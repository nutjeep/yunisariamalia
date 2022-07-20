<?php
include '../connection.php';

$category    = $_POST['select-item'];
$title       = $_POST['title'];
$year        = $_POST['year'];

// echo $category." ".$title." ".$desc." ".$year;

$insert = "INSERT INTO `tb_publication` (`id`, `category`, `title`, `year`) VALUES (NULL, '$category', '$title', '$year');";

$insert = mysqli_query($conn, $insert);

if($insert) {
    echo "<script>
            let text = 'Data has been added';
            alert(text);
            window.location.href = '../admin-publication.php';
          </script>
        ";
}