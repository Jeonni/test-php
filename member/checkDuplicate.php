<?php
$conn = mysqli_connect('172.16.0.28', 'jeonni', 'test123456', 'test_db');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = mysqli_real_escape_string($conn, $_POST['user_id']);

    $sql = "SELECT * FROM test_user WHERE user_id = '{$userId}'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "duplicate";
    } else {
        echo "unique";
    }
} else {
    echo "잘못된 요청입니다.";
}
