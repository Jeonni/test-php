<!-- 회원가입 3단계(회원정보입력) -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">

<?php include "../member/layout/head.php"; ?>

<?php
session_start();

$phoneNumber1 = isset($_SESSION['phone_number1']) ? $_SESSION['phone_number1'] : '';
$phoneNumber2 = isset($_SESSION['phone_number2']) ? $_SESSION['phone_number2'] : '';
$phoneNumber3 = isset($_SESSION['phone_number3']) ? $_SESSION['phone_number3'] : '';
?>

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
					<form action="../member/model/SignupProcess.php" method="POST" id="signup-form">
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
									</td>
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
							<button type="button" onclick="register()" id="signup-button" class="btn-l">회원가입</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer include  -->
	<?php include "../member/layout/footer.php"; ?>

	</div>
</body>

</html>