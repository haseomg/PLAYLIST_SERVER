<?php
header('Content-Type: application/json'); // 리턴되는 데이터의 콘텐츠 유형을 JSON으로 설정

// 데이터베이스 연결 정보
$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

// GET
$user = $_GET["user"];

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed : " . $conn->connect_error);

} else {
    $sql = "SELECT you FROM follow_table WHERE me = '$user'";

    $result = $conn->query($sql);

    $following = array();

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $following[] = array(
                'you' => $row["you"]
            );
        } // while

        // 결과를 JSON 형태로 인코딩하여 출력
        echo json_encode($following);
    } else {
        echo json_encode(array());
    } // else
} // conn else
$conn->close();
?>
