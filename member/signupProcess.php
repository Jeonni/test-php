<?php
$conn = mysqli_connect('172.16.0.28', 'jeonni', 'test123456', 'test_db');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 중복 아닐 시 회원가입 진행
    $sql = "INSERT INTO test_user (name, user_id, password, email, phone_number, landline_number, address)
        VALUES (
            '{$_POST['name']}', 
            '{$_POST['user_id']}', 
            '{$hashedPassword}', 
            '{$_POST['email']}', 
            '{$_POST['phone_number']}', 
            '{$_POST['landline_number']}', 
            '{$_POST['address']}')";

    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
        echo mysqli_error($conn);
    } else {
        $message = '회원가입이 완료되었습니다.';
        header('Location: /member/index.php?mode=step_04');
    }
} else {
    echo "잘못된 요청입니다.";
}
