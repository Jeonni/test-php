function login() {
    window.location.href = "/member/login.php";
}

function signup() {
    var targetUrl = "/member/index.php"
    var queryString = "mode=step_01";

    var findUrl = targetUrl + "?" + queryString;

    window.location.href = findUrl;
}

function modify() {
    var targetUrl = "/member/index.php"
    var queryString = "mode=modify";

    var findUrl = targetUrl + "?" + queryString;

    window.location.href = findUrl;

    console.log(findUrl);
}

function find_password() {
    var targetUrl = "/member/index.php"
    var queryString = "mode=find_pass";

    var findUrl = targetUrl + "?" + queryString;

    window.location.href = findUrl;
}

function find_id_pw() {
    var targetUrl = "/member/index.php";
    var queryString = "mode=find_id";

    var findUrl = targetUrl + "?" + queryString;

    window.location.href = findUrl;
}