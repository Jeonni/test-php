<?php
require_once("config.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_user_id = $_POST["user_id"];
    $input_password = $_POST["password"];

    // 데이터베이스에서 사용자 정보 가져오기
    $sql = "SELECT user_id, password FROM test_user WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $input_user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];

        // 비밀번호 검증
        if (hash('sha256', $input_password) === $hashed_password) {
            $_SESSION["loggedin"] = true;
            $_SESSION["user_id"] = $row["user_id"];
            header("Location: welcome.php");
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid user ID.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login Page</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</body>

</html>