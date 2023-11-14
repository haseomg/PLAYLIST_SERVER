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
$song_name = $_POST["song_name"];

$insert_query = "INSERT INTO liked (user_id, song_name) 
VALUES ('$user_id','$song_name')";

$delete_query = "DELETE FROM liked 
WHERE user_id = '$user_id' AND song_name = '$song_name'";

$sql = "SELECT user_id, song_name FROM liked where user_id = '$user_id'
AND song_name = '$song_name'"; // 수정된 부분

$result = $conn->query($sql);

$likes = array();

if ($result->num_rows > 0) {
    if ($conn->query($delete_query)) {
        $likes[] = array(
            'status' => 'delete success'
        );
    } else {
        $likes[] = array(
            'status' => 'delete failed'
        );
    } 
} else {
    if ($conn->query($insert_query)) {
        $likes[] = array(
            'status' => 'success'
        );
    } else {
        $likes[] = array(
            'status' => 'insert failed'
        );
    }
} 

echo json_encode($likes);
$conn->close();

?>
