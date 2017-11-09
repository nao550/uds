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
  private $seqnum;
  
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
   * @param $num int as Qst number.
   * @param $str string as field.
   * @return string field value.
  */
  function getSelectedValue ( $num, $str )
  {
    $sql = "SELECT ".$str." FROM Qst WHERE num = ".$num.";";
    $stm = $this->pdo->prepare($sql);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    return $row[$str];
  }
  
  function addQst ( $arQst )
  {
    $seqnum = new Seqnum;
    $arQst['num'] = $seqnum->getSeqnum ('qst');
    
    $sql = 'INSERT INTO Qst (num, type, question, ans1, ans2, ans3, ans4, ans5 ) VALUES ( :num, :type, :question, :ans1, :ans2, :ans3, :ans4, :ans5);';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':num', $arQst['num'], PDO::PARAM_INT);
    $stm->bindValue(':type', $arQst['type'], PDO::PARAM_INT);
    $stm->bindValue(':question', $arQst['question'], PDO::PARAM_STR);
    $stm->bindValue(':ans1', $arQst['ans1'], PDO::PARAM_STR);
    $stm->bindValue(':ans2', $arQst['ans2'], PDO::PARAM_STR);
    $stm->bindValue(':ans3', $arQst['ans3'], PDO::PARAM_STR);
    $stm->bindValue(':ans4', $arQst['ans4'], PDO::PARAM_STR);
    $stm->bindValue(':ans5', $arQst['ans5'], PDO::PARAM_STR);
    return ($stm->execute());
  }

  function getQstStr( $num ){
    $sql = "SELECT * FROM Qst WHERE num = :num; ORDER BY num ASC";
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':num', $num, PDO::PARAM_INT);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    return $row;
  }
  

  function updateQst( $arQst ){
    $sql = 'UPDATE Qst SET type = :type, question = :question, '.
           'ans1 = :ans1, ans2 = :ans2, ans3 = :ans3, ans4 = :ans4, '.
           'ans5 = :ans5 where num = :num ;';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':type', $arQst['type'], PDO::PARAM_INT);    
    $stm->bindValue(':question', $arQst['question'], PDO::PARAM_STR);
    $stm->bindValue(':ans1', $arQst['ans1'], PDO::PARAM_STR);    
    $stm->bindValue(':ans2', $arQst['ans2'], PDO::PARAM_STR);    
    $stm->bindValue(':ans3', $arQst['ans3'], PDO::PARAM_STR);    
    $stm->bindValue(':ans4', $arQst['ans4'], PDO::PARAM_STR);    
    $stm->bindValue(':ans5', $arQst['ans5'], PDO::PARAM_STR);    
    $stm->bindValue(':num', $arQst['num'], PDO::PARAM_INT);
    $stm->execute();
    return true;
  }

  function delQst( $num )
  {
    $sql = "DELETE FROM Qst Where num = :num;";
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':num', $num, PDO::PARAM_INT);
    return ( $stm->execute());
  }

}
