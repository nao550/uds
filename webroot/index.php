<?php
session_cache_limiter('none');
session_start();
if ( ! isset($_SESSION['id'])){
  $_SESSION['id'] = session_id();
}

include_once '../vendor/autoload.php';
include_once '../config.php';

isset( $_POST['gakusekinum']) ? $gakusekinum = $_POST['gakusekinum'] : $gakusekinum = 'testnum';

$smarty->assign('gakusekinum', $gakusekinum);

$smarty->display('toppage.tpl');


?>
