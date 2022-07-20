<?php
include '../connection.php';

$id = $_REQUEST['id'];
$aboutDesc = $_POST['about-desc'];

$update = "UPDATE `tb_about_desc` SET `about_me` = '$aboutDesc' WHERE `tb_about_desc`.`id` = '$id';";

$result = mysqli_query($conn, $update);

if($result) {
    echo "<script>
            let text = 'Data has been updated';
            alert(text);
            window.location.href = '../index.php';
          </script>
        ";
}