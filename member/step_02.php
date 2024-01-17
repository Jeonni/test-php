<?php
require_once '../member/model/SignupModel.php';

$signupModel = new SignupModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $signupModel->signupSavePhoneNumber();
}
?>

<!-- 회원가입 2단계 (본인 확인) -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">

<?php include "../member/layout/head.php"; ?>

<body>
	<div id="skip-nav">
		<a href="#content">본문 바로가기</a>
	</div>

	<?php include "../member/layout/header.php"; ?>

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

							<form action="" method="post">
								<br />
								<input type="text" class="input-text" id="phone_1" name="phone_1" style="width:50px" required /> -
								<input type="text" class="input-text" id="phone_2" name="phone_2" style="width:50px" /> -
								<input type="text" class="input-text" id="phone_3" name="phone_3" style="width:50px" />
								<button type="button" class="btn-s-line" onclick="requestVerificationCode()">인증번호 받기</button>

								<br /><br />
								<input type="text" class="input-text" id="user_input_code" name="user_input_code" style="width:200px" required />
								<button type="submit" class="btn-s-line">인증번호 확인</button>
							</form>
						</div>
						<i class="graphic-phon"><span>휴대폰 인증</span></i>
					</div>
				</div>

			</div>
		</div>
	</div>

	<?php include "../member/layout/footer.php"; ?>

	</div>
</body>

</html>