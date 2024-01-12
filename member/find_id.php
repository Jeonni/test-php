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

<?php include "../member/views/includes/head.php"; ?>

<body>
	<!-- skip nav -->
	<div id="skip-nav">
		<a href="#content">본문 바로가기</a>
	</div>
	<!-- //skip nav -->

	<!-- Header include -->
	<?php include "../member/views/includes/header.php"; ?>

	<div id="container" class="container-full">
		<div id="content" class="content">
			<div class="inner">
				<div class="tit-box-h3">
					<h3 class="tit-h3">아이디/비밀번호 찾기</h3>
					<div class="sub-depth">
						<span><i class="icon-home"><span>홈</span></i></span>
						<strong>아이디/비밀번호 찾기</strong>
					</div>
				</div>

				<ul class="tab-list">
					<li class="on"><a href="#">아이디 찾기</a></li>
					<li><a href="#">비밀번호 찾기</a></li>
				</ul>

				<div class="tit-box-h4">
					<h3 class="tit-h4">아이디 찾기 방법 선택</h3>
				</div>

				<dl class="find-box">
					<dt>휴대폰 인증</dt>
					<dd>
						고객님이 회원 가입 시 등록한 휴대폰 번호와 입력하신 휴대폰 번호가 동일해야 합니다.
						<label class="input-sp big">
							<input type="radio" name="radio" checked="checked" />
							<span class="input-txt"></span>
						</label>
					</dd>
				</dl>

				<dl class="find-box">
					<dt>이메일 인증</dt>
					<dd>
						고객님이 회원 가입 시 등록한 이메일 주소와 입력하신 이메일 주소가 동일해야 합니다.
						<label class="input-sp big">
							<input type="radio" name="radio" />
							<span class="input-txt"></span>
						</label>
					</dd>
				</dl>

				<div class="section-content mt30">
					<table cellpadding="0" cellspacing="0" class="tbl-col-join">
						<caption class="hidden">아이디 찾기 개인정보 입력</caption>
						<colgroup>
							<col style="width:15%" />
						</colgroup>


						<form action="findIdProcess.php" method="POST">
							<tbody>
								<tr>
									<th scope="col">성명</th>
									<td><input type="text" name="name" id="name" class="input-text" style="width:302px" /></td>
								</tr>

								<tr>
									<th scope="col">휴대폰 번호</th>
									<td><input type="text" name="phone_1" id="phone_1" class="input-text" style="width:140px" /> -
										<input type="text" name="phone_2" id="phone_2" class="input-text" style="width:140px" /> -
										<input type="text" name="phone_3" id="phone_3" class="input-text" style="width:140px" />
										<button type="button" class="btn-s-tin ml10" onclick="requestVerificationCode()">인증번호 받기</button>
									</td>
								</tr>


								<tr>
									<th scope="col">인증번호</th>
									<td>
										<input type="text" class="input-text" id="user_input_code" name="user_input_code" style="width:478px" />
										<button type="submit" class="btn-s-tin ml10">인증번호 확인</button>
									</td>
								</tr>
							</tbody>
						</form>


					</table>

				</div>
			</div>
		</div>
	</div>

	<!-- Footer include  -->
	<?php include "../member/views/includes/footer.php"; ?>
</body>

</html>