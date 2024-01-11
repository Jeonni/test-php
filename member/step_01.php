<!-- 회원가입 1단계 (약관 동의) -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">

<?php include "../member/views/includes/head.php"; ?>

<body>
	<div id="skip-nav">
		<a href="#content">본문 바로가기</a>
	</div>

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
						<li class="on"><i class="icon-join-agree"></i> 약관동의</li>
						<li><i class="icon-join-chk"></i> 본인확인</li>
						<li class="last"><i class="icon-join-inp"></i> 정보입력</li>
					</ul>
				</div>

				<div class="section-content">
					<div class="tit-box-h4">
						<h3 class="tit-h4">이용약관 <span class="tc-brand">(필수)</span></h3>
					</div>

					<div class="agree-box">
						<div class="agree-box-txt">
							<!-- 이용약관 include -->
							<?php include "../member/views/includes/text/terms.php"; ?>
						</div>
						<button type="button" class="js_agree_open"><em>펼치기 ▼</em></button>
						<div class="mt10">
							<label class="input-sp">
								<input type="checkbox" onclick="checkAgreement()" />
								<span class="input-txt">이용약관에 동의합니다.</span>
							</label>
						</div>
					</div>
				</div>

				<div class="section-content">
					<div class="tit-box-h4">
						<h3 class="tit-h4">개인정보 취급방침 <span class="tc-brand">(필수)</span></h3>
					</div>

					<div class="agree-box">
						<div class="agree-box-txt">
							<!-- 개인정보 취급방침 include -->
							<?php include "../member/views/includes/text/personal.php"; ?>
						</div>
						<button type="button" class="js_agree_open"><em>펼치기 ▼</em></button>
						<div class="mt10">
							<label class="input-sp">
								<input type="checkbox" onclick="checkAgreement()" />
								<span class="input-txt">개인정보 취급방침에 동의합니다.</span>
							</label>
						</div>
					</div>
				</div>

				<div class="all-agree-box">
					<label class="input-sp">
						<input type="checkbox" onclick="toggleAllAgreements()" />
						<span class="input-txt">상위 이용약관 및 개인정보 취급방침에 모두 동의합니다.</span>
					</label>
				</div>

				<div class="box-btn">
					<a href="#" class="btn-l" onclick="validateAgreements()">다음단계 (휴대폰인증)</a>
				</div>

			</div>
		</div>
	</div>

	<!-- Footer include  -->
	<?php include "../member/views/includes/footer.php"; ?>

</body>

</html>