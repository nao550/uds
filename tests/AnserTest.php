<?php
use morris\Anser;
require_once __DIR__.'/Generic_Tests_DatabaseTestCase.php';
require_once __DIR__.'/../lib/functions.php';

class AnserTest extends Generic_Tests_DatabaseTestCase
{
  private $uid;
  private $examcd;
  private $catcd;
  private $type;
  private $ans;
  private $correct;

/*
  public function setUp(){
  }
  */
  /**
  * @return PHPUnit_Extensions_Database_DataSet_IDataSet
  **/
  public function getDataSet()
  {
    $this->uid = "xxxxx9999";
    $this->examcd = 99;
    $this->catcd = 999;
    $this->type = 2;
    $this->ans = "12";
    $this->correct = 1;

    $this->arAns = array(
      'uid' => $this->uid,
      'examcd' => $this->examcd,
      'catcd' => $this->catcd,
      'type' => $this->type,
      'ans' => $this->ans,
      'correct' => $this->correct,
    );

    $this->target = new Anser;

    return $this->createFlatXMLDataSet(dirname(__FILE__).'/_files/AnserDB.xml');
  }

  public function testAddAns ()
  {
    $this->assertTrue($this->target->addAns( $this->arAns));
    $cd = $this->target->getLastInsertId();
    foreach ( $this->arAns as $key => $value ){
      $this->assertEquals($value, $this->target->getSelectedValue( $cd, $key));
    }
    $this->assertEquals(5, $this->getConnection()->getRowCount( 'Ans'));
  }

  public function testFmtResp (){
    $_POST = $this->arAns;
    $this->assertTrue( $this->target->fmtAns ());
  }
}



/*
  public function testGetRowCount()
  {
    $this->assertEquals(4, $this->getConnection()->getRowCount( 'Qst'));
  }

  public function testGetAllQstDataset()
  {
    $queryTable = $this->getConnection()->createQueryTable('Qst', 'SELECT * FROM Qst;');
    $expectedTable = $this->createFlatXmlDataSet( __DIR__.'/_files/QstDB.xml')->getTable('Qst');
    $this->assertTablesEqual($expectedTable, $queryTable);
  }

  public function testGetAllQst()
  {
    // 登録データについては比較せず、件数のみ
    $n = 0;
    foreach ( $this->target->getAllQst() as $row ){
      $n++;
    }
    $this->assertEquals(4, $n);
  }


  public function testAddQst ()
  {
    //$this->markTestIncomplete();
    $this->assertEquals(1, $this->target->addQst( $this->arQst) );
    $cd = $this->target->getLastInsertId();
    foreach ( $this->arQst as $key => $value ){
      $this->assertEquals($value, $this->target->getSelectedValue( $cd, $key));
    }
    $this->assertEquals(5, $this->getConnection()->getRowCount( 'Qst'));
  }

  public function testGetQstStr()
  {
    $this->target->addQst( $this->arQst );
    $cd = $this->target->getLastInsertId();
    $this->assertEquals( $this->arQst, $this->target->getQstStr($cd));
  }

  public function testUpdateQst()
  {
    $this->target->addQst( $this->arQst);
    $this->arQst['ans1'] = 'renewans1';
    $this->arQst['ans2'] = 'renewans2';
    $this->arQst['ans3'] = 'renewans3';
    $this->arQst['ans4'] = 'renewans4';
    $this->arQst['ans5'] = 'renewans5';
    $this->assertTrue( $this->target->UpdateQst( $this->arQst ));
    foreach ( $this->arQst as $key => $value ){
      $this->assertEquals($value, $this->target->getSelectedValue( $this->arQst['cd'], $key));
    }
  }

  public function testDelQst()
  {
    $this->target->addQst( $this->arQst);
    $this->assertTrue( $this->target->delQst( $this->cd ));
  }
}
*/
