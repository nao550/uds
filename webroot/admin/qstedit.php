<?php
namespace morris;
include_once __DIR__ . '/../../config.php';

$session = new Session;
$user = new User;
$qst = new Qst;

$errormode = 0;
$session->sessionChk( );

if ( $session->get('rank') !== "3" ){
  $admintop = 'location: index.php';
  header( $admintop, true, 303);
}

if ( empty(getPost('num'))){
  $admintop = 'location: index.php';
  header( $admintop, true, 303);
}

// 更新
if ( getPost('mode') === 'qstupdate'){
  $qst->updateQst( $_POST );
}

// 削除
if ( getPost('mode') === 'qstdel'){
  $qst->delQst( getPost('num') );
  $admintop = 'location: index.php';
  header( $admintop, true, 303);
}

$qst = new Qst;
$arqst = $qst->GetQstStr(getPost('num'));

$smarty->assign('sid', $_SESSION['sid']);
$smarty->assign('arqst', $arqst );
$smarty->assign('errormode', $errormode);
$smarty->display('file:admin/qstedit.tpl');
