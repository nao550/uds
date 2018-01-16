<?php
namespace morris;
include_once __DIR__ . '/../../config.php';
$errormode = 0;

$session = new Session;
$exam = new Exam;
$filelib = new Filelib;
$cate = new Cate;

$session->sessionChk( );

if ( $session->get('rank') !== "3" ){
  $admintop = 'location: index.php';
  header( $admintop, true, 303);
}

$cate = $cate->getAllCate();

$mode = getPost('mode');
$cd = getPost('cd');
$msg = array('','');

if ( $mode === 'added' ){
  $exam->addExam( $_POST );
  $cd = $exam->getLastinsertId();
  $mode = '';
} else if ( $mode === 'update' ){
  $exam->updateExam( $_POST );
  $mode = '';
} else if ( $mode === 'del' ){
  $exam->delExam( $cd );
  $mode = '';
}

// $_FILES が設定されていれば画像ファイルの追加
if( isset( $_FILES['fileup'] )){
  // 追加するまえに古いファイルがあれば削除する
  $msg = $filelib->up($_FILES, $cd);
}

// $cd の画像ファイルがあれば $imgpath に設定
$imgpath = '';
if (! $cd == ""){
  $imgfile = $filelib->isImg( $cd );
  if ( $imgfile['flag'] == true ){
    $imgpath = '<img src="'.$imgfile['path'].'" width="'.$imgfile['imgx'].'" height="'.$imgfile['imgy'].'" >';
  }
}

$smarty->assign('sid', $_SESSION['sid']);
$smarty->assign('errormode', $errormode);
$smarty->assign('cate', $cate);
$smarty->assign('msg', $msg);

if ( $mode === 'edit' ){
  $arExam = $exam->getExamStr($cd);
  $smarty->assign('arExam', $arExam);
  $smarty->assign('imgpath', $imgpath);
  $smarty->display('file:admin/examedit.tpl');
} else if ( $mode === 'add' ){
  $smarty->display('file:admin/examadd.tpl');
} else {
  $arExam = $exam->getAllExam();
  $smarty->assign('arExam', $arExam);
  $smarty->display('file:admin/exam.tpl');
}
?>
