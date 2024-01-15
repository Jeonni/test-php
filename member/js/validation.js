// 휴대폰 번호 유효성 검사
function requestVerificationCode() {
    var phoneInput1 = document.getElementById('phone_1');
    var phoneInput2 = document.getElementById('phone_2');
    var phoneInput3 = document.getElementById('phone_3');

    if (!(isValidPhoneNumber1(phoneInput1.value) && isValidPhoneNumber2(phoneInput2.value) && isValidPhoneNumber2(phoneInput3.value))) {
        alert('올바른 휴대폰 번호를 입력하세요.');
        return;
    }
    alert('인증번호를 요청합니다.');
}

function isValidPhoneNumber1(phoneNumber) {
    var regex = /^\d{3}$/;
    return regex.test(phoneNumber);
}

function isValidPhoneNumber2(phoneNumber) {
    var regex = /^\d{4}$/;
    return regex.test(phoneNumber);
}

// 이메일 유효성 검사 (추가 전)
function requestEmail() {
    alert('인증번호를 요청합니다. 요청받지 못했을 경우, 회원 정보를 다시 확인한 후 입력해주세요.');
}

// 회원가입
function register() {
    const signupForm = document.querySelector("#signup-form");
    const signupButton = document.querySelector("#signup-button");

    // 다음 단계로 이동
    signupButton.addEventListener("click", function (e) {
        signupForm.submit();
    });
}

// 아이디 유효성 검사
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

    if (!userIdInput.value) {
        alert("아이디를 입력해주세요.");
        return;
    }

    // 아이디 중복 확인: AJAX 요청
    $.ajax({
        method: "POST",
        url: "checkDuplicate.php",
        data: {
            user_id: userIdInput.value
        },
        success: function (response) {
            alert("사용 가능한 아이디입니다.");
            // 회원가입 버튼 활성화
            signupButton.disabled = false;
        },
        error: function (xhr, status, err) {
            if (xhr.status === 400) {
                alert("이미 사용 중인 아이디입니다.");
                // 회원가입 버튼 비활성화
                signupButton.disabled = true;
            } else {
                alert("서버 오류가 발생했습니다. 잠시 후 다시 시도해주세요.");
            }
        }
    });
}

// 비밀번호 조건 유효성 검사
function validatePassword() {
    const password = document.querySelector("#password");
    const messageDiv = document.getElementById('password-message');

    // 8-15자의 영문자/숫자 조합
    var passwordRegex = /^[a-zA-Z0-9]{8,15}$/;

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