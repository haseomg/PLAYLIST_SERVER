<?php
// 데이터베이스 연결 정보
$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

// uuid 값을 가져옵니다.
$uuid = $_GET["uuid"];

function formatDate($date_time)
{
    // 오늘 날짜 가져오기 (예: 6.22)
    $today = date("m.d");

    // date_time에서 날짜 부분만 가져오기 (예: 6.22)
    $date = substr($date_time, 0, strpos($date_time, ' '));

    if (strcmp($today, $date) === 0) {
        // 오늘 날짜와 date_time이으면 시간 부분만 반환 (예: 오후 1:27)
        return substr($date_time, strpos($date_time, ' ') + 1);
    } else {
        // 오늘 날짜와 date_time이 다르면 전체 반환 (예:6.22 오후 1:27)
        return $date_time;
    }
}




// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 같은 uuid를 가진 데이터를 조회하는 SQL 쿼리 작성
$sql = "SELECT * FROM chat_messages WHERE uuid = '$uuid' ORDER BY msg_idx ASC";

// 쿼리 실행하고 결과 확인
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    // 데이터 출력
    while ($row = $result->fetch_assoc()) {
        $formattedDateTime = formatDate($row["date_time"]);
        $data[] = array(
            'msg_idx' => $row["msg_idx"],
            'uuid' => $row["uuid"],
            'me' => $row["me"],
            'you' => $row["you"],
            'from_idx' => $row["from_idx"],
            'msg' => $row["msg"],
            'date_time' => $formattedDateTime,
            'is_read' => $row["is_read"]
        );
    }

    echo json_encode($data);
} else {
    echo json_encode(array());
}



// 데이터베이스 연결 해제
$conn->close();
?>