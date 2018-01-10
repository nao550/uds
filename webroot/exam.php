<?php
namespace morris;
include_once '../config.php';

$session = new Session;
$exam = new Exam;
$anser = new Anser;

$errormode = 0;
$session->sessionChk( );
$uid = getPost('uid');
$sid = session_id();
$examnum = $exam->countExam();

if (getPost('uid') === ''){
  $url = 'Location: index.php';
  header($url, true, 303 );
  exit();
}

var_dump($_POST);

/* 解答送信 */
if (getPost("mode") === "ans") {
  $anser->fmtAns();
  $smarty->assign('uid', $uid);
  $smarty->assign('sid', $sid);
  $smarty->display('examend.tpl');
} else {  // 問題表示
  $arexam = $exam->getAllExam();
  $smarty->assign('arexam', $arexam);
  $smarty->assign('examnum', $examnum);
  $smarty->assign('uid', $uid);
  $smarty->assign('sid', $sid);
  $smarty->display('examtop.tpl');
}
