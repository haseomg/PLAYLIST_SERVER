
<?php
header('Content-Type: application/json; charset=utf-8');

// TODO 1. post로 받은 id의 값이 명확합니까?
// TODO 2. database랑 php랑 연결이 잘 돼서 user 테이블의 아이디를 조회를 잘해서 비교하는가?
// TODO 3. 왜 중복되는 아이디 갯수가 항상 0개인가?
// TODO 4. 제이슨 잘 못 다루니까.. 조금만 더 해보고 일요일 안에 이거 1빠로
// 끝내야 하니까... 제이슨 다음에 쓰등가.. 못하면.....




// MySQL 데이터베이스 연결
$conn = mysqli_connect("localhost", "haseomg", "0908", "pinni_api");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// POST로 받은 아이디
$id = $_POST['id'];

// SQL 쿼리 실행
$sql = "SELECT * FROM user WHERE id='$id'";
$result = mysqli_query($conn, $sql);
// $result = mysqli_fetch_array(mysqli_query($conn, $sql));

// if (!$result) {
//     $response = array("status" => "ok");
// } else {
//     $response = array("status" => "duplicated");
// }

// 중복되는 아이디가 있는지 검사
if (mysqli_num_rows($result) > 0) {
    echo "duplicate";
} else {
    echo "ok";
}


mysqli_close($conn);
?>