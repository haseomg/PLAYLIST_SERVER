<?php
include "dbcon.php";

$selected_song = $_POST['selected_song'];
echo $selected_song . '- selected song';

$selected_sql = "SELECT * FROM music WHERE name = '$selected_song'";
$selected_result = mysqli_query($conn, $selected_sql);
$selected_match = mysqli_fetch_array($selected_result);

if ($selected_match == 0) {
    echo ' not match';

} else {
    echo $selected_match['num'];
    echo "___";
    echo $selected_match['artist'];
    echo "###";
    echo $selected_match['path'];
    echo "/";
    echo $selected_match['name'];
    echo "@@@";
    echo $selected_match['time'];
    exit();
} // else 
?>