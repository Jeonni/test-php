<?php
session_start();

include "../member/get_user_info.php";

$user_id = $_POST['user_id'];

include "../member/config/db.php";


// 'test_user' 테이블에서 'user_id'를 수정하는 쿼리
$sql = "UPDATE test_user SET user_id = ? WHERE user_id = ?";

// 프리페어드 스타일로 SQL 인젝션 방지
$stmt = mysqli_prepare($conn, $sql);

// 매개변수 바인딩
mysqli_stmt_bind_param($stmt, "ss", $new_user_id, $old_user_id);

// 새로운 사용자 아이디와 기존 사용자 아이디 설정
$new_user_id = $user_id;
$old_user_id = $_SESSION['user_id']; // 이 부분은 세션에 저장된 기존 사용자 아이디를 가져와야 합니다.

// 쿼리 실행
mysqli_stmt_execute($stmt);

// 성공 여부 확인
if (mysqli_stmt_affected_rows($stmt) > 0) {

    // 세션에 기존의 정보를 계속해서 저장 ..
    $_SESSION['user_id'] = $new_user_id;

    echo "
        <script type=\"text/javascript\">
            alert(\"정보가 수정되었습니다.\");
            location.href = \"login.php\";
        </script>
    ";
} else {
    echo "
        <script type=\"text/javascript\">
            alert(\"정보 수정에 실패했습니다.\");
            location.href = \"../member/index.php?mode=modify\";
        </script>
    ";
}

// 문과 연결 닫기
mysqli_stmt_close($stmt);
mysqli_close($conn);
