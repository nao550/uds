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

  function arStrFmt( $arStr ){
    // 受けとった arStr はpostなのでサニタイズする必要がある
    // // FILTER_SQANITIZE_ENCODE で文字化けする？
    $def = array(
      'cd' => FILTER_VALIDATE_INT,
      'num' => FILTER_SANITIZE_ENCODED,
      'nm' => FILTER_DEFAULT,
      'mstflag' => FILTER_VALIDATE_BOOLEAN,
      'mstten' => FILTER_VALIDATE_INT
    );
    $arCate = filter_var_array( $arStr, $def );

    return $arCate;
  }
  
  /* Get all Categorys
   * @return array
   */
  function getAllCate()
  {
    $sql = "SELECT * FROM Cate;";
    $stm = $this->pdo->query( $sql );
    $row = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $row;
  }

  /* add array
   * @param array as added data array.
   * @return boolen.
  */
  function addCate ( $arStr )
  {

    $arCate = $this->arStrFmt( $arStr );
    $num = $this->countCate() + 1; // 現在のレコード数の次の数を取得
    
    $sql = 'INSERT INTO Cate (`num`, `nm`, `mstflag`, `mstten` ) VALUES (:num, :nm, :mstflag, :mstten );';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':num', $arCate['num'], PDO::PARAM_INT);
    $stm->bindValue(':nm', $arCate['nm'], PDO::PARAM_STR);
    $stm->bindValue(':mstflag', $arCate['mstflag'], PDO::PARAM_BOOL);
    $stm->bindValue(':mstten', $arCate['mstten'], PDO::PARAM_INT);
    return ($stm->execute());
  }

  /* getCateStr
   * cd のデータを返す、なければfalse
   * @param int
   * @return array
   */
  function getCateStr( $cd ){
    $sql = "SELECT * FROM Cate WHERE cd = :cd;";
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':cd', $cd, PDO::PARAM_INT);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    return $row;
  }
  
  /* updateCate
   * 引数でテーブルを更新
   * @param arrray as Cate array.
   * @return boolen
   */
  function updateCate( $arStr ){

    $arCate = $this->arStrFmt( $arStr );
    
    $sql = 'UPDATE Cate SET num = :num, nm = :nm, mstflag = :mstflag, mstten = :mstten  where cd = :cd ;';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':cd', $arCate['cd'], PDO::PARAM_INT);
    $stm->bindValue(':num', $arCate['num'], PDO::PARAM_INT);        
    $stm->bindValue(':nm', $arCate['nm'], PDO::PARAM_STR);        
    $stm->bindValue(':mstflag', $arCate['mstflag'], PDO::PARAM_BOOL);        
    $stm->bindValue(':mstten', $arCate['mstten'], PDO::PARAM_INT);        
    return $stm->execute();
  }

  function delCate( $cd )
  {
    $sql = "DELETE FROM Cate Where cd = :cd;";
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':cd', $cd, PDO::PARAM_INT);
    return ( $stm->execute());
  }

  function countCate(){
    $sql = "SELECT COUNT(CD) FROM Cate;";
    $stm = $this->pdo->query( $sql );
    return $stm->fetchColumn(0);
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
