<?php
include '../connection.php';

$id = $_REQUEST['id'];
$webTitle = $_POST['websiteTitle'];
$pp = $_POST['profilePhoto'];
$webName = $_POST['websiteName'];
$desc = $_POST['description'];
$favicon = $_POST['favicon'];

$update = "UPDATE `tb_setting` SET `website_title` = '$webTitle', `favicon` = '$favicon', `website_name` = '$webName', `description` = '$desc', `profile_photo` = '$pp' WHERE `tb_setting`.`id` = '$id';";

$result = mysqli_query($conn, $update);

if($result) {
    echo "<script>
            let text = 'Data has been updated';
            alert(text);
            window.location.href = '../admin-setting.php';
          </script>
        ";
}