<?php
    include "dbcon.php";


    $result = mysqli_query($conn, 
    "INSERT INTO kakao_api(id, nickname)
    VALUES ('$_POST[id]','$_POST[nickname]')");

	if ($result) {
        echo 1;
    // 일치하면 성공
    } else {
        echo 0;
    }
?>
