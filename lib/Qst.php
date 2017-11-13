<?php
/*
   public function __construct
   public function AddQst( array )
   public function GetQstStr ( long )
   public function GetAllQst()
   public function UpdateQst( array )
   public function DelQst( long )
*/

namespace morris;
use PDO;

class Qst {
  private $pdo;
  
  function __construct(){
    $dsn = 'mysql:host=' . $GLOBALS['DBSV'] . ';dbname=' . $GLOBALS['DBNM'] . ';charset=utf8';
    try{
      $this->pdo = new PDO($dsn, $GLOBALS['DBUSER'], $GLOBALS['DBPASS']);
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }
  }

  function GetAllQst()
  {
    $sql = "SELECT * FROM Qst;";
    $stm = $this->pdo->query( $sql );
    return($stm->fetchAll(PDO::FETCH_ASSOC));
  }

  /* getSelectedValue for test function.
   * @param $cd int as Qst cd.
   * @param $str string as field.
   * @return string field value.
  */
  function getSelectedValue ( $cd, $str )
  {
    $sql = "SELECT ".$str." FROM Qst WHERE cd = ".$cd.";";
    $stm = $this->pdo->prepare($sql);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    return $row[$str];
  }

  /* return last inserted id
   * @return string
   */
  function getLastinsertId (){
    return $this->pdo->lastInsertId();
  }

  /* add array
   * @param array as added data array.
   * @return boolen.
  */
  function addQst ( $arQst )
  {
    
    $sql = 'INSERT INTO Qst (type, question, ans1, ans2, ans3, ans4, ans5 ) VALUES (:type, :question, :ans1, :ans2, :ans3, :ans4, :ans5);';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':type', $arQst['type'], PDO::PARAM_INT);
    $stm->bindValue(':question', $arQst['question'], PDO::PARAM_STR);
    $stm->bindValue(':ans1', $arQst['ans1'], PDO::PARAM_STR);
    $stm->bindValue(':ans2', $arQst['ans2'], PDO::PARAM_STR);
    $stm->bindValue(':ans3', $arQst['ans3'], PDO::PARAM_STR);
    $stm->bindValue(':ans4', $arQst['ans4'], PDO::PARAM_STR);
    $stm->bindValue(':ans5', $arQst['ans5'], PDO::PARAM_STR);
    return ($stm->execute());
  }

  function getQstStr( $cd ){
    $sql = "SELECT * FROM Qst WHERE cd = :cd; ORDER BY cd ASC";
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':cd', $cd, PDO::PARAM_INT);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    return $row;
  }
  

  function updateQst( $arQst ){
    $sql = 'UPDATE Qst SET type = :type, question = :question, '.
           'ans1 = :ans1, ans2 = :ans2, ans3 = :ans3, ans4 = :ans4, '.
           'ans5 = :ans5 where cd = :cd ;';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':type', $arQst['type'], PDO::PARAM_INT);    
    $stm->bindValue(':question', $arQst['question'], PDO::PARAM_STR);
    $stm->bindValue(':ans1', $arQst['ans1'], PDO::PARAM_STR);    
    $stm->bindValue(':ans2', $arQst['ans2'], PDO::PARAM_STR);    
    $stm->bindValue(':ans3', $arQst['ans3'], PDO::PARAM_STR);    
    $stm->bindValue(':ans4', $arQst['ans4'], PDO::PARAM_STR);    
    $stm->bindValue(':ans5', $arQst['ans5'], PDO::PARAM_STR);    
    $stm->bindValue(':cd', $arQst['cd'], PDO::PARAM_INT);
    $stm->execute();
    return true;
  }

  function delQst( $cd )
  {
    $sql = "DELETE FROM Qst Where cd = :cd;";
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':cd', $cd, PDO::PARAM_INT);
    return ( $stm->execute());
  }

}
