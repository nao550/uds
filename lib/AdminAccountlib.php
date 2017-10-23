<?php
/*

*/

class AdminAccount extends Account {

  function AddAdminAccount ( $username, $password )
  {
    $sql = 'INSERT INTO admin (id, psw, regdate ) VALUES ( :id, :psw, :regdate);';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':id', $username, PDO::PARAM_STR);
    $stm->bindValue(':psw', $password, PDO::PARAM_STR);
    $stm->bindValue(':regdate', getToDay(), PDO::PARAM_STR);
    $stm->execute();
    return true;
  }
  
  function chkAdminLogin( $username , $password ){
    
    $sql = 'select * from admin where id = :id and psw = :psw ';
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

  function CngAdminPassword( $username, $oldpassword, $newpassword )
  {
    return true;
  }
  
  function DelAdminAccount ( $username, $password )
  {
    $sql = 'DELETE FROM admin WHERE id = :id AND psw = :psw ;';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':id', $username, PDO::PARAM_STR);
    $stm->bindValue(':psw', $password, PDO::PARAM_STR);
    $stm->execute();
    return true;
  }

}
