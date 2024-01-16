<?php
session_start(); // 세션 시작

require_once "../member/config/db.php";

// 세션에서 user_id 가져오기
$user_id = $_SESSION['user_id'];

// 사용자 정보를 가져오는 SQL 쿼리 작성
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

// $user_data를 JSON 형식으로 반환
// echo json_encode($user_data);
?>