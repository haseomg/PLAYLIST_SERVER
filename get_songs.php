<?php
header('Content-Type: application/json'); // 리턴되는 데이터의 콘텐츠 유형을 JSON으로 설정

// 데이터베이스 연결 정보
$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";


// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed : " . $conn->connect_error);

} else {
    $sql = "SELECT name, artist, time, views FROM music";


    $result = $conn->query($sql);

    $songs = array();


    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $songs[] = array(
                'name' => $row["name"],
                'artist' => $row["artist"],
                'time' => $row["time"],
                'views' => $row["views"]
            );
        } // while

        // 결과를 JSON 형태로 인코딩하여 출력
        echo json_encode($songs);
    } else {
        echo json_encode(array());
    } // else
} // conn else
$conn->close();
?>