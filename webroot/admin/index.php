<?php
namespace morris;
include_once __DIR__ . '/../../config.php';

$session = new Session;
$user = new User;

$session->sessionChk( );

if ( $session->get('rank') === "3" ){
  $admintop = 'location: top.php';
  header( $admintop, true, 303);
}

if (isset($_POST['username'])){
  $rank = $user->getUserRank( getPost('username'), getPost('password') );
  if ( $rank === "3"){    
    $session->set('sid', session_id());
    $session->set('user', $username);
    $session->set('rank', $rank );
    $admintop = 'location: top.php';
    header( $admintop, true, 303);
  } elseif(! empty($rank) ) {
    $session->set('errormode', 2); // 権限エラー
  } else {
    $session->set('errormode',1 ); // アカウントエラー
  }
} 

// ログインエラーのチェック
if( isset( $_SESSION['errormode'])){
  $errormode = $_SESSION['errormode'];
  $_SESSION['errormode'] = 0;
} else {
  $errormode = 0;
}

$smarty->assign('errormode', $errormode);
$smarty->assign('sid', session_id());
$smarty->display('file:admin/index.tpl');

?>
