<!-- 회원가입 2단계 (본인 확인) -->

<?php
session_start();

$message = ''; // 출력할 메시지를 저장할 변수

$_SESSION['phone_number1'] = isset($_POST['phone_1']) ? $_POST['phone_1'] : '';
$_SESSION['phone_number2'] = isset($_POST['phone_2']) ? $_POST['phone_2'] : '';
$_SESSION['phone_number3'] = isset($_POST['phone_3']) ? $_POST['phone_3'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// 휴대폰 인증을 위한 세션 변수에 고정값 저장
	$_SESSION['verification_code'] = '123456';

	// 사용자가 입력한 인증번호
	$userInputCode = isset($_POST['user_input_code']) ? $_POST['user_input_code'] : '';

	// 저장된 세션의 인증번호와 사용자 입력이 일치하는지 확인
	if ($userInputCode === $_SESSION['verification_code']) {
		// 본인확인 성공
		header('Location: /member/index.php?mode=step_03'); // 다음 단계로 이동
		exit;
	} else {
		// 본인확인 실패
		$message = '본인확인 실패! 올바른 인증번호를 입력하세요.';
		echo '<script>alert("' . $message . '"); history.back();</script>'; // 경고창 표시 후 이전 페이지로 이동
		exit;
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<!--[if (IE 7)]><html class="no-js ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<!--[if (IE 8)]><html class="no-js ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" id="X-UA-Compatible" content="IE=EmulateIE8" />
	<title>해커스 HRD</title>
	<meta name="description" content="해커스 HRD" />
	<meta name="keywords" content="해커스, HRD" />

	<!-- 파비콘설정 -->
	<link rel="shortcut icon" type="image/x-icon" href="http://img.hackershrd.com/common/favicon.ico" />

	<!-- xhtml property속성 벨리데이션 오류/확인필요 -->
	<meta property="og:title" content="해커스 HRD" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://www.hackershrd.com/" />
	<meta property="og:image" content="http://img.hackershrd.com/common/og_logo.png" />

	<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/common.css" />
	<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/bxslider.css" />
	<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/main.css" /><!-- main페이지에만 호출 -->
	<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/sub.css" /><!-- sub페이지에만 호출 -->
	<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/login.css" /><!-- login페이지에만 호출 -->

	<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/bxslider.js"></script>
	<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/ui.js"></script>
	<!--[if lte IE 9]> <script src="/js/common/place_holder.js"></script> <![endif]-->

</head>

<body>
	<!-- skip nav -->
	<div id="skip-nav">
		<a href="#content">본문 바로가기</a>
	</div>
	<!-- //skip nav -->

	<!-- Header include -->
	<?php include "../includes/header.php"; ?>

	<div id="container" class="container-full">
		<div id="content" class="content">
			<div class="inner">
				<div class="tit-box-h3">
					<h3 class="tit-h3">회원가입</h3>
					<div class="sub-depth">
						<span><i class="icon-home"><span>홈</span></i></span>
						<strong>회원가입 완료</strong>
					</div>
				</div>

				<div class="join-step-bar">
					<ul>
						<li><i class="icon-join-agree"></i> 약관동의</li>
						<li class="on"><i class="icon-join-chk"></i> 본인확인</li>
						<li class="last"><i class="icon-join-inp"></i> 정보입력</li>
					</ul>
				</div>

				<div class="tit-box-h4">
					<h3 class="tit-h4">본인인증</h3>
				</div>

				<div class="section-content after">
					<div class="identify-box" style="width:100%;height:190px;">
						<div class="identify-inner">
							<strong>휴대폰 인증</strong>
							<p>주민번호 없이 메시지 수신 가능한 휴대폰으로 1개 아이디만 회원가입이 가능합니다. </p>

							<form id="phoneVerificationForm" action="/member/step_02.php" method="post">
								<br />
								<label for="phone_number">인증번호 입력:</label>
								<input type="text" class="input-text" id="phone_1" name="phone_1" style="width:50px" required /> -
								<input type="text" class="input-text" id="phone_2" name="phone_2" style="width:50px" /> -
								<input type="text" class="input-text" id="phone_3" name="phone_3" style="width:50px" />
								<button type="button" class="btn-s-line" onclick="requestVerificationCode()">인증번호 받기</button>

								<br /><br />
								<label for="user_input_code">인증번호 확인:</label>
								<input type="text" class="input-text" id="user_input_code" name="user_input_code" style="width:200px" required />
								<button type="submit" class="btn-s-line">인증번호 확인</button>
							</form>
						</div>
						<i class="graphic-phon"><span>휴대폰 인증</span></i>
					</div>

					<script>
						function requestVerificationCode() {
							//간단한 유효성 검사 수행
							var phoneInput1 = document.getElementById('phone_1');
							var phoneInput2 = document.getElementById('phone_2');
							var phoneInput3 = document.getElementById('phone_3');

							if (!(isValidPhoneNumber1(phoneInput1.value) && isValidPhoneNumber2(phoneInput2.value) && isValidPhoneNumber2(phoneInput3.value))) {
								alert('올바른 휴대폰 번호를 입력하세요.');
								return;
							}

							// 유효성 검사를 통과한 경우, 실제로는 서버에 요청을 보내고 인증번호를 받아와야 함
							alert('인증번호를 요청합니다.');
						}

						function isValidPhoneNumber1(phoneNumber) {
							// 간단한 유효성 검사 (1) 3개의 숫자로만 입력돼야 함
							var regex = /^\d{3}$/;
							return regex.test(phoneNumber);
						}

						function isValidPhoneNumber2(phoneNumber) {
							// 간단한 유효성 검사 (2) 4개의 숫자로만 입력돼야 함
							var regex = /^\d{4}$/;
							return regex.test(phoneNumber);
						}
					</script>
				</div>

			</div>
		</div>
	</div>

	<!-- Footer include  -->
	<?php include "../includes/footer.php"; ?>

	</div>
</body>

</html>