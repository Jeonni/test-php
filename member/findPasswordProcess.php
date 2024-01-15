<?php
require_once "../member/config/db.php";

session_start();

$name = $_POST['name'];
$user_id = $_POST['user_id'];
$phone_number =  $_POST['phone_1'] . "-" . $_POST['phone_2'] . "-" . $_POST['phone_3'];
$email_prefix = $_POST['email_prefix'];
$email_domain =  $_POST['email_domain'];

if (empty($name) || empty($user_id) || empty($phone_number) || empty($email_prefix) || empty($email_domain)) {
    $message = '이름, 아이디, 휴대폰 번호, 이메일을 모두 입력해주세요.';
    echo '<script>alert("' . $message . '"); history.back();</script>';
    exit;
}

$email = $email_prefix . "@" . $email_domain;

$sql = "SELECT password FROM test_user WHERE name = '$name' AND user_id = '$user_id' AND email = '$email' AND phone_number = '$phone_number'";
$result = mysqli_query($conn, $sql);

$_SESSION['user_id'] = $user_id;

if ($result) {
    $row = mysqli_fetch_assoc($result);

    if (empty($row['password'])) {
        $message = '이름, 휴대폰 번호, 이메일이 일치하는 사용자가 없습니다.';
        echo '<script>alert("' . $message . '"); history.back();</script>';
        exit;
    }

    $_SESSION['verification_code'] = '123456';
    $userInputCode = isset($_POST['user_input_code']) ? $_POST['user_input_code'] : '';

    if ($userInputCode === $_SESSION['verification_code']) {
        // echo "귀하의 아이디는: " . $row['user_id'];
        header('Location: /member/index.php?mode=find_pass_success');
        exit;
    } else {
        $message = '본인확인 실패! 올바른 인증번호를 입력하세요.';
        echo '<script>alert("' . $message . '"); history.back();</script>';
        exit;
    }
} else {
    $message = '데이터베이스 쿼리 에러: ' . mysqli_error($conn);
    echo '<script>alert("' . $message . '"); history.back();</script>';
    exit;
}
