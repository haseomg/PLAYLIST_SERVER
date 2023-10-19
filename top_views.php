<?php

$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, artist, views FROM music ORDER BY views DESC LIMIT 3";

$result = $conn->query($sql);

$rows = array();

// 결과를 배열로 변환
while ($row = $result->fetch_assoc()) {
    $rows[] = array(
        'name' => $row["name"],
        'artist' => $row["artist"],
        'views' => $row["views"]
    );
}

// JSON으로 변환하여 클라이언트에게 전송
echo json_encode($rows);

// 연결 종료
$conn->close();

?>