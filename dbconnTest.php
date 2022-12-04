<?php

$conn = mysqli_connect("localhost", "root", "0908", "pinni_api");

if ($conn) {
    echo "Succeed";
} else {
    echo "failed";
    echo "[Could not connect to MySQL] 이유는 : ";
    echo mysqli_connect_error($conn);
    echo " ☄️☄️";
}