<?php
session_cache_limiter('none');
session_start();
if ( ! isset($_SESSION['id'])){
  $_SESSION['id'] = session_id();
}

include_once __DIR__ . '/../../vendor/autoload.php';
include_once __DIR__ . '/../../config.php';
//include_once $CFG['HOMEDIR'] . 'lib/accountlib.php';
//include_once $CFG['HOMEDIR'] . 'lib/qstlib.php';

// 既ログインのチェック、
if (isset ( $_SESSION['sid'])){
  // POST の sid と SESSSION id が同じかチェック(セッションハイジャック対応？)
  if( isset($_POST['sid']) && ( $_SESSION['sid'] === $_POST[$sid] )){
    header('location: '.  $CFG['HOMEPATH'] . 'admin/top.php');
  } else {
//    header('location: '. $CFG['HOMEPATH'] . 'admin/index.php');
  }
}

$account = new Account;

// ログインチェック
$errormode = 0;
if (isset($_POST['mode'])){
  if ($_POST['mode'] === 'login'){
    isset( $_POST['inputId'] ) ? $adminId = $_POST['inputId'] : $adminId = '';
    isset( $_POST['inputPassword'] ) ? $adminPassword = $_POST['inputPassword'] : $inputPassword = '';
    If ( $account->chkAdminLogin( $adminId, $adminPassword ) ){
      // ログインOK
      $_SESSION['accaout'] = $adminId;
      $_SESSION['sid'] = session_regenerate_id();
      setcookie('sid', $_SESSION['sid'], time()+60*60*24); // set sid to cookie
    } else {
      // ログイン false
      $_SESSION['errormode'] = 1;
      header('location: '. $CFG['HOMEPATH'] . 'admin/index.php');
    }
  }
} else {
      header('location: '. $CFG['HOMEPATH'] . 'admin/index.php');
}

$qst = new Qst;
$arqst = $qst->GetAllQst();

$smarty->assign('sid', $_SESSION['sid']);
$smarty->assign('arqst', $arqst );
$smarty->assign('errormode', $errormode);
$smarty->display('file:admin/qst.tpl');


?>
