<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include_once("retrofit_config.php");

    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $pwCheck = $_POST['pwCheck'];
    $nickname= $_POST['nickname'];

    if($id == '' || $pw == '' || $pwCheck == '' || $nickname == '')
    {
        echo json_encode(array(
            "status" => "false",
            "message" => "필수 인자가 부족합니다")
        );
    } else {


        
        $query = "SELECT * FROM retrofit_user WHERE id = '$id'";
        $result= mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){  
        echo json_encode(array( "status" => "false","message" => "이미 존재하는 아이디입니다") );




        } else { 
            $query = "INSERT INTO retrofit_user (id,pw,pw,pwCheck) VALUES ('$id','$pw','$pwCheck','$nickname')";
            if(mysqli_query($conn,$query))
            {
                $query= "SELECT * FROM retrofit_user WHERE id='$id'";
                $result= mysqli_query($conn, $query);
                $emparray = array();
                if(mysqli_num_rows($result) > 0)
                {  
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        $emparray[] = $row;
                    }
                } echo json_encode(
                    array(
                        "status" => "true",
                        "message" => "회원가입 성공",
                        "data" => $emparray)
                    );
            } else {
                echo json_encode(
                    array(
                    "status" => "false",
                    "message" => "에러가 발생했습니다. 다시 시도해 주세요"
                    )
                );
            }
    }
    mysqli_close($conn);
    }
}