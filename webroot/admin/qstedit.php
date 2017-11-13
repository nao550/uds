<?php
namespace morris;
include_once __DIR__ . '/../../config.php';
//var_dump($_POST);
$session = new Session;
$user = new User;
$qst = new Qst;

$errormode = 0;
$session->sessionChk( );

if ( $session->get('rank') !== "3" ){
  $admintop = 'location: index.php';
  header( $admintop, true, 303);
}

if ( empty(getPost('cd'))){
  $admintop = 'location: qst.php';
  header( $admintop, true, 303);
}

// 更新
if ( getPost('mode') === 'qstupdate'){
  $qst->updateQst( $_POST );
  $admintop = 'location: qst.php';
  header( $admintop, true, 303);
}

// 削除
if ( getPost('mode') === 'qstdel'){
  $qst->delQst( getPost('cd') );
  $admintop = 'location: qst.php';
  header( $admintop, true, 303);
}

$qst = new Qst;
$arqst = $qst->GetQstStr(getPost('cd'));

$smarty->assign('sid', $_SESSION['sid']);
$smarty->assign('arqst', $arqst );
$smarty->assign('errormode', $errormode);
$smarty->display('file:admin/qstedit.tpl');

