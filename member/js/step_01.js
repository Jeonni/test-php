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
    termsAgreed.forEach(function (checkbox) {
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
    termsAgreed.forEach(function (checkbox) {
        checkbox.checked = allAgreeCheckbox.checked;
    });

    // 개별 동의 체크박스 상태에 따라 다음 단계 버튼 업데이트
    checkAgreement();
}

// 다음 단계로 이동하는 핵심 함수
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
    termsAgreed.forEach(function (checkbox) {
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
        window.location.href = "/member/index.php?mode=step_02";
    }
}