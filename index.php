<!-- 메인 페이지 -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<?php include "member/views/includes/head.php" ?>

<body>
	<!-- skip nav -->
	<div id="skip-nav">
		<a href="#content">본문 바로가기</a>
	</div>
	<!-- //skip nav -->

	<!-- Header include -->
	<?php include "member/views/includes/header.php"; ?>

	<div id="container">
		<div class="main-slider-applyclass">
			<div id="applyclass" class="slider-applyclass col4"><!-- 갯수 1개 class="col1" / 갯수 2개 class="col2"  -->
				<ul class="bxslider">

				</ul>
				<div id="bx-pager-apply" class="page-applyclass">
					<a data-slide-index="0" href="#">오픈이벤트</a>
					<a data-slide-index="1" href="#">보험과 세금케이스</a>
					<a data-slide-index="2" href="#">경제기사 들여다보기</a>
					<a data-slide-index="3" href="#">크리에이티브 마케팅</a>
				</div>
			</div>
		</div>

		<div id="content" class="content">

			<div class="content-section after">
				<div class="inner">
					<div class="f-l">
						<div class="main-tit-box-h3">
							<h3 class="main-tit-h3">인기강의</h3>
						</div>

						<div class="tab-box">
							<ul class="tab-best">
								<li class="on"><a href="#">일반직무</a></li><!-- class="on" 활성화 -->
								<li><a href="#">산업직무</a></li>
								<li><a href="#">공통역량</a></li>
								<li><a href="#">어학 및 자격증</a></li>
							</ul>
							<div class="tab-best-con">
								<ul class="tab-category">
									<?php include "member/views/includes/text/main/category.php"; ?>
								</ul>
								<div class="tab-category-con">
									<ul class="list-best">
										<?php include "member/views/includes/text/main/case_01.php"; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="f-r">

						<div class="new-schedule">
							<div class="main-tit-box-h3">
								<h3 class="main-tit-h3">근로자카드 학사일정</h3>
							</div>
							<dl>
								<dt><strong><em>D-07</em></strong> 2017년 7월 1기 모집</dt>
								<dd>
									<p>
										<strong><i class="icon-receipt"></i>접수기간</strong>
										<span>09/07(목)까지</span>
									</p>
									<p>
										<strong><i class="icon-learning"></i>학습기간</strong>
										<span>09/07(목)~09/08(금)</span>
									</p>
								</dd>
							</dl>
						</div>

						<div class="new-lecture">
							<div class="main-tit-box-h3">
								<h3 class="main-tit-h3">신규강의</h3>
							</div>
							<ul class="tab-category2">
								<?php include "member/views/includes/text/main/category.php"; ?>
							</ul>
							<div class="tab-category2-con">
								<ul class="list-bbs">
									<?php include "member/views/includes/text/main/case_02.php"; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="content-section2">
				<div class="inner">
					<span class="tit">직장인 자기개발 교육! <strong>해커스와 정부가 수강료를 지원</strong>합니다.</span>
					<ul>
						<?php include 'member/views/includes/images/inner_01.php' ?>
					</ul>
				</div>
			</div>

			<div class="content-section3 after">
				<div class="inner after">

					<div class="f-l">
						<div class=" main-tit-box-h3">
							<h3 class="main-tit-h3">BEST 수강후기</h3>
						</div>
						<ul class="list-bbs">
							<?php include "member/views/includes/text/main/case_03.php"; ?>
						</ul>
					</div>

					<div class="f-r banner-box">
						<div class="bxslider-default" data-mode="fade" data-auto="true" data-controls="true" data-pager="true" style="height:254px">
							<ul class="bxslider">
								<?php include "member/views/includes/images/banner.php"; ?>
							</ul>
						</div>
					</div>

				</div>
			</div>

			<div class="content-section4 after">
				<div class="inner after">

					<div class="f-l mr30">
						<div class=" main-tit-box-h3 after">
							<h3 class="main-tit-h3 f-l">공지사항</h3>
							<a href="#" class="f-r mt5">더보기 +</a>
						</div>
						<ul class="list-bbs">
							<?php include "member/views/includes/text/main/case_04.php"; ?>
						</ul>
					</div>

					<div class="f-l">
						<div class=" main-tit-box-h3 after">
							<h3 class="main-tit-h3 f-l">FAQ</h3>
							<a href="#" class="f-r mt5">더보기 +</a>
						</div>
						<ul class="list-bbs">
							<?php include "member/views/includes/text/main/case_04.php"; ?>
						</ul>
					</div>

					<div class="f-r cs-box">
						<div class="cs-info">
							<h3>고객센터</h3>
							<strong class="tc-brand">02-566-3700</strong>
							<p><i class="icon-time"><span class="hidden">운영시간</span></i>평일 9:00 – 23:00/ 주말 9:00 –18:00</p>
							<p><i class="icon-email"><span class="hidden">메일</span></i>help@champstudy.com</p>
						</div>
						<div class="after">
							<a href="#" class="cs-btn f-l">1:1 상담게시판</a>
							<a href="#" class="cs-btn f-r">기업교육 상담게시판</a>
						</div>
					</div>
				</div>
			</div>

			<div class="quick-bar">
				<div class="inner p-r">
					<ul class="list-link">
						<li><a href="#" class="txt">로그인</a></li>
						<li><a href="#" class="txt">상담신청</a></li>
						<li><a href="#" class="txt">장바구니</a></li>
					</ul>

					<dl>
						<dt class="txt">오늘 본 과정 <em class="tc-brand">3</em>건</dt>
						<dd>
							<ul>
								<?php include 'member/views/includes/images/inner_02.php' ?>
							</ul>
						</dd>
					</dl>
					<button type="button" class="js_top_scroll"><span class="hidden">최상단으로</span></button>
				</div>
			</div>

		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			//main_slider_applyclass
			var bnrWrap = $('.slider-applyclass')
			var bnr_slider = bnrWrap.find('.bxslider');

			slider = bnr_slider.bxSlider({
				auto: true,
				mode: 'fade',
				cutLimit: 4,
				speed: 500,
				autoStart: true,
				pagerCustom: '#bx-pager-apply',
				onSliderLoad: function(selector) {
					bnrWrap.css("overflow", "visible");
				}
			});
			$('.page-applyclass').mouseover(function() {
				slider.startAuto();
			});
		});
	</script>
	<!-- Footer include  -->
	<?php include 'member/views/includes/footer.php'; ?>
</body>

</html>