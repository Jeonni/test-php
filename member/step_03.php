<!-- 회원가입 3단계(회원정보입력) -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">

<?php include "../member/views/includes/head.php"; ?>

<?php
session_start();

$phoneNumber1 = isset($_SESSION['phone_number1']) ? $_SESSION['phone_number1'] : '';
$phoneNumber2 = isset($_SESSION['phone_number2']) ? $_SESSION['phone_number2'] : '';
$phoneNumber3 = isset($_SESSION['phone_number3']) ? $_SESSION['phone_number3'] : '';
?>

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
									<td>
										<span id="id-check-result"></span>
										<input type="text" name="user_id" class="input-text" id="user-id" style="width:302px" placeholder="영문자로 시작하는 4~15자의 영문소문자, 숫자" oninput="validateId()" />
										<a href="#" class="btn-s-tin ml10" onclick="checkDuplicate()">중복확인</a>
										<div id="id-message" class="id-message"></div>
									</td>
								</tr>
								<tr>
									<th scope="col"><span class="icons">*</span>비밀번호</th>
									<td>
										<input type="password" name="password" class="input-text" id="password" style="width:302px" placeholder="8-15자의 영문자/숫자 혼합" oninput="validatePassword()" />
										<div id="password-message" class="password-message"></div>
									</td>
								</tr>
								<tr>
									<th scope="col"><span class="icons">*</span>비밀번호 확인</th>
									<td>
										<input type="password" class="input-text" id="password-check" style="width:302px" oninput="validateCheckPassword()" />
										<div id="password-message" class="password-message"></div>
									</td>
								</tr>
								<tr>
									<th scope="col"><span class="icons">*</span>이메일주소</th>
									<td>
										<input type="email" name="email_prefix" class="input-text" id="email" style="width:138px" /> @
										<select name="email_domain" class="input-sel" style="width:160px">
											<option value="gmail.com">gmail.com</option>
											<option value="naver.com">naver.com</option>
											<option value="daum.com">daum.com</option>
											<option value="nate.com">nate.com</option>
											<option value="hanmail.com">hanmail.com</option>
										</select>
									</td>
								</tr>
								<tr>
									<th scope="col"><span class="icons">*</span>휴대폰 번호</th>
									<td>
										<input type="tel" name="phone_1" id="phone_number" class="input-text" style="width:88px" value="<?php echo $phoneNumber1; ?>" readonly /> -
										<input type="tel" name="phone_2" id="phone_number" class="input-text" style="width:88px" value="<?php echo $phoneNumber2; ?>" readonly /> -
										<input type="tel" name="phone_3" id="phone_number" class="input-text" style="width:88px" value="<?php echo $phoneNumber3; ?>" readonly />
									</td>
								</tr>
								<tr>
									<th scope="col"><span class="icons"></span>일반전화 번호</th>
									<td>
										<input type="tel" name="landline_1" id="landline_number" class="input-text" style="width:88px" /> -
										<input type="tel" name="landline_2" id="landline_number" class="input-text" style="width:88px" /> -
										<input type="tel" name="landline_3" id="landline_number" class="input-text" style="width:88px" />
								</tr>
								<tr>
									<th scope="col"><span class="icons">*</span>주소</th>
									<td>
										<p>
											<label>우편번호 <input type="text" class="input-text ml5" style="width:242px" disabled /></label><a href="#" class="btn-s-tin ml10">주소찾기</a>
										</p>
										<p class="mt10">
											<label>주소 <input type="text" name="address" class="input-text ml5" id="address" style="width:719px" /></label>
										</p>
									</td>
								</tr>
							</tbody>
						</table>

						<div class="box-btn">
							<button type="button" id="signup-button" class="btn-l">회원가입</a>
						</div>

					</form>

					<!-- 다음 단계로 이동 -->
					<script>
						const signupForm = document.querySelector("#signup-form");
						const signupButton = document.querySelector("#signup-button");

						signupButton.addEventListener("click", function(e) {
							signupForm.submit();
						});
					</script>

					<!-- 아이디 정규식 유효성 검사 -->
					<script>
						function validateId() {
							const user_id = document.querySelector("#user-id");
							const messageDiv = document.getElementById('id-message');

							// 아이디 영문자로 시작하는 4-15자의 영소문자
							var userIdRegex = /^[a-z][a-z0-9]{3,14}$/;

							// 아이디 유효성 검사
							if (userIdRegex.test(user_id.value)) {
								messageDiv.innerHTML = "아이디 유효성 조건에 일치합니다.";
								messageDiv.style.color = "green";
							} else {
								messageDiv.innerHTML = "아이디는 영문자로 시작하는 4-15자의 영소문자, 숫자여야 합니다.";
								messageDiv.style.color = "red";
							}

						}
					</script>

					<!-- 아이디 입력여부 및 중복 검사 -->
					<script>
						function checkDuplicate() {
							const userIdInput = document.querySelector("#user-id");
							const idCheckResult = document.querySelector("#id-check-result");
							const signupButton = document.querySelector("#signup-button");

							// 사용자가 아이디를 입력했는지 확인
							if (!userIdInput.value) {
								alert("아이디를 입력해주세요.");
								return;
							}

							// 아이디 중복을 확인하기 위한 AJAX 요청
							$.ajax({
								method: "POST",
								url: "checkDuplicate.php",
								data: {
									user_id: userIdInput.value
								},
								success: function(response) {
									if (response === "duplicate") {
										// idCheckResult.textContent = "이미 사용 중인 아이디입니다.";
										alert("이미 사용 중인 아이디입니다.");
										signupButton.disabled = true; // 이미 사용 중인 아이디일 경우, 회원가입 버튼 비활성화
									} else {
										// idCheckResult.textContent = "사용 가능한 아이디입니다.";
										alert("사용 가능한 아이디입니다.");
										signupButton.disabled = false; // 사용 가능한 아이디일 경우, 회원가입 버튼 활성화
									}
								},
								error: function() {
									alert("서버 오류가 발생했습니다. 잠시 후 다시 시도해주세요.");
									// console.error("[POST] AJAX 오류: " + status + "\n에러: " + error);
								}
							});
						}
					</script>

					<!-- 비밀번호 정규식 유효성 검사 -->
					<script>
						function validatePassword() {
							const password = document.querySelector("#password");
							const messageDiv = document.getElementById('password-message');

							// 비밀번호 8-15자의 영문자/숫자 조합
							var passwordRegex = /^[a-zA-Z0-9]{8,15}$/;

							// 비밀번호 유효성 검사
							if (passwordRegex.test(password.value)) {
								messageDiv.innerHTML = "적절한 길이입니다.";
								messageDiv.style.color = "green";
							} else {
								messageDiv.innerHTML = "비밀번호 8-15자의 영문자/숫자 조합이어야 합니다.";
								messageDiv.style.color = "red";
							}
						}
					</script>

					<!-- 비밀번호 일치 유효성 검사 -->
					<script>
						function validateCheckPassword() {
							const password = document.querySelector("#password");
							const passwordCheck = document.querySelector("#password-check");
							const messageDiv = document.getElementById('password-message');

							if (password.value && password.value == passwordCheck.value) {
								messageDiv.innerHTML = "비밀번호가 일치합니다."
								messageDiv.style.color = "green";
							} else {
								messageDiv.innerHTML = "비밀번호가 일치하지 않습니다.";
								messageDiv.style.color = "red";
							}
						}
					</script>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer include  -->
	<?php include "../member/views/includes/footer.php"; ?>

	</div>
</body>

</html>