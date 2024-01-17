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
					<h3 class="tit-h3">아이디/비밀번호 찾기</h3>
					<div class="sub-depth">
						<span><i class="icon-home"><span>홈</span></i></span>
						<strong>아이디/비밀번호 찾기</strong>
					</div>
				</div>

				<ul class="tab-list">
					<li class="on"><a href="#" onclick="find_id_pw()">아이디 찾기</a></li>
					<li><a href="#" onclick="find_password()">비밀번호 찾기</a></li>
				</ul>

				<div class="tit-box-h4">
					<h3 class="tit-h4">아이디 찾기 인증 절차</h3>
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
									</td>
								</tr>

								<tr>
									<th scope="col">이메일 주소</th>
									<td>
										<input type="text" name="email_prefix" id="email_prefix" class="input-text" style="width:220px" /> @
										<select name="email_domain" id="email_domain" class="input-sel" style="width:220px">
											<option value="gmail.com">gmail.com</option>
											<option value="naver.com">naver.com</option>
											<option value="daum.com">daum.com</option>
											<option value="nate.com">nate.com</option>
											<option value="hanmail.com">hanmail.com</option>
										</select>
										<button type="button" class="btn-s-tin ml10" onclick="requestEmail()">인증번호 받기</button>
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
	<?php include "../member/layout/footer.php"; ?>
</body>

</html>