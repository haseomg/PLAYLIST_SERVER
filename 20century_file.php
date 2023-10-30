<?php
include "dbcon.php";

// 넘어온 폼 데이터 num
$name = $_POST['name'];

// echo $num;

$sql = "SELECT * FROM music WHERE name = '$name'";

$result = mysqli_query($conn, $sql);

$match = mysqli_fetch_array($result);

// num이랑 매칭이 안 되면 실패
if ($match == 0) {
    echo 1;
} else {
    echo $match['name'];
    echo "___";
    echo $match['artist'];
    echo "###";
    echo $match['time'];
    exit();
}

?>