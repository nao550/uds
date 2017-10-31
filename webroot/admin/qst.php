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

$qst = new Qst;
$arqst = $qst->getAllQst();

$smarty->assign('sid', $_SESSION['sid']);
$smarty->assign('arqst', $arqst );
$smarty->assign('errormode', $errormode);
$smarty->display('file:admin/qst.tpl');

