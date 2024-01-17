<?php
class EditInfoModel
{
    public function editProcess()
    {
        session_start();

        include "../config/db.php";
        $id = isset($_SESSION['id']) ? $_SESSION['id'] : '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email_prefix'] . "@" . $_POST['email_domain'];
            $landline_number = $_POST['landline_1'] . "-" . $_POST['landline_2'] . "-" . $_POST['landline_3'];

            $hashedPassword = hash('sha256', $_POST['password']);

            $sql = "UPDATE test_user SET
            user_id = '{$_POST["user_id"]}',
            password = '{$hashedPassword}',
            email = '{$email}',
            landline_number = '{$landline_number}',
            address = '{$_POST["address"]}'
            WHERE id = '{$id}'";

            $result = mysqli_query($conn, $sql);

            $_SESSION["user_id"] = $row["user_id"];

            if ($result === false) {
                echo "<script>alert('업데이트에 문제가 생겼습니다. 관리자에게 문의 부탁드려요.');</script>";
                echo mysqli_error($conn);
            } else {
                session_destroy();
                echo '<script>alert("사용자 정보가 성공적으로 업데이트되었습니다. 다시 로그인해주세요."); window.location.href = "/";</script>';
                exit();
            }
        } else {
            echo "폼이 제출되지 않았습니다.";
        }
    }

    public function editPassword()
    {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $new_password = $_POST["new-password"];
            $confirm_password = $_POST["new-password-check"];

            // 사용자 아이디
            $user_id = $_SESSION['user_id'];

            // 비밀번호 확인
            if ($new_password === $confirm_password) {
                // 새로운 비밀번호 해싱 (SHA-256)
                $hashed_new_password = hash('sha256', $new_password);

                // 비밀번호 업데이트
                require_once "../config/db.php";
                $update_sql = "UPDATE test_user SET password = ? WHERE user_id = ?";
                $update_stmt = $conn->prepare($update_sql);
                $update_stmt->bind_param("ss", $hashed_new_password, $user_id);

                // 쿼리 실행 결과 확인
                if ($update_stmt->execute()) {
                    // 업데이트 성공
                    header("Location: /");
                    exit();
                } else {
                    // 업데이트 실패
                    echo "업데이트 실패: " . $update_stmt->error;
                }
            } else {
                echo "<script>alert('신규 비밀번호와 확인 비밀번호가 일치하지 않습니다.');</script>";
            }

            $update_stmt->close();
            $conn->close();
        }
    }
}
