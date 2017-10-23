<?php
include_once __DIR__ . '/../../config.php';

$auth = new AdminAuth;

$auth->AdminLogin();

// ログインのチェック t:login f:not-login
if ( $auth->isLogined() ){
  header('http://' .$CFG['HOMEPATH']. 'admin/top.php', ture, 303);
}


// ログインエラーのチェック
if( isset( $_SESSION['errormode'])){
  $errormode = $_SESSION['errormode'];
  $_SESSION['errormode'] = 0;
} else {
  $errormode = 0;
}

$smarty->assign('errormode', $errormode);
$smarty->display('file:admin/index.tpl');

?>
