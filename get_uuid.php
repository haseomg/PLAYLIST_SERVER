<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

// 클라이언트에서 전송된 me 값
$me = $_POST["me"];

// 필요한 값을 초기화
$response = array(
    "uuids" => array(),
    "error" => null
);

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

} else {
    // chat_messages 테이블에서 me와 관련된 모든 행을 조회
    $select_query = "SELECT DISTINCT uuid FROM chat_messages WHERE me='$me' OR you='$me'";
    $result = $conn->query($select_query);

    // 조회된 결과가 있는 경우 uuid 값을 가져온다.
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $response["uuids"][] = $row["uuid"];
        }
    } else {
        $response["error"] = "none_uuid";
    }

    $conn->close();
    echo json_encode($response);
}
?>