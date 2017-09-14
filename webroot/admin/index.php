<?php
session_cache_limiter('none');
session_start();
if ( ! isset($_SESSION['id'])){
  $_SESSION['id'] = session_id();
}

include_once __DIR__ . '/../../vendor/autoload.php';
include_once __DIR__ . '/../../config.php';

// 既ログインのチェック、
if (isset ( $_SESSION['user'])){
  // POST の sid と SESSSION id が同じかチェック(セッションハイジャック対応？)
  if( isset($_POST['sid']) && ( $_SESSION['id'] === $_POST[$sid] )){
    header( 'location: '.  $CFG['HOMEPATH'] . 'admin/top.php' );
      
  }
}

// ログインチェック
$errormode = 0;
if (isset($_POST['mode'])){
  if ($_POST['mode'] === 'login'){
    isset( $_POST['inputId'] ) ? $adminId = $_POST['inputId'] : $adminId = '';
    isset( $_POST['inputPassword'] ) ? $adminPassword = $_POST['inputPassword'] : $inputPassword = '';
    If ( $account->adminChk( $adminId, $adminPassword ) ){
      header('location: '. $CFG['HOMEPATH'] . 'admin/top.php');
    } else {
      $errormode = 1;
    }
  }
}

$smarty->assign('errormode', $errormode);
$smarty->display('file:admin/index.tpl');

?>
