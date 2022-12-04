<?php

    include "dbcon.php";

    $result = mysqli_query
    ($conn, "INSERT INTO kakao_api(id, nickname) VALUES ('$_POST[id]','$_POST[nickname]')");
    // mysqli_close($conn);



    if($result) {
        // 성공
        echo 1;
    } else {
        // 실패
        echo 0;
    }

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
//     include "dbcon.php";

//     $id = $_POST["id"];
//     $nickname = $_POST["nickname"];

//     if ($id == '' || $nickname == '') {
//         echo json_encode(array(
//             "status" => "false",
//             "message" => "필수 인자가 부족합니다")
//         );

//     } else {
//        $query = "SELECT * FROM kakao_api WHERE id='$id'";
//         $result = mysqli_query($conn, $query);

//         if(mysqli_num_rows($result) > 0){  
//         echo json_encode(array( "status" => "false","message" => "이미 존재하는 이름입니다") );
//         } else { 
//             $query = "INSERT INTO kakao_api (id,nickname) VALUES ('$id','$nickname')";
            
//             if(mysqli_query($conn, $query)) {
//                 $query = "SELECT * FROM kako_api WHERE id='$id'";
//                 $result = mysqli_query($conn, $query);
//                 $emparray = array();

//                 if(mysqli_num_rows($result) > 0) {  
//                     while ($row = mysqli_fetch_assoc($result)) {
//                         $emparray[] = $row;
//                     }
//                 }
//                 echo json_encode(
//                     array(
//                         "status" => "true",
//                         "message" => "회원가입 성공",
//                         "data" => $emparray)
//                     );
//             }
//             else
//             {
//                 echo json_encode(
//                     array(
//                     "status" => "false",
//                     "message" => "에러가 발생했습니다. 다시 시도해 주세요"
//                     )
//                 );
//             }
//     }
//     mysqli_close($conn);
//     }
// }

?>