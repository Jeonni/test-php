function register() {
    const signupForm = document.querySelector("#signup-form");
    const signupButton = document.querySelector("#signup-button");

    // 다음 단계로 이동
    signupButton.addEventListener("click", function (e) {
        signupForm.submit();
    });
}

function validateId() {
    const user_id = document.querySelector("#user-id");
    const messageDiv = document.getElementById('id-message');

    // 아이디 영문자로 시작하는 4-15자의 영소문자
    var userIdRegex = /^[a-z][a-z0-9]{3,14}$/;

    // 아이디 유효성 검사
    if (userIdRegex.test(user_id.value)) {
        messageDiv.innerHTML = "아이디 유효성 조건에 일치합니다.";
        messageDiv.style.color = "green";
    } else {
        messageDiv.innerHTML = "아이디는 영문자로 시작하는 4-15자의 영소문자, 숫자여야 합니다.";
        messageDiv.style.color = "red";
    }

}

function checkDuplicate() {
    const userIdInput = document.querySelector("#user-id");
    const idCheckResult = document.querySelector("#id-check-result");
    const signupButton = document.querySelector("#signup-button");

    // 사용자가 아이디를 입력했는지 확인
    if (!userIdInput.value) {
        alert("아이디를 입력해주세요.");
        return;
    }

    // 아이디 중복을 확인하기 위한 AJAX 요청
    $.ajax({
        method: "POST",
        url: "checkDuplicate.php",
        data: {
            user_id: userIdInput.value
        },
        success: function (response) {
            // idCheckResult.textContent = "사용 가능한 아이디입니다.";
            alert("사용 가능한 아이디입니다.");
            signupButton.disabled = false; // 사용 가능한 아이디일 경우, 회원가입 버튼 활성화

        },
        error: function (xhr, status, err) {
            if (xhr.status === 400) {
                // idCheckResult.textContent = "이미 사용 중인 아이디입니다.";
                alert("이미 사용 중인 아이디입니다.");
                signupButton.disabled = true; // 이미 사용 중인 아이디일 경우, 회원가입 버튼 비활성화
            } else {
                alert("서버 오류가 발생했습니다. 잠시 후 다시 시도해주세요.");
            }
        }
    });
}

// <!-- 비밀번호 정규식 유효성 검사 -->
function validatePassword() {
    const password = document.querySelector("#password");
    const messageDiv = document.getElementById('password-message');

    // 비밀번호 8-15자의 영문자/숫자 조합
    var passwordRegex = /^[a-zA-Z0-9]{8,15}$/;

    // 비밀번호 유효성 검사
    if (passwordRegex.test(password.value)) {
        messageDiv.innerHTML = "적절한 길이입니다.";
        messageDiv.style.color = "green";
    } else {
        messageDiv.innerHTML = "비밀번호 8-15자의 영문자/숫자 조합이어야 합니다.";
        messageDiv.style.color = "red";
    }
}

// 비밀번호 일치 유효성 검사
function validateCheckPassword() {
    const password = document.querySelector("#password");
    const passwordCheck = document.querySelector("#password-check");
    const messageDiv = document.getElementById('password-message');

    if (password.value && password.value == passwordCheck.value) {
        messageDiv.innerHTML = "비밀번호가 일치합니다."
        messageDiv.style.color = "green";
    } else {
        messageDiv.innerHTML = "비밀번호가 일치하지 않습니다.";
        messageDiv.style.color = "red";
    }
}