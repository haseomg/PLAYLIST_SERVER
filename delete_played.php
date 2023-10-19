<?php
include "dbcon.php";

// 넘어온 폼 데이터 name
$song_name = $_POST['song_name'];
$user_name = $_POST['user_name'];

// music table에서 name에 맞춰 조회
$sql = "DELETE FROM played_list WHERE playedSongs = '$song_name'";

if (mysqli_query($conn, $sql)) {
    echo $song_name;
    echo $user_name;

} else {
    echo $song_name;
    echo $user_name;
}

mysqli_close($conn);

?>