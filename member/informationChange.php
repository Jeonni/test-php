<?php
session_start();

include "../member/config/db.php";
$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email_prefix'] . "@" . $_POST['email_domain'];
    $landline_number = $_POST['landline_1'] . "-" . $_POST['landline_2'] . "-" . $_POST['landline_3'];

    $sql = "UPDATE test_user SET
            user_id = '{$_POST["user_id"]}',
            password = '{$_POST["password"]}',
            email = '{$email}',
            landline_number = '{$landline_number}',
            address = '{$_POST["address"]}'
            WHERE id = '{$id}'";

    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        echo "업데이트에 문제가 생겼습니다. 관리자에게 문의 부탁드려요.";
        echo mysqli_error($conn);
    } else {
        echo "사용자 정보 업데이트";
    }
} else {
    echo "폼이 제출되지 않았습니다.";
}
