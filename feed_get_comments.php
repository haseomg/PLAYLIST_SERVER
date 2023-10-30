<?php
header('Content-Type: application/json'); // 리턴되는 데이터의 콘텐츠 유형을 JSON으로 설정

// 데이터베이스 연결 정보
$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

// 곡 이름 GET
$user = $_GET["user"];

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed : " . $conn->connect_error);

} else {
    $sql = "SELECT song, selected_time, msg 
    FROM comment WHERE user = '$user'";


    // $stmt = $conn->prepare($sql);
    $result = $conn->query($sql);

    $comments = array();

    // 아랫 줄 에러 발생
    // if (!$stmt) {
    //     die("Error preparing statement: " . $conn->error);
    // }
    // $stmt->bind_param("ss", $song_name, $selected_time);
    // $stmt->execute();
    // $result = $stmt->get_result();


    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $comments[] = array(
                'user' => $row["user"],
                'song' => $row["song"],
                'selected_time' => $row["selected_time"],
                'msg' => $row["msg"]
            );
        } // while

        // 결과를 JSON 형태로 인코딩하여 출력
        echo json_encode($comments);
    } else {
        echo json_encode(array());
    } // elser
} // conn else
$conn->close();
?>