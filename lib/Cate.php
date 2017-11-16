<?php
/*
   public function __construct
   public function getAllCate()
   public function addCate( array )
   public function getCateStr ( long )
   public function updateCate( array )
   public function delCate( long )
*/

namespace morris;
use PDO;

class Cate {
  private $pdo;
  
  function __construct(){
    $dsn = 'mysql:host=' . $GLOBALS['DBSV'] . ';dbname=' . $GLOBALS['DBNM'] . ';charset=utf8';
    try{
      $this->pdo = new PDO($dsn, $GLOBALS['DBUSER'], $GLOBALS['DBPASS']);
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }
  }

  /* Get all Categorys
   * @return array
   */
  function getAllCate()
  {
    $sql = "SELECT * FROM Cate;";
    $stm = $this->pdo->query( $sql );
    return($stm->fetchAll(PDO::FETCH_ASSOC));
  }

  /* add array
   * @param array as added data array.
   * @return boolen.
  */
  function addCate ( $nm )
  {
    $sql = 'INSERT INTO Cate ( nm ) VALUES (:nm );';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':nm', $nm, PDO::PARAM_STR);
    return ($stm->execute());
  }

  function getCateStr( $cd ){
    $sql = "SELECT * FROM Cate WHERE cd = :cd; ORDER BY cd ASC";
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':cd', $cd, PDO::PARAM_INT);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    return $row;
  }
  

  function updateCate( $cd, $nm ){
    
    $sql = 'UPDATE Cate SET nm = :nm where cd = :cd ;';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':cd', $cd, PDO::PARAM_INT);
    $stm->bindValue(':nm', $nm, PDO::PARAM_STR);        
    $stm->execute();
    return true;
  }

  function delCate( $cd )
  {
    $sql = "DELETE FROM Cate Where cd = :cd;";
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':cd', $cd, PDO::PARAM_INT);
    return ( $stm->execute());
  }


  /* getSelectedValue for test function.
   * @param $cd int as Qst cd.
   * @param $str string as field.
   * @return string field value.
  */
  function getSelectedValue ( $cd, $str )
  {
    $sql = "SELECT ".$str." FROM Cate WHERE cd = ".$cd.";";
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
