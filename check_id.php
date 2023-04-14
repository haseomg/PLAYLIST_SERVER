
<?php
header('Content-Type: application/json; charset=utf-8');

// POST로 받은 아이디
$id = $_POST['id'];
echo $id;

// MySQL 데이터베이스 연결 정보
$host = "localhost";
$username = "haseomg";
$password = "0908";
$database = "pinni_api";

// MySQL 데이터베이스 연결
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL 쿼리 실행
$sql = "SELECT * FROM user WHERE id='$id'";
$result = mysqli_query($conn, $sql);

// 중복되는 아이디가 있는지 검사
if (mysqli_num_rows($result) > 0) {
    $response = array("status" => "duplicated");
} else {
    $response = array("status" => "ok");
}

// 결과를 JSON 형태로 반환
echo json_encode($response);

mysqli_close($conn);
?>