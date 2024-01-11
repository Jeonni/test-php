<?php
$host = "172.16.0.28";
$username = "jeonni";
$password = "test123456";
$dbname = "test_db";

// 데이터베이스 연결
$conn = new mysqli($host, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>