<?php
require_once "../member/config/db.php";

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email_prefix = mysqli_real_escape_string($conn, $_POST['email_prefix']);
$email_domain = mysqli_real_escape_string($conn, $_POST['email_domain']);

$email = $email_prefix . "@" . $email_domain;

$sql = "SELECT user_id FROM test_user WHERE name = '$name' AND email = '$email'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        echo "귀하의 아이디는: " . $row['user_id'];
    } else {
        echo "해당하는 아이디가 존재하지 않습니다.";
    }
} else {
    echo "쿼리 실행에 실패했습니다.";
}

mysqli_close($conn);
?>
