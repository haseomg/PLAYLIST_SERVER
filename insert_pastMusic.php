<?php
include "dbcon.php";

 $result = mysqli_query($conn, 
    "INSERT INTO past_music(name, artist, time) 
    VALUES ('$_POST[name]','$_POST[artist]','$_POST[time]')");
    

    
    if($result) {
        // 성공
        echo 1;

    } else {
        // 실패
        echo 0;
    }

?>