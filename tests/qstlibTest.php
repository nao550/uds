<?php
require 'vendor/autoload.php';
require 'config.php';

use PHPUnit\Framework\TestCase;
require 'lib/accountlib.php';

class qstlibTest extends TestCase
{

  private $qstStr = '';
  private $qstType = '';
  private $qstSelect[] = array();
  private $qstRegdate = '';


  public function setUp()
  {
    $this->qstStr = 'アンケート文サンプル';
    $this->qstType = '1';
    $this->qstSelect = array('選択肢1','選択肢2','選択肢3','選択肢4',);
    $this->arQst = array( $this->qstStr, $this->qstType,
                          $this->qstSelect)
    $this->target = new Qst;
  }

  /*
     test からはじまるメソッドがテストメソッド
     assert は基本、左側がexpected(期待値)、右側がactual(実際の値)です
  */

  /*
  public function testAddQst( $arQst )
  {
    $this->assertTrue( $this->target->AddQst( $this->arQst ) );
  }

  public function testGetQstStr ( $strId )
  {
    $this->assertEquals( $strQst, $this->GetQstStr($strID) );
  }
   */
  
  public function testGetAllQst ( )
  {
    $this->assertEquals( $strQst, $this->GetAllQstStr( ) );
  }

/*  
  public function testUpdateQstStr ( $arQst ) {}

  public function testDelQst( $qstId ){}

  
  public function testAddAdminAccount ( )
  {
    $this->assertTrue( $this->target->AddAdminAccount( $this->id, $this->password ));
  }

  public function testchkAdminLogin ( )
  {
    $this->assertTrue( $this->target->chkAdminLogin( $this->id, $this->password ) );
  }

  public function testCngAdminPassword ( )
  {
    $this->assertTrue( $this->target->CngAdminPassword( $this->id, $this->oldpassword, $this->newpassword ) );
  }

  public function testDelAdminAccount ( )
  {
    $this->assertTrue( $this->target->DelAdminAccount( $this->id, $this->password ) );
  }
*/
  
}
