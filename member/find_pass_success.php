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
					<li><a href="#">아이디 찾기</a></li>
					<li class="on"><a href="#">비밀번호 찾기</a></li>
				</ul>

				<div class="tit-box-h4">
					<h3 class="tit-h4">비밀번호 재설정</h3>
				</div>

				<div class="section-content mt30">
					<form action="../member/model/EditPassword.php" method="POST">
						<table cellpadding="0" cellspacing="0" class="tbl-col-join">
							<caption class="hidden">비밀번호 재설정</caption>
							<colgroup>
								<col style="width:17%" />
							</colgroup>

							<tbody>
								<tr>
									<th scope="col">신규 비밀번호 입력</th>
									<td>
										<input type="password" name="new-password" class="input-text" id="new-password" style="width:302px" placeholder="8-15자의 영문자/숫자 혼합" oninput="validatePassword()" />
										<div id="password-message" class="password-message"></div>
									</td>
								</tr>
								<tr>
									<th scope="col">신규 비밀번호 재확인</th>
									<td>
										<input type="password" class="input-text" name="new-password-check" id="new-password-check" style="width:302px" oninput="validateCheckPassword()" />
										<div id="password-message" class="password-message"></div>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="box-btn">
							<button type="submit" class="btn-l">확인</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php include "../member/layout/footer.php"; ?>
</body>

</html>