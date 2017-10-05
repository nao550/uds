<?php
/*

*/

class Qst {
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

  function AddQst ( $arQst )
  {
    $sql = 'INSERT INTO admin (id, psw, regdate ) VALUES ( :id, :psw, :regdate);';
    $stm = $this->pdo->prepare( $sql );
    $stm->bindValue(':id', $id, PDO::PARAM_STR);
    $stm->bindValue(':psw', $password, PDO::PARAM_STR);
    $stm->bindValue(':regdate', getToDay(), PDO::PARAM_STR);
    $stm->execute();
    return true;
  }

  function GetQstStr( $qstId ){}

  function GetAllQst()
  {
    $sql = "SELECT qst.cd AS cd, qst.type AS type, ".
           "qst.question AS question, choice.choicestr AS choicestr ".
           "FROM qst INNER JOIN choice ON qst.cd = choice.qstcd";

    $stm = $this->pdo->query( $sql );
    
    $rows = $stm->fetchAll();

    $qstcd = 0; $i = 0;
    foreach ( $rows as $row ){
      if ( $qstcd != $row['cd']) {
        $i++;
        $qstcd = $row['cd'];
        $arqst[$i]['cd'] = $row['cd'];
        $arqst[$i]['type'] = $row['type'];
        $arqst[$i]['question'] = $row['question'];
        $arqst[$i]['choicestr'] = array ($row['choicestr']);
      } else {
        array_push($arqst[$i]['choicestr'], $row['choicestr'] );
      }
    }
    return $arqst;
  }

  function UpdateQstStr(){}
  function DelQst( $qstId ){}

}
