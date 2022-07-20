<?php
include "../connection.php";

$id = $_REQUEST['id'];
$delete = "DELETE FROM tb_experience WHERE `tb_experience`.`id` = $id";

// echo $delete;
$delete = mysqli_query($conn, $delete);

if($delete) {
    // header("Location: ../index.php");
    echo "<script>
            let text = 'Data has been deleted';
            alert(text);
            window.location.href = '../admin-experience.php';
          </script>
        ";
}