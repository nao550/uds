<?php
use morris\Qst;
require_once __DIR__.'/Generic_Tests_DatabaseTestCase.php';

class QstTest extends Generic_Tests_DatabaseTestCase
{
  private $cd;
  private $num;
  private $type;
  private $question;
  private $ans1;
  private $ans2;
  private $ans3;
  private $ans4;
  private $ans5;
  private $arQst;
  private $target;
  
/*
  public function setUp(){
  }
  */
  /**
  * @return PHPUnit_Extensions_Database_DataSet_IDataSet
  **/
  public function getDataSet()
  {
    $this->cd = '';
    $this->num = 99;
    $this->type = 2;
    $this->ans1 = $this->ans2 = $this->ans3 = $this->ans4 = $this->ans5 = "選択肢";
    $this->question = "this is question.";
    $this->arQst = array( 'num' => $this->num, 'type' => $this->type,
                          'question'=> $this->question,
                          'ans1' => $this->ans1, 'ans2' => $this->ans2,
                          'ans3' => $this->ans3, 'ans4' => $this->ans4,
                          'ans5' => $this->ans5 );
    $this->target = new Qst;

    return $this->createFlatXMLDataSet(dirname(__FILE__).'/_files/QstDB.xml');    
  }

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
    foreach ( $this->target->GetAllQst() as $row ){
      $n++;
    }
    $this->assertEquals(4, $n);
  }
  
  
  public function testAddQst ()
  {
    //$this->markTestIncomplete();
    $this->assertEquals(1, $this->target->addQst( $this->arQst) );
    foreach ( $this->arQst as $key => $value ){
      $this->assertEquals($value, $this->target->getSelectedValue( $this->arQst['num'], $key));
    }
    $this->assertEquals(5, $this->getConnection()->getRowCount( 'Qst'));    
  }

  public function testGetQstStr()
  {
    $this->target->addQst( $this->arQst );
    $this->arQst['cd'] = $this->target->getSelectedValue( $this->num, 'cd');
    $this->assertEquals( $this->arQst, $this->target->getQstStr($this->num));
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
      $this->assertEquals($value, $this->target->getSelectedValue( $this->arQst['num'], $key));
    }
  }

  public function testDelQst()
  {
    $this->target->addQst( $this->arQst);    
    $this->assertTrue( $this->target->delQst( $this->num ));
  }
}


