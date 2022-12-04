<?php
include "dbcon.php";

$id = $_POST["id"];

$statement = mysqli_prepare($conn, 
"SELECT id FROM kakao_api WHERE id = ?");
mysqli_stmt_bind_param($statement, "s", $id);
mysqli_stmt_execute($statement);
mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $userID);


$response = array();
    $response["success"] = true;
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = false;
        $response["id"]=$id;
    }
   
    echo json_encode($response);


?>