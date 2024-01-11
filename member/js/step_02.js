function requestVerificationCode() {
    //간단한 유효성 검사 수행
    var phoneInput1 = document.getElementById('phone_1');
    var phoneInput2 = document.getElementById('phone_2');
    var phoneInput3 = document.getElementById('phone_3');

    if (!(isValidPhoneNumber1(phoneInput1.value) && isValidPhoneNumber2(phoneInput2.value) && isValidPhoneNumber2(phoneInput3.value))) {
        alert('올바른 휴대폰 번호를 입력하세요.');
        return;
    }

    // 유효성 검사를 통과한 경우, 실제로는 서버에 요청을 보내고 인증번호를 받아와야 함
    alert('인증번호를 요청합니다.');
}

function isValidPhoneNumber1(phoneNumber) {
    // 간단한 유효성 검사 (1) 3개의 숫자로만 입력돼야 함
    var regex = /^\d{3}$/;
    return regex.test(phoneNumber);
}

function isValidPhoneNumber2(phoneNumber) {
    // 간단한 유효성 검사 (2) 4개의 숫자로만 입력돼야 함
    var regex = /^\d{4}$/;
    return regex.test(phoneNumber);
}
