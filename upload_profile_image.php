<?php
$targetDir = "profile_image/"; // 업로드된 파일을 저장할 디렉토리 경로
$targetFile = $targetDir . basename($_FILES["file"]["name"]); // 업로드된 파일의 저장 경로

// 파일을 지정된 경로로 이동
if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
    echo "파일이 성공적으로 업로드되었습니다.";

} else {
    echo "파일 업로드 실패";
}
?>
