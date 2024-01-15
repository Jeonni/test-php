<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">

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
					<h3 class="tit-h4">아이디 조회결과</h3>
				</div>

				<div class="guide-box">
					<p class="fs16 mb5"><?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?> 회원님의 아이디는 아래와 같습니다.</p>
					<strong class="big-title tc-brand"><?php echo isset($_GET['user_id']) ? $_GET['user_id'] : ''; ?></strong>
				</div>

				<div class="box-btn mt30">
					<a href="#" class="btn-l" onclick="login()">로그인하러 가기</a>
					<a href="#" class="btn-l-line ml5" onclick="find_password()">비밀번호 찾기</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer include  -->
	<?php include "../member/views/includes/footer.php"; ?>
</body>

</html>