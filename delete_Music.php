<?php
include "dbcon.php";

// 넘어온 폼 데이터 name
$name = $_POST['name'];

// music table에서 name에 맞춰 조회
$sql = "DELETE * FROM music WHERE name = $name";

if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}

mysqli_close($conn);

?>