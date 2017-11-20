<?php
namespace morris;
include_once __DIR__ . '/../../config.php';

$session = new Session;
$user = new User;
$cate = new Cate;

$errormode = 0;
$session->sessionChk( );

if ( $session->get('rank') !== "3" ){
  $admintop = 'location: index.php';
  header( $admintop, true, 303);
}

$smarty->assign('sid', $_SESSION['sid']);
$smarty->assign('errormode', $errormode);

// 更新処理
if (getPost('mode') === 'update'){
  $cate->updateCate( $_POST );
  $mode = '';
} else if (getPost('mode') === 'added'){
  $cate->addCate( $_POST );
  $mode = '';
} else if (getPost('mode') === 'del'){
  $cate->delCate( getPost('cd') );
  $mode = '';
}

// 画面表示
if (getPost('mode') === 'edit'){ // 編集画面
  $arCate = $cate->getCateStr( getPost('cd') );
  $smarty->assign('arCate', $arCate);
  $smarty->display('file:admin/cateedit.tpl');
} else if (getPost('mode') === 'add'){ // 追加画面
  $smarty->display('file:admin/cateadd.tpl');
} else {  // 通常の画面
  $arCate = $cate->getAllCate();
  $smarty->assign('sid', $_SESSION['sid']);
  $smarty->assign('arCate', $arCate);
  $smarty->display('file:admin/cate.tpl');
}
 


