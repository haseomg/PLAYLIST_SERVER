<?php 

$host = "localhost";
$user = "haseomg";
$password = "0908";
$db = "pinni_api";

$conn = mysqli_connect($host, $user, $password, $db);

// 한글 입력 가능하게
mysqli_set_charset($conn, "utf8");

// connect to MySQL
if ($conn) {
    echo "[접속 성공] ";
} else {
    echo "[접속 실패] ";
}

?>