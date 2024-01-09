<?php
// /member/index.php

// 해당 페이지의 기능에 필요한 PHP 코드를 추가

$mode = isset($_GET['mode']) ? $_GET['mode'] : '';

switch ($mode) {
    case 'step_01':
        include 'step_01.php'; // step_01 모드에 대한 처리를 다른 파일에서 가져옴
        break;
    case 'step_02':
        include 'step_02.php';
        break;
    case 'step_03':
        include 'step_03.php';
        break;
    case 'complete':
        include 'complete.php';
        break;
    default:
        echo "잘못된 경로입니다.";
        break;
}