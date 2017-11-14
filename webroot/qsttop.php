<?php
namespace morris;
include_once '../config.php';

$session = new Session;
$qst = new Qst;
$resp = new Resp;

$errormode = 0;
$uid = getPost('uid');
$session->sessionChk( );


if (getPost('uid') === ''){
  $url = 'Location: index.php';
  header($url, true, 303 );
  exit();
}

/* 回答登録 */
if (getPost("mode") === "ReQst") {
  $resp->fmtResp();
  $smarty->assign('uid', $uid);
  $smarty->display('qsttopend.tpl');  
} else {  // アンケート開始
  $arqst = $qst->getAllQst();
  $smarty->assign('arqst', $arqst);
  $smarty->assign('uid', $uid);
  $smarty->display('qsttop.tpl');
}
