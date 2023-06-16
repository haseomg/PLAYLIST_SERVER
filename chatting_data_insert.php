<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$uuid = $_POST["uuid"];
$me = $_POST["me"];
$you = $_POST["you"];
$from_idx = $_POST["from_idx"];
$msg = $_POST["msg"];
$msg_idx = $_POST["msg_idx"];
$timestamp = $_POST["timestamp"];
$is_read = $_POST["is_read"];

$select_query = "SELECT * FROM retrofit_test WHERE 
(myname='$me' AND yourname='$you') OR (myname='$you' AND yourname='$me')";
$result = $conn->query($select_query);


if ($result->num_rows > 0) {
    $response = array("status" => "exists");
} else {
    $insert = "INSERT INTO retrofit_test 
    (uuid, me, you, from_idx, msg, msg_idx, timestamp, is_read) 
    VALUES ('$uuid', '$me', '$you', '$from_idx', '$msg',
    '$msg_idx', '$timestamp', '$is_read')";


    if ($conn->query($insert) === TRUE) {
        $response = array("status" => "success");
    } else {
        $response = array("status" => "failed");
    }
}
echo json_encode($response);
$conn->close();
?>