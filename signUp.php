<?php  
    include "dbcon.php";

    // $host = "localhost";
    // $user = "haseomg";
    // $password = "0908";
    // $db = "pinni_api";

    $result = mysqli_query($conn, 
    "INSERT INTO user(id, pw, pwCheck, nickname) 
    VALUES ('$_POST[id]','$_POST[pw]','$_POST[pwCheck]','$_POST[nickname]')");
    // mysqli_close($conn);
    
    $id = $_POST['id'];

    if($result) {
        // 성공
        echo 1;

    } else {
        // 실패
        echo 0;
    }
    
    
?>