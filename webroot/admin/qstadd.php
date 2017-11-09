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

// 追加
if ( getPost('mode') === 'qstadd'){
  $qst->addQst( $_POST );
  $admintop = 'location: qst.php';
  header( $admintop, true, 303);
}

$smarty->assign('sid', $_SESSION['sid']);
$smarty->assign('errormode', $errormode);
$smarty->display('file:admin/qstadd.tpl');

