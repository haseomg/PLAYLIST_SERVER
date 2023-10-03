<?php

header("Content-Type:text/html;charset=utf-8");

$text_data = $_POST['text'];

$target_dir = "uploads/";

$filename = pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);
$extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
$unique_name = $filename . '_' . time() . '.' . $extension;
$target_file = $target_dir . $unique_name;

// Check if MIME type is valid
$uploadedFileType = $_FILES['file']['type'];
$allowedMimeTypes = array('audio/mpeg', 'audio/wav', 'audio/ogg', 'audio/mp4', 'audio/x-wav'); // MIME types 필요하면 추가 가능

$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// if (!isset($_FILES["file"])) {
//     echo "file is not setting. ";
// } else {
//     echo "file is setting. " . $_FILES["file"];
// }


// $allowed_formats = array("audio/mp3", "audio/wav", "audio/m4a");
// $file_type = $_FILES['file']['type'];

// if (in_array($file_type, $allowed_formats)) {
//     // 이 부분에서 파일 처리와 저장
//     echo "ok";
// } else {
//     // 적절한 MIME 타입이 아닌 경우, 에러 메시지 반환
//     header("HTTP/1.0 400 Bad Request");
//     echo "not upload";
//     // echo json_encode(array("error" => "Invalid file type. Please upload an allowed audio format."));
// }


// if (!in_array($uploadedFileType, $allowedMimeTypes)) {
//     // Invalid MIME type, stop processing and return an error message
//     echo "Invalid MIME type or unsupported file type. ";
//     // exit;
// }


// if (empty($fileType)) {
//     echo "Invalid file format or missing file extension." . $_FILES["file"]["name"];
//     $uploadOk = 0;
// }

// if (file_exists($target_file)) {
//     echo "Sorry, file already exists: (" . $target_file . ") " . $_FILES["file"]["name"];
//     $uploadOk = 0;
// }

// // Check file size
// if ($_FILES["file"]["size"] > 500000) {
//     echo "Sorry, your file is too large." . $_FILES["file"]["name"];
//     $uploadOk = 0;
// }

// Comment out file format checking
// if ($fileType != "mp3" && $fileType != "wav" && $fileType != "ogg" && $fileType != "flac") {
//     echo "Sorry, only MP3, WAV, OGG, & FLAC files are allowed. (" . $fileType . ")" . $_FILES["file"]["name"];
//     $uploadOk = 0;
// }




// Check if $uploadOk is set to 0 by an error

// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded." . $_FILES["file"]["name"];
// } else {
//     if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
//         echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
//         // 추가: 텍스트 데이터가 포함된 응답 반환
//         echo "\nReceived text data: " . $text_data;
//     } else {
//         echo "Sorry, there was an error uploading your file." . $_FILES["file"]["name"];
//     }
// }

if ($uploadOk == 0) {
    $response_array['status'] = 'error';
    $response_array['reason'] = "Sorry, your file was not uploaded. " . $_FILES["file"]["name"];
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $response_array['status'] = 'success';
        $response_array['file'] = htmlspecialchars(basename($_FILES["file"]["name"]));
        $response_array['received_text'] = $text_data; // No Value
    } else {
        $response_array['status'] = 'error';
        $response_array['reason'] = "Sorry, there was an error uploading your file. " . $_FILES["file"]["name"];
    }
}

header('Content-Type: application/json');
echo json_encode($response_array);
?>