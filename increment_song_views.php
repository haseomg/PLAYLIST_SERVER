<?php
// 클라이언트에서 30초 이상 재생 시 
// 서버로 통신할 때 재생중인 곡 이름을 보내며 
// 조회수 올려달라고 해유
// 서버에서는 곡 이름 잘 받아서
// music 테이블의 views 값만 1 올려주면 됨 (update)

$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

// echo 'Hello';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$songId = $_POST['song_id'];

// echo 'song id :' . $songId;

$sql = "UPDATE music SET views = views + 1 WHERE name = '$songId'";

if ($conn->query($sql)) {
    // echo "업데이트 성공! views update successfully";
    echo 2;
} else {
    echo "에러요! Error: " . $sql . "<br>" . $conn->error;
    echo 1;
}

$conn->close();

?>