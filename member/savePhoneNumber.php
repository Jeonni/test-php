<?php
session_start();

$message = ''; // 출력할 메시지를 저장할 변수

$_SESSION['phone_number1'] = isset($_POST['phone_1']) ? $_POST['phone_1'] : '';
$_SESSION['phone_number2'] = isset($_POST['phone_2']) ? $_POST['phone_2'] : '';
$_SESSION['phone_number3'] = isset($_POST['phone_3']) ? $_POST['phone_3'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 휴대폰 인증을 위한 세션 변수에 고정값 저장
    $_SESSION['verification_code'] = '123456';

    // 사용자가 입력한 인증번호
    $userInputCode = isset($_POST['user_input_code']) ? $_POST['user_input_code'] : '';

    // 저장된 세션의 인증번호와 사용자 입력이 일치하는지 확인
    if ($userInputCode === $_SESSION['verification_code']) {
        // 본인확인 성공
        header('Location: /member/index.php?mode=step_03'); // 다음 단계로 이동
        exit;
    } else {
        // 본인확인 실패
        $message = '본인확인 실패! 올바른 인증번호를 입력하세요.';
        echo '<script>alert("' . $message . '"); history.back();</script>'; // 경고창 표시 후 이전 페이지로 이동
        exit;
    }
}
