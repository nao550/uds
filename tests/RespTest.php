<?php
use morris\Resp;

require_once __DIR__.'/Generic_Tests_DatabaseTestCase.php';
require_once __DIR__.'/../lib/functions.php';

class RespTest extends Generic_Tests_DatabaseTestCase
{
  private $uid;
  private $qstcd;
  private $type;
  private $ans;

/*
  public function setUp(){
  }
  */
  /**
  * @return PHPUnit_Extensions_Database_DataSet_IDataSet
  **/
  public function getDataSet()
  {
    $this->uid = '000555';
    $this->qstcd = 4;
    $this->type = 2;
    $this->ans = '12';
    $this->arResp = array( 'uid'=>$this->uid,
                           'qstcd' => $this->qstcd,
                           'type' => $this->type,
                           'ans' => $this->ans );
    $this->target = new Resp;

    return $this->createFlatXMLDataSet(dirname(__FILE__).'/_files/RespDB.xml');
  }

  public function testAddResp ()
  {
    //$this->markTestIncomplete();
    $this->assertEquals(1, $this->target->addResp( $this->arResp) );
    $cd = $this->target->getLastInsertId();
    foreach ( $this->arResp as $key => $value ){
      $this->assertEquals($value, $this->target->getSelectedValue( $cd, $key));
    }
    $this->assertEquals(4, $this->getConnection()->getRowCount( 'Resp'));
  }

  public function testFmtResp (){
    $_POST = $this->arResp;
    $this->assertTrue( $this->target->fmtResp ());
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
