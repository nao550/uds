<?php
namespace morris;
include_once __DIR__ . '/../../config.php';
$errormode = 0;

$session = new Session;

$session->sessionChk( );

if ( $session->get('rank') !== "3" ){
  $admintop = 'location: index.php';
  header( $admintop, true, 303);
}

$smarty->assign('sid', $_SESSION['sid']);
$smarty->assign('errormode', $errormode);
$smarty->display('file:admin/top.tpl');

?>
