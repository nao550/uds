<?php
namespace morris;
include_once '../config.php';
$session = new Session;
$user = new User;

$errormode = 0;
$session->sessionChk( );

$gakusekinum = "hoge";

// 未解答、解答済かつ合格、解凍済かつ不合格 の3パターン判別
// ボタンの表示変更する

$smarty->assign('gakusekinum', $gakusekinum);
$smarty->display('index.tpl');


?>
