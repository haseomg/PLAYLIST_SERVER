<?php
include "dbcon.php";

 $result = mysqli_query
    ($conn, "INSERT INTO google_api(id, nickname) VALUES ('$_POST[id]','$_POST[nickname]')");
    mysqli_close($conn);

     if($result) {
        // 성공
        echo 1;
    } else {
        // 실패
        echo 0;
    }

?>