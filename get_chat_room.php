<?php
// 데이터베이스 연결 정보
$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

// 사용자 이름
$me = $_GET["me"];

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL 쿼리 작성
$sql = "SELECT cm.*
        FROM chat_messages cm
        INNER JOIN (
            SELECT CASE WHEN me = '$me' THEN you ELSE me END as contact_name, MAX(msg_idx) as latest_msg_idx
            FROM chat_messages
            WHERE (me = '$me' OR you = '$me')
            GROUP BY contact_name
        ) cm_group ON (cm.me = cm_group.contact_name OR cm.you = cm_group.contact_name) AND cm.msg_idx = cm_group.latest_msg_idx
        ORDER BY msg_idx DESC";

// 쿼리 실행하고 결과 확인
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    // 데이터 출력
    while ($row = $result->fetch_assoc()) {
        if ($row["me"] == $me) {
            $contact_name = $row["you"];
        } else {
            $contact_name = $row["me"];
        }

        $data[] = array(
            'the_other' => $contact_name,
            'message' => $row["msg"],
            'date_time' => $row["date_time"],
            'is_read' => $row["is_read"]
        );
    } // while

    echo json_encode($data);
} else {
    echo json_encode(array());
}

// 데이터베이스 연결 해제
$conn->close();
?>
