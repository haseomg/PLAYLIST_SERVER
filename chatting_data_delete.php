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

$me = $_POST["me"];
$you = $_POST["you"];

$query = "SELECT * FROM retrofit_test WHERE 
(me='$me' AND you='$you') OR (me='$you' AND you='$me')";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $delete_query = "DELETE FROM retrofit_test WHERE 
    (me='$me' AND you='$you') OR (me='$you' AND you='$me')";

    if ($conn->query($delete_query) === TRUE) {
        $response = array("status" => "deleted");
    } else {
        $response = array("status" => "delete_failed");
    }
} else {
    // 값이 없으면 상관 X
}
echo json_encode($response);
$conn->close();
?>