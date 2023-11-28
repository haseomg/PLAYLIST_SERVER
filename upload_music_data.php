<?php
$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("연결 실패 (Connection failed): " . $conn->connect_error);
}

$name = $_POST['name'];
$artist = $_POST['artist'];
$time = $_POST['time'];
$vibe = $_POST['vibe'];
$season = $_POST['season'];
$path = $_POST['path'];

$sql = "INSERT INTO music (name, artist, time, path, vibe, season) 
        VALUES ('$name', '$artist', '$time', '$path', '$vibe', '$season')";

if ($conn->query($sql) === TRUE) {
    echo "입력 성공! New record created successfully";
} else {
    echo "에러요! Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

