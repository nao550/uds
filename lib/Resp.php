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
    $sql = 'INSERT INTO Resp (uid, qstcd, type, ans, sid, regdate ) VALUES (:uid, :qstcd, :type, :ans, :sid, NOW());';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':uid', $arResp['uid'], PDO::PARAM_STR);
    $stm->bindValue(':qstcd', $arResp['qstcd'], PDO::PARAM_STR);
    $stm->bindValue(':type', $arResp['type'], PDO::PARAM_INT);
    $stm->bindValue(':ans', $arResp['ans'], PDO::PARAM_STR);
    $stm->bindValue(':sid', $arResp['sid'], PDO::PARAM_STR);
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
    $sid = getPost('sid');
    $qstnum = getPost('qstnum');

    for( $n = 1; $n <= $qstnum ; $n++ ){
      if(isset(${$n.'qstcd'})){
        break;
      }

      $qstcd = getPost($n.'qstcd');
      $type = getPost($n.'type');
      $ans = '';

      if (isset($_POST[$n.'ans'])){
        if (is_array($_POST[$n.'ans'])){
          foreach( $_POST[$n.'ans'] as $anser ){
            $ans .= $anser;
          }
        } else {
          $ans = '';
        }
      } else {
        $ans = '';
      }

      $value = array(
        'uid' => $uid,
        'sid' => $sid,
        'qstcd' => $qstcd,
        'type' => $type,
        'ans' => $ans,
        'sid' => $sid

      );
      $this->addResp( $value );
      $ans = '';
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
