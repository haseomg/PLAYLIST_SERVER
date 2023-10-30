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


//내가 팔로우
$followSql = "SELECT me FROM follow_table WHERE me='$me'";
$followResult = $conn->query($followSql);

// 나를 팔로우
$followerSql = "SELECT you FROM follow_table WHERE you='$me'";
$followerResult = $conn->query($followerSql);
if ($followResult->num_rows > 0) {
    // echo 1 . " / ";
    // echo 1;
    if ($followResult->num_rows > 0) {
        echo $followResult->num_rows . " / ";

        if ($followerResult->num_rows > 0) {
            echo $followerResult->num_rows;
        } else {
            echo 0;
        }

    } else {
        echo $followResult->num_rows . " / ";

        if ($followerResult->num_rows > 0) {
            echo $followerResult->num_rows;
        } else {
            echo 0;
        }
    }

} else {
    echo $followResult->num_rows . " / ";

    if ($followerResult->num_rows > 0) {
        echo $followerResult->num_rows;
    } else {
        echo 0;
    }
}

// 테이블에 잘 들어갔는지 클라이언트 상에서 로그로 확인 필요

$conn->close();
?>