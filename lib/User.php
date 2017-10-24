<?php
/*
   User クラス
   function __construct( array )
   string protected function EncPasswd( string )
   boolen protected function ChkInput( string, string )
   string protected function GetUser( string, string )
   boolen function AddUser ( string, string )
   boolen function chkUserLogin( string, string )
   boolen function CngUserPassword( string, string )
   int function GetUserRank( string, string )
   boolen function DelUser ( string, string )
*/

namespace morris;
use PDO;

class User {

  private     $pdo = null;
  protected   $options = array();
  protected   $encoding = null;

  /* construct
   * @param array
   */
  function __construct(array $options = array()){
    $this->options = $options;
    $this->encoding = "UTF-8";
    
    $dsn = 'mysql:host=' . $GLOBALS['CFG']['DBSV'] . ';dbname=' . $GLOBALS['CFG']['DBNM'] . ';charset=utf8';
    try{
      $this->pdo = new PDO($dsn, $GLOBALS['CFG']['DBUSER'], $GLOBALS['CFG']['DBPASS']);
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }
  }

  /* password string encrypter
   * @return string
   * @param string
   */
  protected function encPasswd($passwd) {
    $string = $GLOBALS['CFG']['PWDSALT'] . $passwd;
    $passcrypt = hash( $GLOBALS['CFG']['CRYPTTYPE'], $string);
    return $passcrypt;
  }

  /* check pasword and username string length and charactor.
   * username: min 6, max 30
   * password: min 8, max 300
   * @return boolen
   * @param string $user
   * @param string $passwd
   */
  protected function ChkInput($user, $passwd) {
    //	文字エンコーディングチェック
    if(!mb_check_encoding($user, $this->encoding)
       || !mb_check_encoding($passwd, $this->encoding)){
      return false;
    }

    //	文字数と使用文字のチェックを行う,
    if(preg_match('/\A[a-z0-9]{6,30}\z/ui', $user) == 0) {
      return false;
    }

    //	文字数と使用文字のチェックを行う
    if(preg_match('/\A[a-z0-9]{8,300}\z/ui', $passwd) == 0) {
      return false;
    }
    return true;
  }

  /* Get user account.
   * @return string,
   * @param string $username
   * @param string $password
   */
  protected function GetUser( $username, $password)
  {
    if (! $this->chkInput( $username, $password) ){
      return false;
    } else {
      $password = $this->EncPasswd( $password );
    }
    
    $sql = 'select * from User where id = :id and psw = :psw ';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':id', $username, PDO::PARAM_STR);
    $stm->bindValue(':psw', $password, PDO::PARAM_STR);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    
    if (isset($row['id'])){
      return $row['id'];
    } else {
      return false;
    }
  }
  
  /* Add user account.
   * @return boolen
   * @param string $username
   * @param string $password
   * @param int $rank
   */
  function AddUser( $username, $password, $rank = 0 )
  {
    if (! $this->chkInput( $username, $password) ){
      return false;
    } else {
      $password = $this->EncPasswd( $password );
    }

    $sql = 'INSERT INTO User (id, psw, rank, regdate ) VALUES ( :id, :psw, :rank, :regdate);';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':id', $username, PDO::PARAM_STR);
    $stm->bindValue(':psw', $password, PDO::PARAM_STR);
    $stm->bindValue(':rank', $rank, PDO::PARAM_STR);    
    $stm->bindValue(':regdate', getToDay(), PDO::PARAM_STR);
    return $stm->execute();
  }
  
  /* is logined check
   * @return boolen
   * @param string @username
   * @param string $password
  */
  function ChkLogin( $username , $password ){
    return ($this->GetUser( $username, $password ));
  }

  /* Change user password.
   * @return boolen
   * @param string $username
   * @param string $oldpassword
   * @param string $newpassword
   */
  function CngUserPassword( $username, $oldpassword, $newpassword )
  {
    $id = $this->GetUser( $username, $oldpassword );
    if (!empty($id)) {
      $password = $this->EncPasswd( $newpassword );
      $sql = 'UPDATE User SET psw = :psw  where id = :id ;';
      $stm = $this->pdo->prepare( $sql );
      $stm->bindValue(':id', $username, PDO::PARAM_STR);
      $stm->bindValue(':psw', $password, PDO::PARAM_STR);
      return ($stm->execute());
    } else {
      return false;
    }
  }

  /** check user rank.
  * @return int
  * @param string $username
  */
  function GetUserRank( $username, $password )
  {
    $password = $this->EncPasswd( $password );
    $sql = 'SELECT rank from User where id = :id AND psw = :psw;';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':id', $username, PDO::PARAM_STR);
    $stm->bindValue(':psw', $password, PDO::PARAM_STR);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    return $row['rank'];
  }

  /** Delete user
  * @return boolen;
  * @param string $username,
  * @param string $password
  */
  function DelUser ( $username, $password )
  {
    if (! $this->chkInput( $username, $password) ){
      return false;
    } else {
      $password = $this->EncPasswd( $password );
    }

    $sql = 'DELETE FROM User WHERE id = :id AND psw = :psw ;';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':id', $username, PDO::PARAM_STR);
    $stm->bindValue(':psw', $password, PDO::PARAM_STR);
    $stm->execute();
    return true;
  }

}
