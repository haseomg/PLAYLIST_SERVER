<?php

include "dbcon.php";
$count = 0;

// POST 방식으로 전달된 nickname 값을 가져옵니다.
$before = $_POST['before'];
$after = $_POST['after'];

// nickname 값을 이용하여 해당 유저의 id 값을 가져옵니다.
$id_query = "SELECT id FROM user WHERE nickname = '$before'";
$change_id_query = "SELECT id FROM user WHERE nickname = '$after'";
$id_result = mysqli_query($conn, $id_query);
$change_result = mysqli_query($conn, $change_id);

if ($id_result) {
    if ($count == 0) {
    $row = mysqli_fetch_assoc($id_result);
    $id = $row['id'];
       // id 값을 이용하여 nickname 값을 수정합니다.
    $update_query = "UPDATE user SET nickname = '$after' WHERE id = '$id'";
    $update_result = mysqli_query($conn, $update_query);
    $count ++;
    if ($update_result) {
        $response = array("success" => true, "message" => "ok");
        echo json_encode($response);
        echo json_encode($before);
        echo json_encode($after);
        echo json_encode($id);
        // echo json_encode($count);
    } else {
            $response = array("success" => false, "message" => "failed");
            echo json_encode($response);
        }
} else {
           // id 값을 이용하여 nickname 값을 수정합니다.
    $row = mysqli_fetch_assoc($change_result);
    $change_id = $row['id'];
    $update_change = "UPDATE user SET nickname = '$after' WHERE id = '$change_id'";
    $update_chagnge_result = mysqli_query($conn, $update_change);
    $count ++;
    if ($update_change_result) {
        $response = array("success" => true, "message" => "ok");
        echo json_encode($response);
        echo json_encode($before);
        echo json_encode($after);
        echo json_encode($id);
        echo json_encode($change_id);
        // echo json_encode($count);
    } else {
        $response = array("success" => false, "message" => "failed");
        echo json_encode($response);
    }
        
    }
} else {
    $response = array("success" => false, "message" => "해당하는 유저를 찾을 수 없습니다.");
    echo json_encode($response);
}

// 데이터베이스 연결 종료
mysqli_close($conn);

// $nickname = $POST['nickname'];

// $sql = "SELECT * FROM user WHERE nickname ='$nickname'";

// $result = mysqli_query($conn, $sql);

// $match = mysqli_fetch_array($result);

// if($match == 0) {
//     echo 1;
// } else {
//     echo $match['id'];
//     exit();
// }
?>