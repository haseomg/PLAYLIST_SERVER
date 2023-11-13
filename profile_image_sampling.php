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

}

    $user_name = $_POST['user_name'];
    $query = "SELECT profile_image FROM feed_user_data WHERE user_id = '$user_name'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if($row) {
        $response = array("profile_image" => $row['profile_image']);
    } else {
        $response = array("error" => "Error in fetching data");
    }
    echo json_encode($response);
?>

