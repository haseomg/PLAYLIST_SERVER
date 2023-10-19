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
$song = $_POST['song'];
$selected_time = $_POST['selected_time'];
$msg = $_POST['msg'];

$sql = "INSERT INTO comment (user, song, selected_time, msg) 
          VALUES ('$user', '$song', '$selected_time', '$msg')";

if ($conn->query($sql) === TRUE) {
    echo "입력 성공! New record created successfully";
} else {
    echo "에러요! Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>