<!-- 회원가입 유저 데이터 DB 저장 -->
<?php
$conn = mysqli_connect('172.16.0.28', 'jeonni', 'test123456', 'test_db');

// 비밀번호 해싱
$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

// 이메일 주소 병합 
$email = $_POST['email_prefix'] . "@" . $_POST['email_domain'];

// 휴대폰 번호 병함
$phone_number =  $_POST['phone_1'] . "-" . $_POST['phone_2'] . "-" . $_POST['phone_3'];

$sql = "INSERT INTO test_user (name, user_id, password, email, phone_number, landline_number, address)
        VALUES (
            '{$_POST['name']}', 
            '{$_POST['user_id']}', 
            '{$hashedPassword}', 
            '{$email}', 
            '{$phone_number}', 
            '{$_POST['landline_number']}', 
            '{$_POST['address']}')";

$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
    echo mysqli_error($conn);
} else {
    header('Location: /member/index.php?mode=step_04');
}
?>