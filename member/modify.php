<?php
session_start(); // 세션 시작

// 사용자가 로그인되어 있는지 확인
if (!isset($_SESSION['user_id'])) {
	// 로그인 페이지로 리디렉션 또는 무단 액세스 처리
	header("Location: /");
	exit();
}

include "../member/GetUserInfo.php";
?>

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
					<h3 class="tit-h3">내정보수정</h3>
					<div class="sub-depth">
						<span><i class="icon-home"><span>홈</span></i></span>
						<strong>내정보수정</strong>
					</div>
				</div>

				<div class="section-content">
					<form action="../member/model/EditProcess.php" method="POST" id="modify-form">
						<table cellpadding="0" cellspacing="0" class="tbl-col-join">
							<caption class="hidden">강의정보</caption>
							<colgroup>
								<col style="width:15%" />
							</colgroup>

							<tbody>
								<tr>
									<th scope="col"><span class="icons">*</span>이름</th>
									<td><?php echo $user_data['name']; ?></td>
								</tr>
								<tr>
									<th scope="col"><span class="icons">*</span>아이디</th>
									<td>
										<input type="text" class="input-text" name="user_id" id="edit-user-id" style="width:302px" placeholder="영문자로 시작하는 4~15자의 영문소문자, 숫자" oninput="validateId2()" />
										<!-- <a href="#" class="btn-s-tin ml10" onclick="checkDuplicate2()">중복확인</a> -->
										<div id="edit-id-message" class="id-message"></div>
									</td>
								</tr>

								<tr>
									<th scope="col"><span class="icons">*</span>비밀번호</th>
									<td>
										<input type="password" class="input-text" name="password" id="edit-password" style="width:302px" placeholder="8-15자의 영문자/숫자 혼합" oninput="validatePassword2()" />
										<div id="edit-password-message" class="password-message"></div>
									</td>
								</tr>
								<tr>
									<th scope="col"><span class="icons">*</span>비밀번호 확인</th>
									<td>
										<input type="password" class="input-text" id="edit-password-check" style="width:302px" oninput="validateCheckPassword2()" />
										<div id="edit-password-message" class="password-message"></div>
									</td>
								</tr>

								<tr>
									<th scope="col"><span class="icons">*</span>이메일주소</th>
									<td>
										<input type="text" name="email_prefix" class="input-text" id="edit-email" style="width:138px" /> @
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
									<td><?php echo $user_data['phone_number']; ?></td>
								</tr>

								<tr>
									<th scope="col"><span class="icons"></span>일반전화 번호</th>
									<td>
										<input type="tel" name="landline_1" id="edit-landline_number" class="input-text" style="width:88px" /> -
										<input type="tel" name="landline_2" id="edit-landline_number" class="input-text" style="width:88px" /> -
										<input type="tel" name="landline_3" id="edit-landline_number" class="input-text" style="width:88px" />
									</td>
								</tr>

								<tr>
									<th scope="col"><span class="icons">*</span>주소</th>
									<td>
										<p>
											<label>우편번호 <input type="text" class="input-text ml5" style="width:242px" disabled /></label><a href="#" class="btn-s-tin ml10">주소찾기</a>
										</p>
										<p class="mt10">
											<label>주소 <input type="text" name="address" class="input-text ml5" id="edit-address" style="width:719px" /></label>
										</p>
									</td>
								</tr>

							</tbody>
						</table>

						<div class="box-btn">
							<button type="submit" class="btn-l">정보수정</a></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include "../member/layout/footer.php"; ?>
</body>

</html>