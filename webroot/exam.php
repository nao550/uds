<?php
namespace morris;
include_once '../config.php';

$session = new Session;
$exam = new Exam;
$anser = new Anser;

$errormode = 0;
$uid = getPost('uid');
$session->sessionChk( );

if (getPost('uid') === ''){
  $url = 'Location: index.php';
  header($url, true, 303 );
  exit();
}

var_dump($_POST);

/* 解答送信 */
if (getPost("mode") === "ans") {
//  $anser->fmtResp();
  $smarty->assign('uid', $uid);
  $smarty->display('examend.tpl');  
} else {  // 問題表示
  $arexam = $exam->getAllExam();
  $smarty->assign('arexam', $arexam);
  $smarty->assign('uid', $uid);
  $smarty->display('examtop.tpl');
}
