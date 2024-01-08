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
	<?php
	include "../includes/header.php";
	?>

	<div id="container" class="container-full">
		<div id="content" class="content">
			<div class="inner">
				<div class="tit-box-h3">
					<h3 class="tit-h3">회원가입</h3>
					<div class="sub-depth">
						<span><i class="icon-home"><span>홈</span></i></span>
						<strong>회원가입</strong>
					</div>
				</div>

				<div class="join-step-bar">
					<ul>
						<li><i class="icon-join-agree"></i> 약관동의</li>
						<li><i class="icon-join-chk"></i> 본인확인</li>
						<li class="last on"><i class="icon-join-inp"></i> 정보입력</li>
					</ul>
				</div>

				<div class="section-content">
					<form action="signupProcess.php" method="POST" id="signup-form">
						<table cellpadding="0" cellspacing="0" class="tbl-col-join">
							<colgroup>
								<col style="width:15%">
							</colgroup>
							<tbody>

								<tr>
									<th scope="col"><span class="icons">*</span>이름</th>
									<td><input type="name" name="name" class="input-text" id="name" style="width:302px" /></td>
								</tr>
								<tr>
									<th scope="col"><span class="icons">*</span>아이디</th>
									<td><input type="text" class="input-text" style="width:302px" placeholder="영문자로 시작하는 4~15자의 영문소문자, 숫자" /><a href="#" class="btn-s-tin ml10">중복확인</a></td>
								</tr>
								<tr>
									<th scope="col"><span class="icons">*</span>비밀번호</th>
									<td><input type="password" name="password" class="input-text" id="password" style="width:302px" placeholder="8-15자의 영문자/숫자 혼합" /></td>
								</tr>
								<tr>
									<th scope="col"><span class="icons">*</span>비밀번호 확인</th>
									<td><input type="password" class="input-text" id="password-check" style="width:302px" /></td>
								</tr>
								<tr>
									<th scope="col"><span class="icons">*</span>이메일주소</th>
									<td>
										<input type="email" name="email" class="input-text" id="email" style="width:302px" />
									</td>
								</tr>
								<tr>
									<th scope="col"><span class="icons">*</span>휴대폰 번호</th>
									<td>
										<input type="phone_number" name="phone_number" class="input-text" id="phone_number" style="width:302px" />
									</td>
								</tr>
								<tr>
									<th scope="col"><span class="icons"></span>일반전화 번호</th>
									<td>
										<input type="landline_number" name="landline_number" class="input-text" id="landline_number" style="width:302px" />
									</td>
								</tr>
								<tr>
									<th scope="col"><span class="icons">*</span>주소</th>
									<td>
										<p>
											<label>우편번호 <input type="text" class="input-text ml5" style="width:242px" disabled /></label><a href="#" class="btn-s-tin ml10">주소찾기</a>
										</p>
										<p class="mt10">
											<label>주소 <input type="address" name="address" class="input-text ml5" id="address" style="width:719px" /></label>
										</p>
									</td>
								</tr>
							</tbody>
						</table>

						<div class="box-btn">
							<button type="button" id="signup-button" class="btn-l">회원가입</a>
						</div>

					</form>

					<!-- 비밀번호 일치 확인 -->
					<script>
						const signupForm = document.querySelector("#signup-form");
						const signupButton = document.querySelector("#signup-button");
						const password = document.querySelector("#password");
						const passwordCheck = document.querySelector("#password-check");

						signupButton.addEventListener("click", function(e) {
							if (password.value && password.value === passwordCheck.value) {

								signupForm.submit();
							} else {
								alert("비밀번호가 일치하지 않습니다");
							}
						});
					</script>
				</div>
			</div>
		</div>
	</div>

	<!-- Header include -->
	<?php
	include "../includes/footer.php";
	?>

	</div>
</body>

</html>