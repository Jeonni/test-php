<?php
$mode = isset($_GET['mode']) ? $_GET['mode'] : '';

switch ($mode) {
    case 'step_01':
        include 'step_01.php';
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
    case 'find_id':
        include 'find_id.php';
        break;
    case 'find_id_success':
        include 'find_id_success.php';
        break;
    case 'find_pass':
        include 'find_pass.php';
        break;
    case 'find_pass_success':
        include 'find_pass_success.php';
        break;
    case 'modify':
        include 'modify.php';
        break;
    default:
        echo "잘못된 경로입니다.";
        break;
}
