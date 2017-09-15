<?php
/*

*/

CLASS ACCOUNT {

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

  function chkAdminLogin( $id , $password ){
    return true;
  }

  
}
