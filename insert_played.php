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

$user = $_POST['user'];
$song = $_POST['playedSongs'];

$sql = "INSERT INTO played_list (userName, playedSongs) VALUES ('$user', '$song')";

if ($conn->query($sql) === TRUE) {
    echo "입력 성공! New record created successfully";
} else {
    echo "에러요! Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>