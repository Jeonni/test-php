<?php
session_start();

// 세션에서 user_id 가져오기
if (isset($_SESSION["loggedin"]) && $_SESSION['loggedin'] === true) {
    $user_id = $_SESSION["user_id"];
}

// 로그아웃 처리
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: /"); // 메인 페이지로 리다이렉트
    exit;
}

?>


<!-- Header -->

<body>
    <!-- skip nav -->
    <div id="skip-nav">
        <a href="#content">본문 바로가기</a>
    </div>
    <!-- //skip nav -->

    <div id="wrap">
        <div id="header" class="header">

            <div class="nav-section">
                <div class="inner p-r">
                    <h1><a href="/"><img src="http://img.hackershrd.com/common/logo.png" alt="해커스 HRD LOGO" width="165" height="37" /></a></h1>
                    <div class="nav-box">
                        <h2 class="hidden">주메뉴 시작</h2>

                        <ul class="nav-main-lst">
                            <li class="mnu">
                                <a href="#">일반직무</a>
                                <ul class="nav-sub-lst">
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                </ul>
                            </li>
                            <li class="mnu2">
                                <a href="#">산업직무</a>
                                <ul class="nav-sub-lst">
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                </ul>
                            </li>
                            <li class="mnu3">
                                <a href="#">공통역량</a>
                                <ul class="nav-sub-lst">
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                </ul>
                            </li>
                            <li class="mnu4">
                                <a href="#">어학 및 자격증</a>
                                <ul class="nav-sub-lst">
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                </ul>
                            </li>
                            <li class="mnu5">
                                <a href="#">직무교육 안내</a>
                                <ul class="nav-sub-lst">
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                </ul>
                            </li>
                            <li class="mnu6">
                                <a href="#">내 강의실</a>
                                <ul class="nav-sub-lst">
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                    <li><a href="#">서브메뉴</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="nav-sub-box">
                    <div class="inner"><!-- <a href="#"><img src="/" alt="배너이미지" width="171" height="196"></a> -->
                    </div>
                </div>

            </div>

            <div class="top-section">
                <div class="inner">
                    <div class="link-box">

                        <?php if (isset($_SESSION["loggedin"]) && $_SESSION['loggedin'] === true) : ?>
                            <!-- 로그인 후 -->
                            <?php if (isset($_SESSION["loggedin"]) && $_SESSION['loggedin'] === true) : ?>
                                <!-- 로그인 후에는 user_id를 표시 -->
                                <a>
                                    <div id="userId"><?php echo $user_id; ?>님</div>
                                </a>
                            <?php endif; ?>

                            <a href="?logout=true" onclick= "return confirm('정말 로그아웃 하시겠습니까?')">로그아웃</a>
                            <a href="#">내정보</a>
                        <?php else : ?>
                            <!-- 로그인 전 -->
                            <a id="login-link" href="#">로그인</a>
                            <a id="signup-link" href="#">회원가입</a>
                        <?php endif; ?>

                        <!-- 공통 -->
                        <a href="#">상담/고객센터</a>

                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var signupLink = document.getElementById('signup-link');
                var loginLink = document.getElementById("login-link");

                signupLink.addEventListener('click', function(event) {
                    // 기본 동작(링크 이동)을 막기
                    event.preventDefault();

                    // 실제로 이동할 URL과 쿼리 문자열 설정
                    var targetUrl = "/member/index.php";
                    var queryString = "mode=step_01";

                    // 쿼리 문자열을 포함한 최종 URL 생성
                    var finalUrl = targetUrl + "?" + queryString;

                    // 생성된 URL로 이동
                    window.location.href = finalUrl;
                });


                loginLink.addEventListener('click', function(event) {
                    event.preventDefault();
                    window.location.href = '../member/login.php';
                });
            });
        </script>

       
</body>