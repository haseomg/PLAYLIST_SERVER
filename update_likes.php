<?php

$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_POST["user_id"];
$song_name = $_POST["song_name"];

// 데이터가 하나라도 없을 때
$insert_query = "INSERT INTO liked (user_id, song_name) 
VALUES ('$user_id','$song_name')";

// 데이터가 하나라도 있을 때
$delete_query = "DELETE FROM liked 
WHERE user_id = '$user_id' AND song_name = '$song_name'";

// 데이터가 있으면 조회
$sql = "SELECT user_id, song_name FROM liked where user_id = '$user_id'
AND song_name != '$song_name'";

$result = $conn->query($sql);

$likes = array();

// 지금 user_id당 한 줄만 추가가 가능한 상태

if ($result->num_rows > 0) {

    // 데이터가 1 이상이면
    if ($conn->query($delete_query)) {
        $likes[] = array(
            'status' => 'delete success'
        );

    } else {
        $likes[] = array(
            'status' => 'delete failed'
        );

    } // else

} else {

    // 데이터가 0이면
    if ($conn->query($insert_query)) {
        $likes[] = array(
            'status' => 'success'
        );


    } else {
        $likes[] = array(
            'status' => 'insert failed'
        );
    } // else

} // else
echo json_encode($likes);
$conn->close();
?>