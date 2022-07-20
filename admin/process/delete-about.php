<?php
include "../connection.php";

$id = $_REQUEST['id'];
$delete = "DELETE FROM tb_about WHERE `tb_about`.`id` = $id";

// echo $delete;
$delete = mysqli_query($conn, $delete);

if($delete) {
    echo "<script>
            let text = 'Data has been deleted';
            alert(text);
            window.location.href = '../index.php';
          </script>
        ";
}