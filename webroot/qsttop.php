<?php
namespace morris;
include_once '../config.php';

$session = new Session;
$qst = new Qst;
$resp = new Resp;

$errormode = 0;
$session->sessionChk( );
$uid = getPost('uid');
$sid = session_id();

if (getPost('uid') === ''){
  $url = 'Location: index.php';
  header($url, true, 303 );
  exit();
}

var_dump( $_POST );

/* 回答登録 */
if (getPost("mode") === "ReQst") {
  $resp->fmtResp();
  $smarty->assign('uid', $uid);
  $smarty->assign('sid', $sid);
  $smarty->display('qsttopend.tpl');
} else {  // アンケート開始
  $arqst = $qst->getAllQst();
  $qstnum = $qst->getCount();
  $smarty->assign('arqst', $arqst);
  $smarty->assign('qstnum', $qstnum);
  $smarty->assign('uid', $uid);
  $smarty->assign('sid', $sid);
  $smarty->display('qsttop.tpl');
}
