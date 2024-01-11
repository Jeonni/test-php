<!-- 아이디 중복확인 체크 -->
<?php
$conn = mysqli_connect('172.16.0.28', 'jeonni', 'test123456', 'test_db');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = mysqli_real_escape_string($conn, $_POST['user_id']);

    $sql = "SELECT * FROM test_user WHERE user_id = '{$userId}'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        http_response_code(400); // 이미 사용 중인 아이디일 경우 400 Bad Request 반환
        echo "duplicate";
    } else {
        echo "unique";
    }
} else {
    echo "잘못된 요청입니다.";
}
