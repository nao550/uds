<?php
session_cache_limiter('none');
session_start();
if ( ! isset($_SESSION['id'])){
  $_SESSION['id'] = session_id();
}

include_once '../vendor/autoload.php';
include_once '../config.php';

$smarty = new Smarty();

$smarty->display('toppage.tpl');

?>
