function login() {
    window.location.href = "login.php";
}

document.addEventListener('DOMContentLoaded', function () {
    var signupLink = document.getElementById('signup-link');
    var findIdPw = document.getElementById('find-id-pw');

    signupLink.addEventListener('click', function (event) {
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

    findIdPw.addEventListener('click', function (event) {
        event.preventDefault();

        var targetUrl = "/member/index.php";
        var queryString = "mode=find_id";

        var findUrl = targetUrl + "?" + queryString;

        window.location.href = findUrl;
    });
});