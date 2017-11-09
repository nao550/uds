<?php
// 小さい関数群
/*
   #DB connection
   class MDCLASS {

  private function dbconnect(){
    global $CFG;

    $dsn = 'mysql:host=' . $CFG['DBSV'] . ';dbname=' . $CFG['DBNM'] . ';charset=utf8';
    try{
      $pdo = new PDO($dsn, $CFG['DBUSER'], $CFG['DBPASS']);
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }
    return $pdo;
  }

  function get_mdClass( $num = 0 ){
    $pdo = $this->dbconnect();    
    $sql = "SELECT *  FROM T_middleclass ";
    if ( $num != 0 ){
      $sql .= "WHERE largecd= :num " ;
    }
    $sql .= " ORDER BY largecd ASC";

    $stm = $pdo->prepare( $sql );
    if ( $num != 0){
      $stm->bindParam(':num', $num, PDO::PARAM_INT);
    }
    $stm->execute();
    $mdclass = array();
    while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
      $mdclass[] = array($row['cd'], $row['name'], $row['largecd']);
    }
    return $mdclass;
  }

   
*/

// Load Smarty and settings
$smarty = new Smarty();
$smarty->setTemplateDir($CFG['HOMEDIR'] . 'templates/');
$smarty->setCompileDir($CFG['HOMEDIR'] . 'templates_c/');
$smarty->setConfigDir($CFG['HOMEDIR'] . 'configs/');
$smarty->setCacheDir($CFG['HOMEDIR'] . 'cache/');
$smarty->escape_html = true;  // 全てのテンプレート変数出力にHTMLエスケープを適用
// {$value nofilter} nofilter でエスケープが無効になる
// $smarty->setPluginsDir( $CFG['HOMEDIR'] . 'plugins/' )
// {{$value}|nl2br nofilter} でエスケープしてnl2brを設定
$smarty->assign("page_title", $CFG['SITENAME']);
$smarty->debugging = false;

function h( $str ){
  return  htmlspecialchars( $str, ENT_QUOTES, 'UTF-8' );
}

function getPost( $str ){
  isset($_POST[$str]) ? $rstr = h($_POST[$str]) : $rstr = '' ;
  return $rstr;
}

function hankaku( $str ){
  $str = str_replace('、','',$str);
  $str = str_replace(',','',$str);
  $str = str_replace('¥','',$str);
  $str = str_replace('￥','',$str);
  $str = mb_convert_kana($str, 'a');
  return $str;
}

function ThreeKetaDigt( $str ){
  return $str;
}

function getToDay(){
  return date("Y-m-d");
}

function cmbYear( $toYear ){
  $YearBack = 20; // 表示年数
  $thisYear = date("Y"); // 今年
  
  for( $i = 0 ; $YearBack >= $i ; $i++ ){
    $val = $thisYear - $i;
    if ( $toYear == $val ){
      print("<option value=\"$val\" selected>$val</option>\n ");
    } else {
      print("<option value=\"$val\">$val</option>\n ");
    }
  }
}

function cmbMonth( $toMonth ){
  $month = 12;

  for( $i = 1 ; $month >= $i ; $i++ ){
    if ( $i == $toMonth ){
      print("<option value=\"$i\" selected>$i</option>\n ");
    } else {
      print("<option value=\"$i\">$i</option>\n ");
    }
  }
}

function cmbDay( $toDay ){
  $day = 31;
 
  for( $i = 1 ; $day >= $i ; $i++ ){
    if ( $i == $toDay ){
      print("<option value=\"$i\" selected>$i</option>\n ");
    } else {
      print("<option value=\"$i\">$i</option>\n ");
    }
  }
}
