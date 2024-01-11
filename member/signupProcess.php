<!-- 회원가입 유저 데이터 DB 저장 -->
<?php
require_once "../member/config/db.php";

// 비밀번호 해싱
$hashedPassword = hash('sha256', $_POST['password']);

// 이메일 주소 병합 
$email = $_POST['email_prefix'] . "@" . $_POST['email_domain'];

// 휴대폰 번호 병합
$phone_number =  $_POST['phone_1'] . "-" . $_POST['phone_2'] . "-" . $_POST['phone_3'];

// 일반전화 번호 병합
$landline_number = $_POST['landline_1'] . "-" . $_POST['landline_2'] . "-" . $_POST['landline_3'];

$sql = "INSERT INTO test_user (name, user_id, password, email, phone_number, landline_number, address)
        VALUES (
            '{$_POST['name']}', 
            '{$_POST['user_id']}', 
            '{$hashedPassword}', 
            '{$email}', 
            '{$phone_number}', 
            '{$landline_number}', 
            '{$_POST['address']}')";
$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
    echo mysqli_error($conn);
} else {
    header('Location: /member/index.php?mode=complete');
}
?>