<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST["new-password"];
    $confirm_password = $_POST["new-password-check"];

    // 사용자 아이디
    $user_id = $_SESSION['user_id'];

    // 비밀번호 확인
    if ($new_password === $confirm_password) {
        // 새로운 비밀번호 해싱 (SHA-256)
        $hashed_new_password = hash('sha256', $new_password);

        // 비밀번호 업데이트
        require_once "config/db.php";
        $update_sql = "UPDATE test_user SET password = ? WHERE user_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ss", $hashed_new_password, $user_id);

        // 쿼리 실행 결과 확인
        if ($update_stmt->execute()) {
            // 업데이트 성공
            header("Location: /");
            exit();
        } else {
            // 업데이트 실패
            echo "업데이트 실패: " . $update_stmt->error;
        }
    } else {
        echo "<script>alert('신규 비밀번호와 확인 비밀번호가 일치하지 않습니다.');</script>";
    }

    $update_stmt->close();
    $conn->close();
}
