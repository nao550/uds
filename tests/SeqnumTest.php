<?php
use morris\Seqnum;
require_once __DIR__.'/Generic_Tests_DatabaseTestCase.php';

class QstTest extends Generic_Tests_DatabaseTestCase
{
  private $seq;
  private $nm;
  
/*
  public function setUp(){
  }
  */
  /**
  * @return PHPUnit_Extensions_Database_DataSet_IDataSet
  **/
  public function getDataSet()
  {
    $this->seq = 99;
    $this->nm = 'test2';
    $this->target = new Seqnum;

    return $this->createFlatXMLDataSet(dirname(__FILE__).'/_files/SeqnumDB.xml');    
  }

  public function testGetRowCount()
  {
    $this->assertEquals(1, $this->getConnection()->getRowCount( 'Seqnum'));
  }

  public function testGetAllQstDataset()
  {
    $queryTable = $this->getConnection()->createQueryTable('Seqnum', 'SELECT * FROM Seqnum;');
    $expectedTable = $this->createFlatXmlDataSet( __DIR__.'/_files/SeqnumDB.xml')->getTable('Seqnum');
    $this->assertTablesEqual($expectedTable, $queryTable);
  }

  public function testGetSeqnum()
  {
    $this->assertEquals(1, $this->target->getSeqnum( 'test' ));
    $this->assertEquals(1, $this->target->getSeqnum( 'test3' ));    
  }

  public function testNextSeqnum()
  {
    $this->target->getSeqnum('test');
    $this->assertEquals(2, $this->target->nextSeqnum( 'test' ));
    $this->assertFalse( $this->target->nextSeqnum( 'test4'));
  }

  public function testSetSeqnum()
  {
    $this->assertTrue( $this->target->setSeqnum( 'test', 99 ));
    $this->assertEquals(99, $this->target->getSeqnum( 'test' ));    
  }

  public function testInitSeqnum()
  {
    $this->assertEquals(1, $this->target->initSeqnum( 'test2' ));
    $this->assertEquals(2, $this->target->getSeqnum( 'test2' ));
    $this->assertFalse( $this->target->initSeqnum( 'test' ));   
//    $this->assertFalase($this->target->initSeqnum( 'test' ));
  }
 
}


