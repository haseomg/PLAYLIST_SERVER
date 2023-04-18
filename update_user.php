<?php
include "dbcon.php";

// POST 방식으로 전달된 파라미터 읽엉
$id = $_POST['id'];
$nickname = $_POST['nickname'];

$sql = "UPDATE user SET nickname = '$nickname' WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo $id, $nickname;
} else {
    echo 'failed';
}

$conn -> close();

?>

