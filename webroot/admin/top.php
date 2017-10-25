<?php
namespace morris;
include_once __DIR__ . '/../../config.php';

$user = new User;


$smarty->assign('sid', $_SESSION['sid']);
$smarty->assign('errormode', $errormode);
$smarty->display('file:admin/top.tpl');

?>
