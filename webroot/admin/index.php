<?php
session_cache_limiter('none');
session_start();
if ( ! isset($_SESSION['id'])){
  $_SESSION['id'] = session_id();
}

include_once __DIR__ . '/../../vendor/autoload.php';
include_once __DIR__ . '/../../config.php';


if (isset ( $_SESSION['user'])){
  // POST の sid と SESSSION id が同じかチェック(セッションハイジャック対応？)
  if( isset($_POST['sid']) && ( $_SESSION['id'] === $_POST[$sid] )){
    header( 'location: '.  $CFG['HOMEPATH'] . 'admin/top.php' );
      
  }
}
var_dump( $smarty->template_dir );

$smarty->display('file:admin/index.tpl');

?>
