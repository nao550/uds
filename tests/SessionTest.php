<?php
namespace morris;

require 'vendor/autoload.php';
require 'config.php';

use PHPUnit\Framework\TestCase;
use morris\Session;


class SessionTest extends TestCase
{

  private $id = null;
  
  public function setUp()
  {
    if ( !isset($_SESSION)){
      $_SESSION = array();
    }
    $this->id = 'testtesttest';
    $this->target = new Session;    
  }

  /*
     test からはじまるメソッドがテストメソッド
     assert は基本、左側がexpected(期待値)、右側がactual(実際の値)です
  */

  public function testsessionExists()
  {
    $this->assertFalse( $this->target->sessionExists());
  }
  
  public function teststart()
  {
    $this->markTestSkipped();
    //    $this->assertTrue( $this->target->start());
  }

  public function testregenerate()
  {
    $this->markTestSkipped();
    // $this->markTestIncomplete();
    /*
    $session = $_SESSION['id'];
    $this->target->regenerate();
    $newsession = $_SESSION['id'];
    $this->assertFalse($session === $newsession );
    */
  }

  public function testset()
  {
    $this->assertTrue( $this->target->set( 'id', $this->id ));
  }

  public function testget()
  {
    $this->assertEquals( $this->id, $this->target->get('id', $this->id ));
    $this->assertNull( $this->target->get('foo'));
  }

  public function testremove()
  {
    $this->assertTrue( $this->target->remove( 'id' ));
    $this->assertFalse( $this->target->remove( 'id' ));

  }

  public function testdelCookie()
  {
    $this->markTestSkipped();
    //$this->assertTrue( $this->target->delCookie());
  }

  public function testendProc()
  {
    $this->markTestSkipped();
    //$this->assertTrue( $this->target->endProc());
  }

  public function testclear()
  {
    $this->assertTrue( $this->target->clear());
  }
}
