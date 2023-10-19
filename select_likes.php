<?php

$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_POST["user_id"];

// 데이터가 있으면 조회
$sql = "SELECT user_id, song_name FROM liked where user_id = '$user_id'";

$result = $conn->query($sql);

$likes = array();

while ($row = $result->fetch_assoc()) {
    $likes[] = array(
        'user_id' => $row["user_id"],
        'song_name' => $row["song_name"]
    );
} // while

echo json_encode($likes);
$conn->close();
?>