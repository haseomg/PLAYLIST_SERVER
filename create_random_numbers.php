<?php
include "dbcon.php";

// 배열의 크기가 적을 때 유용
$temp = range(1, 8);
shuffle($temp);

$data = array_slice($temp, 0, 8);
$numbers_toString = implode('', $data);
// echo $numbers_toString;

// 숫자 하나씩 조회해서 music 테이블에서 정보 가져오기
for ($i = 0; $i < strlen($numbers_toString); $i++) {
    $num = substr($numbers_toString, $i, 1);
    $sql = "SELECT * FROM music WHERE num = '$num'";
    $result = $conn -> query($sql);
    if ($result -> num_rows > 0) {
        while ($row = $result -> fetch_assoc()) {
            echo "artist : " . $row["artist"] . "_____name : " . $row["name"] . "_____time : " . $row["time"] . "<br>";
        }
    } else {
        echo "No results found for number : " . $num . "<br>";
    }
}

$conn -> close();
// 범위가 클 때 랜덤 함수 사용
// $count = 0;
// $check = $data2 = array();
// while ($count < 8) {
//     $randomNum = mt_rand(1, 8);
//     if (!isset($check[$randomNum])) {
//         $check[$randomNum] = 1;
//         $data2[] = $randomNum;
//         $count ++;
//     }
// }
// print_r($data2);
?>