<!-- 로그인 -->
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


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">

<?php include "../member/views/includes/head.php"; ?>

<body>
	<div class="login-section">
		<div class="bg"></div>
		<div class="login-inner">
			<h1><a href="/"><img src="http://img.hackershrd.com/common/logo.png" alt="해커스 HRD LOGO" width="142" height="31" /></a></h1>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div class="box-login">
					<div class="login-input">
						<div class="input-text-box">
							<input type="text" class="input-text mb5" placeholder="아이디" name="user_id" style="width:190px" />
							<input type="password" class="input-text" placeholder="비밀번호" name="password" style="width:190px" />
						</div>
						<button type="submit" class="btn-login">로그인</button>
					</div>

					<div class="login-chk">
						<label class="input-sp">
							<input type="checkbox" />
							<span class="input-txt">아이디 저장</span>
						</label>
						<label class="input-privacy on">보안접속 ON <input type="checkbox" title="IP 보안이 켜져 있습니다. IP보안을 사용하지 않으시려면 선택을 해제해주세요." /></label>
					</div>

					<div class="box-btn">
						<a href="#" class="btn-m-gray" id="signup-link">회원가입</a>
						<a href="#" class="btn-m-gray" id="find-id-pw">ID/PW 찾기</a>
					</div>
				</div>
			</form>
			<div class="login-guide">
				<strong><i class="icon-guide"></i>로그인에 문제가 있으신가요?</strong>
				<ol>
					<li>① 인터넷 창 상단 [도구] - [인터넷 옵션] - [보안] - [사용자 지정 수준] - [보통] 으로 설정해주세요.</li>
					<li>② 인터넷 창을 껐다 다시 켜주세요. 그래도 로그인에 문제가 있으시다면 <a href="#"><strong class="tc-brand">[고객센터]</strong></a>를 통해 문의해주세요.</li>
				</ol>
			</div>

			<div class="link-box">
				<a href="#">환급과정안내</a>
				<a href="#">기업교육문의</a>
				<a href="#">상담/고객센터</a>
			</div>

			<div class="login-banner">
				<div class="bxslider-default" data-mode="fade" data-auto="true" data-controls="true" data-pager="true" style="height:182px">
					<?php include "../member/views/includes/images/images.php"; ?>
				</div>
			</div>
		</div>
		<span class="login-close"><button type="button" class="icon-layer-close"><span class="hidden">닫기</span></button></span>
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var signupLink = document.getElementById('signup-link');
			var findIdPw = document.getElementById('find-id-pw');

			signupLink.addEventListener('click', function(event) {
				// 기본 동작(링크 이동)을 막기
				event.preventDefault();

				// 실제로 이동할 URL과 쿼리 문자열 설정
				var targetUrl = "/member/index.php";
				var queryString = "mode=step_01";

				// 쿼리 문자열을 포함한 최종 URL 생성
				var finalUrl = targetUrl + "?" + queryString;

				// 생성된 URL로 이동
				window.location.href = finalUrl;
			});

			findIdPw.addEventListener('click', function(event) {
				event.preventDefault();

				var targetUrl = "/member/index.php";
				var queryString = "mode=find_id";

				var findUrl = targetUrl + "?" + queryString;

				window.location.href = findUrl;
			});
		});
	</script>
</body>

</html>