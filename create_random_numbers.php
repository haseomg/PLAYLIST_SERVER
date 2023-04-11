<?php

// 배열의 크기가 적을 때 유용
// $temp = range(1, 8);
// shuffle($temp);

// $data = array_slice($temp, 0, 8);
// print_r($data);


// 범위가 클 때 랜덤 함수 사용
$count = 0;
$check = $data2 = array();
while ($count < 8) {
    $randomNum = mt_rand(1, 8);
    if (!isset($check[$randomNum])) {
        $check[$randomNum] = 1;
        $data2[] = $randomNum;
        $count ++;
    }
}
print_r($data2);
?>