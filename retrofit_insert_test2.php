<?php

$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("연결 실패 (Connection failed): " . $conn->connect_error);
}

$uuid = $_POST['uuid'];
$myname = $_POST['myname'];
$yourname = $_POST['yourname'];

$sql = "INSERT INTO retrofit_test2 (uuid, myname, yourname) VALUES ('$uuid', '$myname', '$yourname')";

if ($conn->query($sql) === TRUE) {
    echo "입력 성공! New record created successfully";
} else {
    echo "에러요! Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>