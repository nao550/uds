<?php
/*
   public function __construct
   public function arStrFmt( string )
   public function getAllExam()
   public function addExam( array )
   public function getExamStr ( long )
   public function updateExam( array )
   public function delExam( long )
   public function countExam(){


*/

namespace morris;
use PDO;

class Exam {
  private $pdo;

  function __construct(){
    $dsn = 'mysql:host=' . $GLOBALS['DBSV'] . ';dbname=' . $GLOBALS['DBNM'] . ';charset=utf8';
    try{
      $this->pdo = new PDO($dsn, $GLOBALS['DBUSER'], $GLOBALS['DBPASS']);
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }
  }

  /*
   */
  function arStrFmt( $arStr ){
    // 受けとった arStr はpostなのでサニタイズする必要がある
    // // FILTER_SQANITIZE_ENCODE で文字化けする？
    $def = array(
      'cd' => FILTER_VALIDATE_INT,
      'catecd' => FILTER_VALIDATE_INT,
      'type' => FILTER_VALIDATE_INT,
      'exam' => FILTER_DEFAULT,
      'correct' => FILTER_VALIDATE_INT,
      'ans1' => FILTER_DEFAULT,
      'ans2' => FILTER_DEFAULT,
      'ans3' => FILTER_DEFAULT,
      'ans4' => FILTER_DEFAULT,
      'ans5' => FILTER_DEFAULT,
      'regdate' => FILTER_DEFAULT
    );
    $arExam = filter_var_array( $arStr, $def );

    return $arExam;
  }

  /* Get all exams
   * @return array
   */
  function GetAllExam()
  {
    $sql = "SELECT * FROM Exam ORDER BY catecd;";
    $stm = $this->pdo->query( $sql );
    return($stm->fetchAll(PDO::FETCH_ASSOC));
  }

  /* add array
   * @param array as added data array.
   * @return boolen.
  */
  function addExam ( $arStr )
  {

    $arExam = $this->arStrFmt( $arStr );

    $sql = 'INSERT INTO Exam (catecd, type, exam, correct, ans1, ans2, ans3, ans4, ans5, regdate ) VALUES (:catecd, :type, :exam, :correct, :ans1, :ans2, :ans3, :ans4, :ans5, NOW());';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':catecd', $arExam['catecd'], PDO::PARAM_INT);
    $stm->bindValue(':type', $arExam['type'], PDO::PARAM_INT);
    $stm->bindValue(':exam', $arExam['exam'], PDO::PARAM_STR);
    $stm->bindValue(':correct', $arExam['correct'], PDO::PARAM_INT);
    $stm->bindValue(':ans1', $arExam['ans1'], PDO::PARAM_STR);
    $stm->bindValue(':ans2', $arExam['ans2'], PDO::PARAM_STR);
    $stm->bindValue(':ans3', $arExam['ans3'], PDO::PARAM_STR);
    $stm->bindValue(':ans4', $arExam['ans4'], PDO::PARAM_STR);
    $stm->bindValue(':ans5', $arExam['ans5'], PDO::PARAM_STR);
    return ($stm->execute());
  }

  function getExamStr( $cd ){
    $sql = "SELECT cd, catecd, type, exam, correct, ans1, ans2, ans3, ans4, ans5 FROM Exam WHERE cd = :cd; ";
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':cd', $cd, PDO::PARAM_INT);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    return $row;
  }


  function updateExam( $arStr ){

    $arExam = $this->arStrFmt( $arStr );

    $sql = 'UPDATE Exam SET catecd = :catecd, type = :type, exam = :exam, '.
           'correct = :correct, ans1 = :ans1, ans2 = :ans2, ans3 = :ans3, '.
           'ans4 = :ans4, ans5 = :ans5 where cd = :cd ;';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':catecd', $arExam['catecd'], PDO::PARAM_INT);
    $stm->bindValue(':type', $arExam['type'], PDO::PARAM_INT);
    $stm->bindValue(':exam', $arExam['exam'], PDO::PARAM_STR);
    $stm->bindValue(':correct', $arExam['correct'], PDO::PARAM_INT);
    $stm->bindValue(':ans1', $arExam['ans1'], PDO::PARAM_STR);
    $stm->bindValue(':ans2', $arExam['ans2'], PDO::PARAM_STR);
    $stm->bindValue(':ans3', $arExam['ans3'], PDO::PARAM_STR);
    $stm->bindValue(':ans4', $arExam['ans4'], PDO::PARAM_STR);
    $stm->bindValue(':ans5', $arExam['ans5'], PDO::PARAM_STR);
    $stm->bindValue(':cd', $arExam['cd'], PDO::PARAM_INT);
    $stm->execute();
    return true;
  }

  function delExam( $cd )
  {
    $sql = "DELETE FROM Exam Where cd = :cd;";
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':cd', $cd, PDO::PARAM_INT);
    return ( $stm->execute());
  }

  function countExam(){
    $sql = "SELECT COUNT(CD) FROM Exam;";
    $stm = $this->pdo->query( $sql );
    return $stm->fetchColumn(0);
  }


  /* for test */

  /* getSelectedValue for test function.
   * @param $cd int as Exam cd.
   * @param $str string as field.
   * @return string field value.
  */
  function getSelectedValue ( $cd, $str )
  {
    $sql = "SELECT ".$str." FROM Exam WHERE cd = ".$cd.";";
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

}
