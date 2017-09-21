<?php
/*

*/

class Admins {
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

  function AddAdminAccount ( $id, $password )
  {
    $sql = 'INSERT INTO admin (id, psw, regdate ) VALUES ( :id, :psw, :regdate);';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':id', $id, PDO::PARAM_STR);
    $stm->bindValue(':psw', $password, PDO::PARAM_STR);
    $stm->bindValue(':regdate', getToDay(), PDO::PARAM_STR);
    $stm->execute();
    return true;
  }
  
  function chkAdminLogin( $id , $password ){
    
    $sql = 'select * from admin where id = :id and psw = :psw ';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':id', $id, PDO::PARAM_STR);
    $stm->bindValue(':psw', $password, PDO::PARAM_STR);
    $stm->execute();

    $row = $stm->fetch(PDO::FETCH_ASSOC);
    
    if (isset($row['id'])){
      return true;
    } else {
      return false;
    }
  }

  function CngAdminPassword( $id, $oldpassword, $newpassword )
  {
    return true;
  }
  
  function DelAdminAccount ( $id, $password )
  {
    $sql = 'DELETE FROM admin WHERE id = :id AND psw = :psw ;';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':id', $id, PDO::PARAM_STR);
    $stm->bindValue(':psw', $password, PDO::PARAM_STR);
    $stm->execute();
    return true;
  }

}
