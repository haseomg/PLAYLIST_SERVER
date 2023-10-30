<?php

$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("연결 실패 (Connection failed): " . $conn->connect_error);
}

$me = $_POST['me'];
$you = $_POST['you'];

$sql = "SELECT me, you FROM follow_table WHERE (me='$me' AND you='$you')";
$result = $conn->query($sql);

$followSql = "SELECT * FROM follow_table WHERE me='$me'";
$followResult = $conn->query($followSql);

$followerSql = "SELECT * FROM follow_table WHERE you='$you'";
$followrResult = $conn->query($followerSql);
if ($result->num_rows > 0) {
    // echo 1 . " / ";
    // echo 1;
    if ($followResult->num_rows > 0) {
        echo $followResult->num_rows . " / ";

        if ($followrResult->num_rows > 0) {
            echo $followrResult->num_rows;
        } else {
            echo 0;
        }
    } // if
} else {
    echo 0;
}

// 테이블에 잘 들어갔는지 클라이언트 상에서 로그로 확인 필요

$conn->close();
?>