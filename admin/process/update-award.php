<?php
include "../connection.php";

$id          = $_REQUEST['id'];
$category    = $_POST['select-item'];
$title       = $_POST['title'];
$year        = $_POST['year'];

$update = "UPDATE `tb_awards` SET `category` = '$category', `title` = '$title', `year` = '$year' WHERE `tb_awards`.`id` = '$id';";

$result = mysqli_query($conn, $update);

if($result) {
    echo "<script>
            let text = 'Data has been updated';
            alert(text);
            window.location.href = '../admin-award.php';
          </script>
        ";
}