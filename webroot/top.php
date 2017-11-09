<?php
namespace morris;
include_once '../config.php';
$session = new Session;
$qst = new Qst;
$user = new User;

var_dump( $_POST );

$errormode = 0;
$session->sessionChk( );

$gakusekinum = "hoge";
$arqst = $qst->getAllQst();

$smarty->assign('arqst', $arqst);
$smarty->assign('gakusekinum', $gakusekinum);
$smarty->display('top.tpl');
