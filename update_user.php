<?php
include "dbcon.php";

// POST 방식으로 전달된 파라미터 읽엉
$id = $_POST['id'];
$nickname = $_POST['nickname'];

$sql = "UPDATE user SET nickname = '$nickname' WHERE id = '$id'";

$result = mysqli_query($conn, $sql);

$match = mysqli_fetch_array($result);

// if ($result) {
//     echo $id, $nickname;
// } else {
//     echo 'failed';
// }

// $conn -> close();

if ($match == 0) {
    echo 1;
} else {
    echo $match['id'];
    echo $match['nickname'];
}
// $conn -> close();
?>

