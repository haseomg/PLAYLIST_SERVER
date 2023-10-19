<?php
$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$me = $_POST['me'];
$you = $_POST['you'];

$delete_query = "DELETE FROM chat_messages WHERE
(me='$me' AND you='$you') OR (me='$you' AND you='$me')";

if ($conn->query($delete_query) === TRUE) {
    echo json_encode(array("status" => "deleted"));
} else {
    echo json_encode(array("status" => "delete_failed"));
}

$conn->close();
?>