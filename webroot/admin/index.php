<?php
session_cache_limiter('none');
session_start();
if ( ! isset($_SESSION['id'])){
  $_SESSION['id'] = session_id();
}

include_once __DIR__ . '/../../vendor/autoload.php';
include_once __DIR__ . '/../../config.php';

// 現在の状態
isset( $_SESSION['mode'] ) ? $mode = $_SESSION['mode'] : $mode ='';
isset( $_GET['mode'] ) ? $mode = $_GET['mode'] : $mode ='';

// 既ログインのチェック、(170915:あとで調整)
if (isset ( $_SESSION['sid'])){
  // POST の sid と SESSSION id が同じかチェック(セッションハイジャック対応？)
  if( isset($_POST['sid']) && ( $_SESSION['sid'] === $_POST[$sid] )){
    header( 'location: '.  $CFG['HOMEPATH'] . 'admin/top.php' );
  }
}

// ログアウト処理
if ( $mode === 'logout' ){
  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
              $params["path"], $params["domain"],
	      $params["secure"], $params["httponly"]
    );
  }
  session_destroy();
  // Cookie情報も削除
  setcookie('sid', '', time()-420000);
  setcookie('user', '', time()-420000);
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
