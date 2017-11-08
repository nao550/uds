<?php
/* シーケンス番号管理クラス
   _construct()
   bint getSeqnum( str );
   bint nextSeqnum( str );
   setSeqnum ( str, bint );
*/

namespace morris;
use PDO;

class Seqnum {

  private $pdo;

  function __construct(){
    $dsn = 'mysql:host=' . $GLOBALS['DBSV'] . ';dbname=' . $GLOBALS['DBNM'] . ';charset=utf8';
    try{
      $this->pdo = new PDO($dsn, $GLOBALS['DBUSER'], $GLOBALS['DBPASS']);
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }
  }
  
  /* 現在の値を取得して、次のために数字をinc
   * bint getSeqnum ( str )
   * @param $nm string
   * @return bint
  */
  function getSeqnum( $nm )
  {
    $sql = 'SELECT seq FROM Seqnum WHERE nm = :nm;';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':nm', $nm, PDO::PARAM_STR);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    if ( empty($row)){  // $nm がなければ新しく追加
      return $this->initSeqnum( $nm );
    }
    $num = $row['seq'];
    $next = $num + 1;

    $stm = '';
    
    $sql = 'UPDATE Seqnum SET seq = :next WHERE nm = :nm';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':next', $next, PDO::PARAM_INT);
    $stm->bindValue(':nm', $nm, PDO::PARAM_STR);
    $stm->execute( );
    return $num;
  }

  /* 次のシーケンス番号を取得
   * @param $nm string
   * @return bint
  */
  function nextSeqnum( $nm )
  {
    $sql = 'SELECT seq FROM Seqnum WHERE nm = :nm ;';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':nm', $nm, PDO::PARAM_STR);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    $num = $row['seq'];
    return $num;
  }

  /* nm を指定されたシーケンス番号に設定
   * @param $nm string
   * @param $seq bint
   * @return boolen
  */
  function setSeqnum( $nm, $seq )
  {
    $sql = "UPDATE Seqnum SET seq = :seq WHERE nm = :nm;";
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':seq', $seq, PDO::PARAM_INT);
    $stm->bindValue(':nm', $nm, PDO::PARAM_STR);
    return ($stm->execute());
  }

  
  public function initSeqnum( $nm )
  {
    if( empty($this->nextSeqnum( $nm ))){
      $sql = "INSERT INTO Seqnum ['seq', 'nm'] value (1, :nm);";
      $stm = $this->pdo->prepare( $sql );
      $stm->bindValue(':nm', $nm, PDO::PARAM_STR);
      $stm->execute();
      return 1;
    }
    echo 'match false.';
    return false;
  }
}
