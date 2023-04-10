<?php
include "dbcon.php";

// POST 방식으로 전달된 파라미터 읽엉
$num = $_POST['num'];
$nickname = $_POST['nickname'];

$sql = "UPDATE user SET nickname = '$nickname' WHERE num = $num";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo 'success';
} else {
    echo 'failed';
}

$conn -> close();

?>

