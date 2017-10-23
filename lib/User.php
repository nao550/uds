<?php
/*
   User クラス
  function AddUser ( $username, $password )
  function chkUserLogin( $username , $password ){
  function CngUserPassword( $username, $oldpassword, $newpassword )
  function DelUser ( $username, $password )

*/

namespace morris;
use PDO;   // グローバルクラスを使うには前に／

class User {

  private $pdo;

  function __construct(){
    global $CFG;
    $dsn = 'mysql:host=' . $CFG['DBSV'] . ';dbname=' . $CFG['DBNM'] . ';charset=utf8';
    try{
      $this->pdo = new PDO($dsn, $CFG['DBUSER'], $CFG['DBPASS']);
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }
  }
  
  function AddUser( $username, $password )
  {
    $sql = 'INSERT INTO Users (id, psw, regdate ) VALUES ( :id, :psw, :regdate);';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':id', $username, PDO::PARAM_STR);
    $stm->bindValue(':psw', $password, PDO::PARAM_STR);
    $stm->bindValue(':regdate', getToDay(), PDO::PARAM_STR);
    $stm->execute();
    return true;
  }
  
  function ChkLogin( $username , $password ){
    
    $sql = 'select * from Users where id = :id and psw = :psw ';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':id', $username, PDO::PARAM_STR);
    $stm->bindValue(':psw', $password, PDO::PARAM_STR);
    $stm->execute();

    $row = $stm->fetch(PDO::FETCH_ASSOC);
    
    if (isset($row['id'])){
      return true;
    } else {
      return false;
    }
  }

  function CngUserPassword( $username, $oldpassword, $newpassword )
  {
    return true;
  }
  
  function DelUser ( $username, $password )
  {
    $sql = 'DELETE FROM Users WHERE id = :id AND psw = :psw ;';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':id', $username, PDO::PARAM_STR);
    $stm->bindValue(':psw', $password, PDO::PARAM_STR);
    $stm->execute();
    return true;
  }

}
