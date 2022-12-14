<?php 

$host = "localhost";
$user = "haseomg";
$password = "0908";
$db = "pinni_api";

// $conn = mysqli_connect($host, $user, $password, $db);

$conn = mysqli_connect("localhost", "haseomg", "0908", "pinni_api");

// 한글 입력 가능하게
mysqli_set_charset($conn, "utf8");

// connect to MySQL
if ($conn) {
    echo $db," 연결 성공 🐳 ";
    // echo "[Mysql 연결 성공] ";
} else if (!$conn) {
    // die("Connection failed : " .$conn->connect_error);
    // echo "[Mysql 연결 실패] : ";
    echo mysqli_connect_error($conn);
    echo " ☄️ ";
} else {
    // echo "[Mysql 연결 실패] : ";
    echo mysqli_connect_error($conn);
    echo " ☄️☄️ ";
}

// Select database
// $selectDB = mysqli_select_db($conn, 'pinni_api');
// if ($selectDB) {
    // echo ' <--- Could Select DB';
// } else if (!$selectDB) {
    // echo ' <--- Could not Select DB';
    // echo mysqli_connect_error($conn);
// }


?>