<?php
class SignupModel
{
    public function signupSavePhoneNumber()
    {
        session_start();
        $message = '';

        $_SESSION['phone_number1'] = isset($_POST['phone_1']) ? $_POST['phone_1'] : '';
        $_SESSION['phone_number2'] = isset($_POST['phone_2']) ? $_POST['phone_2'] : '';
        $_SESSION['phone_number3'] = isset($_POST['phone_3']) ? $_POST['phone_3'] : '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION['verification_code'] = '123456';
            $userInputCode = isset($_POST['user_input_code']) ? $_POST['user_input_code'] : '';

            if ($userInputCode === $_SESSION['verification_code']) {
                header('Location: /member/index.php?mode=step_03');
                exit;
            } else {
                $message = '본인확인 실패! 올바른 인증번호를 입력하세요.';
                echo '<script>alert("' . $message . '"); history.back();</script>';
                exit;
            }
        }
    }

    public function signupProcess()
    {
        require_once "../config/db.php";

        $hashedPassword = hash('sha256', $_POST['password']);
        $email = $_POST['email_prefix'] . "@" . $_POST['email_domain'];
        $phone_number =  $_POST['phone_1'] . "-" . $_POST['phone_2'] . "-" . $_POST['phone_3'];
        $landline_number = $_POST['landline_1'] . "-" . $_POST['landline_2'] . "-" . $_POST['landline_3'];

        $sql = "INSERT INTO
         test_user (name, user_id, password, email, phone_number, landline_number, address)
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
    }
}
