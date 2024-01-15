<?php
require_once "../member/config/db.php";

session_start();

$name = $_POST['name'];
$phone_number =  $_POST['phone_1'] . "-" . $_POST['phone_2'] . "-" . $_POST['phone_3'];

$sql = "SELECT user_id FROM test_user WHERE name = '$name' AND phone_number = '$phone_number'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['verification_code'] = '123456';
        $userInputCode = isset($_POST['user_input_code']) ? $_POST['user_input_code'] : '';

        if ($userInputCode === $_SESSION['verification_code']) {
            // header('Location: /member/index.php?mode=step_03'); // 다음 단계로 이동
            echo "귀하의 아이디는: " . $row['user_id'];
            exit;
        } else {
            $message = '본인확인 실패! 올바른 인증번호를 입력하세요.';
            echo '<script>alert("' . $message . '"); history.back();</script>';
            exit;
        }
    }
} else {
    echo "아이디가 존재하지 않습니다.";
}
