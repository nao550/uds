<?php
namespace morris;
include_once __DIR__ . '/../../config.php';
$errormode = 0;

$session = new Session;
$exam = new Exam;

$session->sessionChk( );

if ( $session->get('rank') !== "3" ){
  $admintop = 'location: index.php';
  header( $admintop, true, 303);
}

var_dump( $_POST ); echo "<br />\n";
$arExam = $exam->getAllExam();

$smarty->assign('sid', $_SESSION['sid']);
$smarty->assign('errormode', $errormode);
$smarty->assign('arExam', $arExam);
$smarty->display('file:admin/exam.tpl');

?>
