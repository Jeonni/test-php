<?php

$host = '172.16.0.28';
$user = 'jeonni';
$pw = 'test123456';
$dbName = 'test_db';

$conn = mysqli_connect($host, $user, $pw, $dbName);
if (mysqli_connect_errno())
{
    echo "MySQL 접속 실패". mysqli_connect_error();
    exit;
}else{
    echo "MySQL 접속 성공";
}

/* $sql = "INSERT INTO users(user_id, username, password, email, phone_number, landline_number, address, detailed_address, receive_sms, receive_email) VALUES (1, '이지연', '1234', 'jeo@naver.com', '010-1234-5678', '062-945-5066', '인천광역시 어쩌고', '논현동 202동 101호', true, true)";

if($conn->query($sql) === true) {echo "success!";}
else{echo "error..";} */

mysqli_close($conn);

?>