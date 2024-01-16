<?php
require_once "../member/config/db.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$input_user_id = $_POST["user_id"];
	$input_password = $_POST["password"];

	// 데이터베이스에서 사용자 정보 가져오기
	$sql = "SELECT user_id, password FROM test_user WHERE user_id = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $input_user_id);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows == 1) {
		$row = $result->fetch_assoc();
		$hashed_password = $row["password"];

		// 비밀번호 검증
		if (hash('sha256', $input_password) === $hashed_password) {
			$_SESSION["loggedin"] = true;
			$_SESSION["user_id"] = $row["user_id"];

			// 리퍼러를 통한 리다이렉트 처리
			$redirect_url = $_SERVER['HTTP_REFERER'] ?? '/'; // 기본값은 현재 페이지로 설정

			// 로그인 성공 시 메인 페이지로 리다이렉트
			header("Location: /");
			exit;
		} else {
			echo "<script>alert('아이디 혹은 비밀번호를 다시 입력해주세요.');</script>";

			// 로그인 실패 시 이전 페이지로 리다이렉트
			header("Location: $redirect_url");
		}
	} else {
		echo "<script>alert('아이디 혹은 비밀번호를 다시 입력해주세요.');</script>";
	}

	$stmt->close();
}

$conn->close();
?>