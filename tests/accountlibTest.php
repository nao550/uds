<?php
require 'vendor/autoload.php';
require 'config.php';

use PHPUnit\Framework\TestCase;
require 'lib/accountlib.php';

class accountlibTest extends TestCase
{

  private $id = '';
  private $password = '';
  private $oldpassword = '';
  private $newpassword = '';  
  private $regdate = '';
  private $chdate = '';
  private $target = '';
  
  public function setUp()
  {
    $this->id = 'testadmin';
    $this->password = 'testpass';
    $this->oldpassword = 'testpass';
    $this->newpassword = 'testpass';    
    $this->regdate = getToDay();
    $this->chdate = getToDay();
    $this->target = new Admins;
  }

  /*
     test からはじまるメソッドがテストメソッド
     assert は基本、左側がexpected(期待値)、右側がactual(実際の値)です
  */

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

  
}
