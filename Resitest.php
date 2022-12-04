<?php

$conn = mysqli_connect("%", "haseomg", "0908", "pinni_api");
mysqli_query($conn, 'SET NAMES utf8');


$id = $_POST["id"];
$pw = $_POST["pw"];
$mg = $_POST["mg"];


$statement = mysqli_prepare($conn, "INSERT INTO testTable VALUES (?,?,?)");
mysqli_stmt_bind_param($statement, "sss", $id, $pw, $mg);
mysqli_stmt_execute($statement);


$response = array();
$response["success"] = true;

echo json_encode($response);
?>