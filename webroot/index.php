<?php
namespace morris;
include_once '../config.php';
$session = new Session;
$user = new User;

$errormode = 0;
$session->sessionChk( );

$gakusekinum = "hoge";

$smarty->assign('gakusekinum', $gakusekinum);

$smarty->display('index.tpl');


?>
