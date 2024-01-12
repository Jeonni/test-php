<?php
require_once "../member/config/db.php";

$name = $_POST['name'];
$phone_number =  $_POST['phone_1'] . "-" . $_POST['phone_2'] . "-" . $_POST['phone_3'];


$sql = "SELECT user_id FROM test_user WHERE name = '$name' AND phone_number = '$phone_number'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo "귀하의 아이디는: " . $row['user_id'];
} else {
    echo "아이디가 존재하지 않습니다.";
}
