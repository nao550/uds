<?php
use morris\Cate;

require_once __DIR__.'/Generic_Tests_DatabaseTestCase.php';

class RespTest extends Generic_Tests_DatabaseTestCase
{
  private $cd;
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
    $this->cd = 99;
    $this->nm = 'カテゴリ';
    $this->arStr = array('cd' => $this->cd, 'nm' => $this->nm );
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
    $this->assertEquals(2, $n);
  }
  
  public function testGetRowCount()
  {
    $this->assertEquals(2, $this->getConnection()->getRowCount( 'Cate'));
  }

  public function testAddCate ()
  {
    $this->assertEquals(1, $this->target->addCate( $this->nm ) );
    $cd = $this->target->getLastInsertId();
    $this->assertEquals($this->nm, $this->target->getSelectedValue( $cd, 'nm' ));
    $this->assertEquals(3, $this->getConnection()->getRowCount( 'Cate'));
  }
  
  public function testUpdateCate()
  {
    $this->target->addCate( $this->nm );
    $this->arStr['cd'] = $this->target->getlastinsertId();
    $this->arStr['nm'] = 'カテゴリごり';
    $this->assertTrue( $this->target->UpdateCate( $this->arStr['cd'], $this->arStr['nm'] ));
    $this->assertEquals($this->arStr['nm'] , $this->target->getSelectedValue($this->arStr['cd'], 'nm'));
  }

  public function testDelCate()
  {
    $this->target->addCate( $this->nm );
    $cd = $this->target->getlastinsertId();
    $this->assertTrue( $this->target->delCate( $cd ));
  }

}


