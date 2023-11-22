<?php
$servername = "localhost";
$username = "haseomg";
$password = "0908";
$dbname = "pinni_api";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("연결 실패 (Connection failed): " . $conn->connect_error);

} else {
    // Connection check : success
    //echo 'Connection Success!';
}

// 카카오페이 API URL - 결제 준비 요청을 위한 엔드포인트
$url = "https://kapi.kakao.com/v1/payment/ready";

// HTTP 요청 헤더 - 인증키와 콘텐츠 타입 선언
$headers = array(
    "Authorization: KakaoAK 2d790f5f1eec22af17cdbce9ba7da60d", // 카카오 관리자 키를 입력하세요
    "Content-Type: application/x-www-form-urlencoded;charset=utf-8"
);

// 클라이언트로부터 POST 요청을 통해 받은 데이터를 변수에 저장
// partner_order_id == null
$partner_order_id = $_POST['partner_order_id'];
$partner_user_id = $_POST['partner_user_id'];
$item_name = $_POST['item_name'];
$quantity = $_POST['quantity'];
$total_amount = $_POST['total_amount'];

// 받은 정보들 출력해서 확인
//echo 'partner_order_id : ' . $partner_order_id;

// 'user' 테이블 업데이트 해줄 쿼리문, 쿼리의 파라미터에 실제 값을 바인딩
$user_update_sql = "UPDATE user SET membership_status = ? WHERE id = ?";
$stmt = $conn->prepare($user_update_sql);
$stmt->bind_param("ss", $item_name, $partner_user_id);

if ($stmt->execute()) {
  // 업데이트 성공

} else {
  // 업데이트 실패
} // else

$stmt->close();
$conn->close();

// 카카오 API에 보낼 POST 데이터 설정
$postData = array(
    "cid" => "TC0ONETIME", // 가맹점 코드(테스트를 위한 코드 - 실서비스 이전까지는 유지)
    "partner_order_id" => $partner_order_id, // 가맹점 주문 번호(클라이언트)
    "partner_user_id" => $partner_user_id, // 가맹점 회원 ID (클라이언트)
    "item_name" => $item_name, // 상품 이름(클라이언트)
    "quantity" => $quantity, // 상품 수량(클라이언트)
    "total_amount" => $total_amount, // 총 결제 금액(클라이언트)
    "vat_amount" => "0", // 부가세 금액(클라이언트)
    "tax_free_amount" => "0", // 비과세 금액
    "approval_url" => "http://13.124.239.85/membership_success.php", // 결제 성공 시 리다이렉트 URL (사용자를 리다이렉트할 URL - 내 서버 도메인)
    "fail_url" => "http://13.124.239.85/membership_fail.php", // 결제 실패 시 리다이렉트 URL 
    "cancel_url" => "http://13.124.239.85/membership_cancel.php" // 결제 취소 시 리다이렉트 URL
);

// cURL 세션 초기화
$ch = curl_init();

// cURL 세션에 옵션 설정
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// cURL 세션 실행 후 응답을 변수에 저장
$response = curl_exec($ch);

// cURL 세션 종료
curl_close($ch);
$result = json_decode($response);

// 받은 응답 출력
echo $response;
//return reponse(json_encode($result), 200)->header('Content-Type', 'application/json');

?>
