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

$sql = "INSERT INTO follow_table (me, you) VALUES ('$me', '$you')";

if ($conn->query($sql) === TRUE) {
    echo "입력 성공! New record created successfully";
} else {
    echo "에러요! Error: " . $sql . "<br>" . $conn->error;
}
// 테이블에 잘 들어갔는지 클라이언트 상에서 로그로 확인 필요

$conn->close();

?>