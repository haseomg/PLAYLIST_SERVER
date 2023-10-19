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
$image = $_POST["image"];


$select_query = "SELECT * from chat_message WHERE 
(me='$me' AND you='$you') OR (me='$you' AND you='$me')";
$result = $conn->query($select_query);
$uuid_result = mysqli_query($conn, $select_query);
$uuid_check = mysqli_fetch_array($uuid_result);
mysqli_query("set names utf8", $conn);
// 가져오고 클라이언트로 uuid 보내준다.
// 클라이언트에서는 메시지 보낼 때 uuid를 키 값으로 다시 DB에 넣어준다.




if ($result->num_rows > 0) {

    echo $uuid_check['uuid'];
    $response = array("status" => "exists");

} else {
    $response = array("status" => "none_exists");
    //     $insert_query = "INSERT INTO chat_messages (uuid, me, you, from_idx
//     , msg, msg_idx, timestamp, is_read, image) 
//     VALUES ('$uuid', '$me', '$you', '$from_idx', '$msg', '$msg_idx'
//     , '$timestamp', '$is_read', '$image')";

    //     if ($conn->query($insert_query) === TRUE) {
//         $response = array("status" => "success");
//     } else {
//         $response = array("status" => "failed");
}
// }
echo json_encode($response);
$conn->close();
?>