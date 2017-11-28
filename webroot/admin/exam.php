<?php
namespace morris;
include_once __DIR__ . '/../../config.php';
$errormode = 0;

$session = new Session;
$exam = new Exam;
$cate = new Cate;

$session->sessionChk( );

if ( $session->get('rank') !== "3" ){
  $admintop = 'location: index.php';
  header( $admintop, true, 303);
}

$cate = $cate->getAllCate();

$mode = getPost('mode');
$cd = getPost('cd');

$smarty->assign('sid', $_SESSION['sid']);
$smarty->assign('errormode', $errormode);
$smarty->assign('cate', $cate);

if ( $mode === 'added' ){
  $exam->addExam( $_POST );
  $mode = '';
} else if ( $mode === 'update' ){
  $exam->updateExam( $_POST );
  $mode = '';
} else if ( $mode === 'del' ){
  $exam->delExam( $cd );
  $mode = '';
}

if ( $mode === 'edit' ){
  $arExam = $exam->getExamStr($cd);
  $smarty->assign('arExam', $arExam);
  $smarty->display('file:admin/examedit.tpl');
} else if ( $mode === 'add' ){
  $smarty->display('file:admin/examadd.tpl');
} else {
  $arExam = $exam->getAllExam();
  $smarty->assign('arExam', $arExam);
  $smarty->display('file:admin/exam.tpl');
}
?>
