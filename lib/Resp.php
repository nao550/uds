<?php
/*
   public function __construct
   public function AddResp( array )
   public function getLastinsertId()
   public function getSelectedValue(int, string)
   public function GetRespStr ( long )
*/

namespace morris;
use PDO;

class Resp {
  private $pdo;
  
  function __construct(){
    $dsn = 'mysql:host=' . $GLOBALS['DBSV'] . ';dbname=' . $GLOBALS['DBNM'] . ';charset=utf8';
    try{
      $this->pdo = new PDO($dsn, $GLOBALS['DBUSER'], $GLOBALS['DBPASS']);
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }
  }


  /* insert Responce data array
   * @param array as added data array.
   * @return boolen.
  */
  function addResp ( $arResp )
  {
    $sql = 'INSERT INTO Resp (uid, qstcd, type, ans, regdate ) VALUES (:uid, :qstcd, :type, :ans, NOW());';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':uid', $arResp['uid'], PDO::PARAM_STR);
    $stm->bindValue(':qstcd', $arResp['qstcd'], PDO::PARAM_STR);    
    $stm->bindValue(':type', $arResp['type'], PDO::PARAM_INT);
    $stm->bindValue(':ans', $arResp['ans'], PDO::PARAM_STR);
    return ($stm->execute());
  }

  /* format Responce data
  * @param $_POST
   * @return boolen
     ここのテストを作成する 登録してチェックのテスト 160x50
  */
  function fmtResp ( ){
    $ans = '';
    $uid = getPost('uid');
    foreach ( $_POST as $value ) {
      if ( isset($value['cd']) !== false ){
        if ( isset($value['ans']) === false ){
          isset($value['ans1']) ? $ans .= $value['ans1'] : $ans .= '' ;
          isset($value['ans2']) ? $ans .= $value['ans2'] : $ans .= '' ;
          isset($value['ans3']) ? $ans .= $value['ans3'] : $ans .= '' ;
          isset($value['ans4']) ? $ans .= $value['ans4'] : $ans .= '' ;
          isset($value['ans5']) ? $ans .= $value['ans5'] : $ans .= '' ;
          $value['ans'] = $ans;
        }
        $value['uid'] = $uid;
        $this->addResp( $value );
        $ans = '';
      }
    }
    return true;
  }

  /*
  function getQstStr( $cd ){
    $sql = "SELECT * FROM Qst WHERE cd = :cd; ORDER BY cd ASC";
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':cd', $cd, PDO::PARAM_INT);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    return $row;
  }

  function delResp( $cd )
  {
    $sql = "DELETE FROM Resp Where cd = :cd;";
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':cd', $cd, PDO::PARAM_INT);
    return ( $stm->execute());
  }
   */

  /* 
   *for test functions. 
   */
  
  /* return last inserted id
   * @return string
   */
  function getLastinsertId (){
    return $this->pdo->lastInsertId();
  }

  /* getSelectedValue for test function.
   * @param $cd int as Resp cd.
   * @param $str string as field.
   * @return string field value.
  */
  function getSelectedValue ( $cd, $str )
  {
    $sql = "SELECT ".$str." FROM Resp WHERE cd = ".$cd.";";
    $stm = $this->pdo->prepare($sql);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    return $row[$str];
  }
  
}