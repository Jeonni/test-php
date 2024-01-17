<?php
session_start();

include "../member/config/db.php";
$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email_prefix'] . "@" . $_POST['email_domain'];
    $landline_number = $_POST['landline_1'] . "-" . $_POST['landline_2'] . "-" . $_POST['landline_3'];

    $hashedPassword = hash('sha256', $_POST['password']);

    $sql = "UPDATE test_user SET
            user_id = '{$_POST["user_id"]}',
            password = '{$hashedPassword}',
            email = '{$email}',
            landline_number = '{$landline_number}',
            address = '{$_POST["address"]}'
            WHERE id = '{$id}'";

    $result = mysqli_query($conn, $sql);

    $_SESSION["user_id"] = $row["user_id"];

    if ($result === false) {
        echo "<script>alert('업데이트에 문제가 생겼습니다. 관리자에게 문의 부탁드려요.');</script>";
        echo mysqli_error($conn);
    } else {
        session_destroy();
        echo '<script>alert("사용자 정보가 성공적으로 업데이트되었습니다. 다시 로그인해주세요."); window.location.href = "/";</script>';
        exit();
    }
} else {
    echo "폼이 제출되지 않았습니다.";
}
