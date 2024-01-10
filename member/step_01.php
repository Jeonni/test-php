<!-- 회원가입 1단계 (약관 동의) -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<!--[if (IE 7)]><html class="no-js ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<!--[if (IE 8)]><html class="no-js ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->

<?php include "../app/views/includes/head.php"; ?>

<body>
	<!-- skip nav -->
	<div id="skip-nav">
		<a href="#content">본문 바로가기</a>
	</div>
	<!-- //skip nav -->

	<!-- Header include -->
	<?php include "../app/views/includes/header.php"; ?>

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
							<?php include "../app/views/includes/terms.php"; ?>
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
							<?php include "../app/views/includes/personal.php"; ?>
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
					<!-- 전체 동의 체크박스 -->
					<label class="input-sp">
						<input type="checkbox" onclick="toggleAllAgreements()" />
						<span class="input-txt">상위 이용약관 및 개인정보 취급방침에 모두 동의합니다.</span>
					</label>
				</div>

				<div class="box-btn">
					<!-- 다음 단계 버튼 -->
					<a href="#" class="btn-l" onclick="validateAgreements()">다음단계 (휴대폰인증)</a>
				</div>

			</div>
		</div>
	</div>

	<script>
		var nextBtn = document.querySelector('.box-btn a');
		var messageContainer; // 메시지를 표시할 div 엘리먼트를 전역으로 선언

		// 함수를 호출하여 초기 설정
		checkAgreement();

		function checkAgreement() {
			// 이전에 생성된 메시지 컨테이너를 제거
			if (messageContainer && messageContainer.parentNode) {
				messageContainer.parentNode.removeChild(messageContainer);
			}

			// 개별 동의 체크박스 상태
			var termsAgreed = document.querySelectorAll('.section-content input[type="checkbox"]');
			var allAgreed = document.querySelector('.all-agree-box input[type="checkbox"]');

			// 개별 동의 체크박스 확인
			var allChecked = true;
			termsAgreed.forEach(function(checkbox) {
				if (!checkbox.checked) {
					allChecked = false;
				}
			});

			// 전체 동의 체크박스 상태 확인
			var allAgreeChecked = allAgreed.checked;

			// 개별 동의 체크박스 상태에 따라 다음 단계 버튼 업데이트
			if (allChecked || allAgreeChecked) {
				nextBtn.href = "/member/index.php?mode=step_02";
			} else {
				nextBtn.removeAttribute("href");
			}
		}

		function toggleAllAgreements() {
			var allAgreeCheckbox = document.querySelector('.all-agree-box input[type="checkbox"]');
			var termsAgreed = document.querySelectorAll('.section-content input[type="checkbox"]');

			// 전체 동의 체크박스 상태에 따라 개별 동의 체크박스 상태 변경
			termsAgreed.forEach(function(checkbox) {
				checkbox.checked = allAgreeCheckbox.checked;
			});

			// 개별 동의 체크박스 상태에 따라 다음 단계 버튼 업데이트
			checkAgreement();
		}

		function validateAgreements() {
			// 이전에 생성된 메시지 컨테이너를 제거
			if (messageContainer && messageContainer.parentNode) {
				messageContainer.parentNode.removeChild(messageContainer);
			}

			// 개별 동의 체크박스 상태
			var termsAgreed = document.querySelectorAll('.section-content input[type="checkbox"]');
			var allAgreed = document.querySelector('.all-agree-box input[type="checkbox"]');

			// 개별 동의 체크박스 확인
			var allChecked = true;
			termsAgreed.forEach(function(checkbox) {
				if (!checkbox.checked) {
					allChecked = false;
				}
			});

			// 전체 동의 체크박스 상태 확인
			var allAgreeChecked = allAgreed.checked;

			if (!(allChecked || allAgreeChecked)) {
				// 경고 메시지 표시
				alert("모든 약관에 동의해야 다음 단계로 진행할 수 있습니다.");
			} else {
				// 다음 단계로 이동
				window.location.href = "/member/index.php";
			}
		}
	</script>


	<!-- Footer include  -->
	<?php include "../app/views/includes/footer.php"; ?>

</body>

</html>