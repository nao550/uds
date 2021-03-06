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


function h( $str ){
  return  htmlspecialchars( $str, ENT_QUOTES, 'UTF-8' );
}

function getPost( $str ){
  isset($_POST[$str]) ? $rstr = h($_POST[$str]) : $rstr = '' ;
  return $rstr;
}

function valPost(){
  $ret = array();
  foreach ( $_POST as $key => $val ){
    $ret[$key] = $val;
  }
  return $ret;
}

function isChecked( $str, $check ){
  if (strpos( $str, $check )){
    return 'checked';
  }
  return '';
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
