<?php
header('Content-Type: application/json'); // 리턴되는 데이터의 콘텐츠 유형을 JSON으로 설정

// 데이터베이스 연결 정보
$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

$user_name = $_GET["user_name"];

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed : " . $conn->connect_error);

} else {
    $sql = "SELECT * FROM feed_user_data where user_id = '$user_name'";


    $result = $conn->query($sql);

    $songs = array();

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $feed_user_data[] = array(
                'user_name' => $row["user_id"],
                'profile_music' => $row["profile_music"],
                'profile_image' => $row["profile_image"],
                'like_genre_first' => $row["like_genre_first"],
                'like_genre_second' => $row["like_genre_second"],
                'like_genre_third' => $row["like_genre_third"]
            );
        } // while

        // 결과를 JSON 형태로 인코딩하여 출력
        echo json_encode($feed_user_data);
    } else {
        echo json_encode(array());
    } // else
} // conn else
$conn->close();
?>
