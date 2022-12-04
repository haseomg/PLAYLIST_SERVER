<?php

$conn = mysqli_connect("%", "haseomg", "0908", "pinni_api");
mysqli_query($conn, 'SET NAMES utf8');


$id = $_POST["id"];
$pw = $_POST["pw"];
// $mg = $_POST["mg"];


$statement = mysqli_prepare($conn, "SELECT * FROM testTable WHERE id = ? AND pw = ?");
mysqli_stmt_execure($statement);


mysqli_stmt_store_result($statement);
mysqli_stmt_execute($statement);


mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $id, $pw, $mg);


$response = array();
$response["success"] = false;

while(mysqli_stmt_fetch($statement)) {
    $response["success"] = true;
    $response["id"] = $id;
    $response["pw"] = $pw;
    $response["mg"] = $mg;
}

echo json_encode($response);

?>