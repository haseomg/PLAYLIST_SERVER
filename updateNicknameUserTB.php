<?php
header("Content-type:application/json");

include_once("retrofit_config.php");

$id = $_POST['nickname'];
$id = $_POST['id'];

$sql = "UPDATE user SET nickname = '$nickname' where id = '$id'";

$result = mysqli_query($conn, $sql);
?>