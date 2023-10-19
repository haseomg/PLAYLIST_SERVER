<?php
// header('Content-Type: application/json');

$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("연결 실패 (Connection failed): " . $conn->connect_error);
}

$uuid = $_POST['uuid'];
$me = $_POST['me'];
$you = $_POST['you'];
$from_idx = $_POST['from_idx'];
$msg = $_POST['msg'];
// $msg_idx = $_POST['msg_idx'];
$date_time = $_POST['date_time'];
$is_read = $_POST['is_read'];
$image_idx = $_POST['image_idx'];

$sql = "INSERT INTO chat_messages (uuid, me, you, from_idx, msg, date_time, is_read, image_idx) 
          VALUES ('$uuid', '$me', '$you', '$from_idx', '$msg', '$date_time', '$is_read', '$image_idx')";

if ($conn->query($sql) === TRUE) {
    echo "입력 성공! New record created successfully";
} else {
    echo "에러요! Error: " . $sql . "<br>" . $conn->error;
}
// 테이블에 잘 들어갔는지 클라이언트 상에서 로그로 확인 필요

$conn->close();
?>