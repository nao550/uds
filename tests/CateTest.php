<?php
use morris\Cate;

require_once __DIR__.'/Generic_Tests_DatabaseTestCase.php';

class RespTest extends Generic_Tests_DatabaseTestCase
{
  private $cd;
  private $num;
  private $nm;
  private $mstflag;
  private $mstten;
  private $arSstr = array();
  
  
/*
  public function setUp(){
  }
  */
  /**
  * @return PHPUnit_Extensions_Database_DataSet_IDataSet
  **/
  public function getDataSet()
  {
    $this->cd = '4';
    $this->num = '4';
    $this->nm = 'カテゴリ4';
    $this->mstflag = '0';
    $this->mstten = '0';
    $this->arStr = array('cd' => $this->cd, 'num' => $this->num,
                         'nm' => $this->nm, 'mstflag' => $this->mstflag,
                         'mstten' => $this->mstten );
    $this->target = new Cate;

    return $this->createFlatXMLDataSet(dirname(__FILE__).'/_files/CateDB.xml');    
  }

 public function testGetAllCate()
  {
    // 初期登録データの件数チェック
    $n = 0;
    foreach ( $this->target->getAllCate() as $row ){
      $n++;
    }
    $this->assertEquals(3, $n);
  }

  
  public function testGetRowCount()
  {
    $this->assertEquals(3, $this->getConnection()->getRowCount( 'Cate'));
  }

  public function testAddCate ()
  {
    $this->assertEquals(1, $this->target->addCate( $this->arStr ) );
    $cd = $this->target->getLastInsertId();
//    $this->assertEquals($this->nm, $this->target->getSelectedValue( $cd, 'nm' ));
    $this->assertEquals(4, $this->getConnection()->getRowCount( 'Cate'));
  }

  public function testGetCateStr()
  {
    $this->target->addCate( $this->arStr );
    $cd = $this->target->getLastinsertId();
    $this->assertEquals( $this->arStr, $this->target->getCateStr( $cd ) );
    $this->assertFalse( $this->target->getCateStr( 99 ));
  }
  
  public function testUpdateCate()
  {
    $this->target->addCate( $this->arStr );
    $this->arStr['cd'] = $this->target->getlastinsertId();
    $this->arStr['nm'] = 'カテゴリごり';
    $this->assertTrue( $this->target->UpdateCate( $this->arStr ));
    $this->assertEquals($this->arStr, $this->target->getCateStr($this->arStr['cd']) );
  }

  public function testDelCate()
  {
    $this->target->addCate( $this->arStr );
    $cd = $this->target->getlastinsertId();
    $this->assertTrue( $this->target->delCate( $cd ));
  }

  public function testCountCate()
  {
    $this->assertEquals(3, $this->target->countCate());
  }
}


