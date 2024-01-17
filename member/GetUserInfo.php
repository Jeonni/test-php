<?php
session_start();

require_once "../member/config/db.php";

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM test_user WHERE user_id = '$user_id'";

// 쿼리 실행 및 결과 저장
$result = $conn->query($sql);

// 결과에서 사용자 정보 가져오기
if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
} else {
    // 사용자 정보가 없을 경우의 처리
    echo "사용자 정보를 찾을 수 없습니다.";
}

// MySQL 데이터베이스 연결 닫기
$conn->close();

$_SESSION['id'] = $user_data['id'];
