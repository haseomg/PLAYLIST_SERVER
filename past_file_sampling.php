<?php
include "dbcon.php";

// 넘어온 폼 데이터 num
$past_song = $_POST['past_song'];
echo $past_song . '- past song';

// music 테이블에서 num에 맞는 path를 조회
$sql = "SELECT * FROM music WHERE name = '$past_song'";
$result = mysqli_query($conn, $sql);
$match = mysqli_fetch_array($result);

if ($match == 0) {
    echo ' not match';

} else {
    echo $match['num'];
    echo "___";
    echo $match['artist'];
    echo "###";
    echo $match['path'];
    echo "/";
    echo $match['name'];
    echo "@@@";
    echo $match['time'];
    exit();
} // else 

?>