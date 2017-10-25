<?php
/*
   User クラス
   function __construct( array )
   string protected function encPasswd( string )
   boolen protected function chkInput( string, string )
   string protected function getUser( string, string )
   int function addUser ( string, string, int )
   boolen function chkLogin( string, string )
   boolen function existUser( string )
   int function cngUserPassword( string, string )
   int function getUserRank( string, string )
   int function delUser ( string, string )
*/

namespace morris;
use PDO;

class User {

  private     $pdo = null;
  protected static $logined = null;
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
   * @param string
   * @return string
   */
  protected function encPasswd($passwd) {
    $string = $GLOBALS['CFG']['PWDSALT'] . $passwd;
    $passcrypt = hash( $GLOBALS['CFG']['CRYPTTYPE'], $string);
    return $passcrypt;
  }

  /* check pasword and username string length and charactor.
   * username: min 6, max 30
   * password: min 8, max 300
   * @param string $user
   * @param string $passwd
   * @return boolen
   */
  protected function chkInput($user, $passwd) {
    //	文字エンコーディングチェック
    if(!mb_check_encoding($user, $this->encoding)
       || !mb_check_encoding($passwd, $this->encoding)){
      return false;
    }

    //	文字数と使用文字のチェックを行う,
    if(preg_match('/\A[a-z0-9]{6,30}\z/', $user) == 0) {
      return false;
    }

    //	文字数と使用文字のチェックを行う
    if(preg_match('/\A[a-z0-9]{8,300}\z/ui', $passwd) == 0) {
      return false;
    }
    return true;
  }

  /* Get user account.
   * @param string $username
   * @param string $password
   * @return string,
   */
  protected function getUser( $username, $password = '')
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
   * @param string $username
   * @param string $password
   * @param int $rank
   * @return int
   */
  function addUser( $username, $password, $rank = 0 )
  {
    // ユーザ名、パスワードのながさチェック
    if (! $this->chkInput( $username, $password) ){
      return 0;
    } else {
      $password = $this->EncPasswd( $password );
    }

    // ユーザ名の重複チェック
    if ($this->ExistUser( $username ) >= 1) {
      return 0;
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
   * @param string @username
   * @param string $password
   * @return boolen
  */
  function chkLogin( $username , $password ){
    $user = $this->getUser( $username, $password );
    if (! empty( $user )){
      return true;
    };
    return false;
  }

  /* User exists check.
   * @param string $username
   * @return string $username
   */
  function existUser( $username ){
    $sql = 'select * from User where id = :id; ';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':id', $username, PDO::PARAM_STR);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    if ($stm->rowCount() === 1){
      return true;
    } else {
      return false;
    }
  }

  /* Change user password.
   * @param string $username
   * @param string $oldpassword
   * @param string $newpassword
   * @return int
   */
  function cngUserPassword( $username, $oldpassword, $newpassword )
  {
    $id = $this->getUser( $username, $oldpassword );
    if (!empty($id)) {
      $password = $this->EncPasswd( $newpassword );
      $sql = 'UPDATE User SET psw = :psw  where id = :id ;';
      $stm = $this->pdo->prepare( $sql );
      $stm->bindValue(':id', $username, PDO::PARAM_STR);
      $stm->bindValue(':psw', $password, PDO::PARAM_STR);
      return ($stm->execute());
    } else {
      return 0;
    }
  }

  /** check user rank.
  * @return string
  */
  function getUserRank( $username, $password )
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
  * @param string $username,
  * @param string $password
  * @return boolen;
  */
  function DelUser ( $username, $password )
  {
    if (! $this->chkInput( $username, $password) ){
      return 0;
    } else {
      $password = $this->EncPasswd( $password );
    }

    $sql = 'DELETE FROM User WHERE id = :id AND psw = :psw ;';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':id', $username, PDO::PARAM_STR);
    $stm->bindValue(':psw', $password, PDO::PARAM_STR);
    $stm->execute();
    return $stm->rowCount();
  }
}
