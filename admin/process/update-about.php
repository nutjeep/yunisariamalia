<?php
include "../connection.php";

$id          = $_REQUEST['id'];
$category    = $_POST['select-item'];
$title       = $_POST['title'];
$description = $_POST['description'];
$year        = $_POST['year'];

$update = "UPDATE `tb_about` SET `category` = '$category', `title` = '$title', `description` = '$description', `year` = '$year' WHERE `tb_about`.`id` = '$id';";

$result = mysqli_query($conn, $update);

if($result) {
    echo "<script>
            let text = 'Data has been updated';
            alert(text);
            window.location.href = '../index.php';
          </script>
        ";
}