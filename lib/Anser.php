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

class Anser {
  private $pdo;

  function __construct(){
    $dsn = 'mysql:host=' . $GLOBALS['DBSV'] . ';dbname=' . $GLOBALS['DBNM'] . ';charset=utf8';
    try{
      $this->pdo = new PDO($dsn, $GLOBALS['DBUSER'], $GLOBALS['DBPASS']);
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }
  }

  /* insert ansers
   * @param array as anwer
   * @return true;
   */
  function addAns ( $arStr )
  {
    $sql = 'INSERT INTO Ans (uid, examcd, catcd, type, ans, correct, sid, regdate ) VALUES (:uid, :examcd, :catcd, :type, :ans, :correct, :sid, NOW());';

    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':uid', $arStr['uid'], PDO::PARAM_INT);
    $stm->bindValue(':examcd', $arStr['examcd'], PDO::PARAM_INT);
    $stm->bindValue(':catcd', $arStr['catcd'], PDO::PARAM_INT);
    $stm->bindValue(':type', $arStr['type'], PDO::PARAM_INT);
    $stm->bindValue(':ans', $arStr['ans'], PDO::PARAM_STR);
    $stm->bindValue(':sid', $arStr['sid'], PDO::PARAM_STR);
    $stm->bindValue(':correct', $arStr['correct'], PDO::PARAM_INT);
    return ($stm->execute());
  }

  /* format Responce data
  * @param $_POST
   * @return boolen
  */
  function fmtAns ( ){
    $n = 1;
    $uid = getPost('uid');
    $sid = getPost('sid');
    $examnum = getPost('examnum');
    for( $n = 1 ; $n <= $examnum ; $n++ ){
      if (isset(${$n.'examcd'})){
        echo "break";
        break;
      }

      $examcd = getPost($n.'examcd');
      $catcd = getPost($n.'catcd');
      $correct = getPost($n.'correct');
      $type = getPost($n.'type');
      $ans = '';

      if (isset($_POST[$n.'ans'])){
        if (is_array( $_POST[$n.'ans'])){
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
        'examcd' => $examcd,
        'catcd' => $catcd,
        'correct' => $correct,
        'type' => $type,
        'ans' => $ans );
      $this->addans( $value );
    }

    /*
    foreach ( $_POST as $key => $value ) {
      var_dump( $key ." and ". $value );
      echo "<br />\n";
     */

/*
      if (isset( $value['examcd']) !== false){
        $value['uid'] = $uid;
        if (isset($value['catcd']) === false){
          return false;
        }
        if ( isset($value['ans']) === false ){
          isset($value['ans1']) ? $ans .= $value['ans1'] : $ans .= '' ;
          isset($value['ans2']) ? $ans .= $value['ans2'] : $ans .= '' ;
          isset($value['ans3']) ? $ans .= $value['ans3'] : $ans .= '' ;
          isset($value['ans4']) ? $ans .= $value['ans4'] : $ans .= '' ;
          isset($value['ans5']) ? $ans .= $value['ans5'] : $ans .= '' ;
          $value['ans'] = $ans;
        }

        $this->addAns( $value );
        $ans = '';
      }
 */
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
    $sql = "SELECT ".$str." FROM Ans WHERE cd = ".$cd.";";
    $stm = $this->pdo->prepare($sql);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    return $row[$str];
  }

}
