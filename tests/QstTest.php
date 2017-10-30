<?php
use morris\Qst;
require_once __DIR__.'/Generic_Tests_DatabaseTestCase.php';

class QstTest extends Generic_Tests_DatabaseTestCase
{
  private $num;
  private $type;
  private $question;
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
    $this->num = 99;
    $this->type = 2;
    $this->question = "this is question.";
    $this->arQst = array( 'num' => $this->num, 'type' => $this->type, 'question'=> $this->question );
    $this->target = new Qst;

    return $this->createFlatXMLDataSet(dirname(__FILE__).'/_files/QstDB.xml');    
  }

  public function testGetRowCount()
  {
    $this->assertEquals(8, $this->getConnection()->getRowCount( 'Qst'));
  }

  public function testGetAllQstData()
  {
    $queryTable = $this->getConnection()->createQueryTable('Qst', 'SELECT * FROM Qst;');
    $expectedTable = $this->createFlatXmlDataSet( __DIR__.'/_files/QstDB.xml')->getTable('Qst');
    $this->assertTablesEqual($expectedTable, $queryTable);
  }

  public function testAddQst ()
  {
    //$this->markTestIncomplete();
    $this->assertEquals(1, $this->target->addQst( $this->arQst) );
    $this->assertEquals(9, $this->getConnection()->getRowCount( 'Qst'));    
  }

  public function testGetQstStr()
  {
    $this->assertEquals( 4, $this->target->getQstStr('2'));
  }

  public function testGetAllQst()
  {
    $this->markTestSkipped();
  }
}


