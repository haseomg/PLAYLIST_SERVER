<?php
header('Content-Type: application/json'); 

// 데이터베이스 연결 정보
$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

// 곡 이름 GET
$user = $_GET["user"];
$status = $_GET["status"];

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed : " . $conn->connect_error);

} else {

    $sql = "SELECT me FROM follow_table WHERE you = '$user'";

    $result = $conn->query($sql);

    $follow = array();

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $follow[] = array(
                'me' => $row["me"]
            ); // array
         } // while
         echo json_encode($follow);
       } else {
        echo json_encode(array());
   	} // else
    
    } // connection
$conn -> close();
?>
