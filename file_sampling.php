<?php
include "dbcon.php";

// 넘어온 폼 데이터 num
$num = $_POST['num'];

// echo $num;

// music 테이블에서 num에 맞는 path를 조회
$sql = "SELECT * FROM music WHERE num='$num'";

$result = mysqli_query($conn, $sql);

$match = mysqli_fetch_array($result);

// num이랑 매칭이 안 되면 실패
if($match == 0) {
    echo 1;
} else {
    echo $match['num'];
    echo "$$$";
    echo $match['artist'];
    echo "###";
    echo $match['path'];
    echo "/";
    echo $match['name'];
    echo "@@@";
    echo $match['time'];
    exit();
}

?>