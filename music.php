<?php  
    include "dbcon.php";

    $conn = mysqli_connect($host, $user, $password, $db);


    $sql = "SELECT * FROM music WHERE index='$index' AND (pw='$pw')";
    // echo  $sql;
    $result = mysqli_query($conn, $sql);
    $member = mysqli_fetch_array($result);
    // print_r($member);
    // 아이디와 비밀번호가 일치하지 않으면 실패
	if ($member == 0) {
        echo 1;
    // 일치하면 성공
    } else {
        echo $member['nickname'];
        exit();
    }
?>
