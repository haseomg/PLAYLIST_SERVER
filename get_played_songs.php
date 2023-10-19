<?php
header('Content-Type: application/json'); // 리턴되는 데이터의 콘텐츠 유형을 JSON으로 설정

// 데이터베이스 연결 정보
$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

$user_name = $_POST["user_name"];

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed : " . $conn->connect_error);

}
// else {

// played_list 테이블에서 유저가 어떤 곡을 들었는지 체크
$sql = "SELECT pl.*
FROM played_list pl
JOIN (
    SELECT playedSongs, MAX(updateDate) as MaxDate
    FROM played_list 
    GROUP BY playedSongs
) pl2 ON pl.playedSongs = pl2.playedSongs AND pl.updateDate = pl2.MaxDate
ORDER BY pl.updateDate ASC;";
// 위의 쿼리문 너무 헤비해.. 느려..


// $result = $conn->query($sql);
$result = $conn->query("SELECT pl.*
FROM played_list pl
JOIN (
    SELECT playedSongs, MAX(updateDate) as MaxDate
    FROM played_list 
    GROUP BY playedSongs
) pl2 ON pl.playedSongs = pl2.playedSongs AND pl.updateDate = pl2.MaxDate
ORDER BY pl.updateDate ASC;");
$played = array();

if ($result->num_rows > 0) {
    // 들었던 곡들의 정보를 music 테이블에서 조회
    // 들었던 곡들의 정보 = $played에 담겨있다.
    // $played안의 정보들을 music 테이블에서 한번씩 조회할 수 있을까?

    while ($row = $result->fetch_assoc()) {
        $played[] = array(
            'song_name' => $row["playedSongs"]
        );
    } // while

    // 결과를 JSON 형태로 인코딩하여 출력
    echo json_encode($played);
} else {
    echo json_encode(array());
} // else
// } // conn else
$conn->close();
?>