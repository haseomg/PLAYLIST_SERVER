<?php
$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("연결 실패 (Connection failed): " . $conn->connect_error);
}

$user = $_POST['user'];
$profile_music = $_POST['profile_music'];
$profile_image = $_POST['profile_image'];
$like_genre_first = $_POST['like_genre_first'];
$like_genre_second = $_POST['like_genre_second'];
$like_genre_third = $_POST['like_genre_third'];

// $sql = "INSERT INTO feed_user_data (user_id, profile_music, profile_image, 
// like_genre_first, like_genre_second, like_genre_third) 
// VALUES ('$user', '$profile_music', '$profile_image'
// , '$like_genre_first', '$like_genre_second', '$like_genre_third')";

// if ($conn->query($sql) === TRUE) {
//     echo "입력 성공! New record created successfully";
// } else {
//     echo "에러요! Error: " . $sql . "<br>" . $conn->error;
// }
// 테이블에 잘 들어갔는지 클라이언트 상에서 로그로 확인 필요

$sql = "REPLACE INTO feed_user_data (user_id, profile_music, profile_image, 
like_genre_first, like_genre_second, like_genre_third) 
VALUES ('$user', '$profile_music', '$profile_image'
, '$like_genre_first', '$like_genre_second', '$like_genre_third')";

if ($conn->query($sql) === TRUE) {
    if ($conn->affected_rows > 0) {
        echo "데이터가 덮어씌워졌습니다 (Data replaced successfully)";
    } else {
        echo "새로운 레코드가 추가되었습니다 (New record added successfully)";
    } // else
} else {
    echo "에러요! Error: " . $sql . "<br>" . $conn->error;
} // else

$conn->close();

?>

