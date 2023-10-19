<?php

$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selected_song = $_POST["selected_song"];

$sql = "SELECT user_id FROM liked where song_name = '$selected_song'";

$result = $conn->query($sql);

$likes = array();

while ($row = $result->fetch_assoc()) {
    $likes[] = array(
        'user_id' => $row["user_id"],
    );
} // while

echo json_encode($likes);
$conn->close();
?>