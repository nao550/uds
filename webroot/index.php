<?php
session_cache_limiter('none');
session_start();
if ( ! isset($_SESSION['id'])){
  $_SESSION['id'] = session_id();
}

include_once '../vendor/autoload.php';
include_once '../config.php';

$smarty = new Smarty();
$smarty->template_dir = $CFG['HOMEDIR'] . 'templates/';
$smarty->compile_dir  = $CFG['HOMEDIR'] . 'templates_c/';
$smarty->config_dir   = $CFG['HOMEDIR'] . 'configs/';
$smarty->cache_dir    = $CFG['HOMEDIR'] . 'cache/';

$smarty->assign("page_title", $CFG['SITENAME']);

$smarty->display('toppage.tpl');


?>
