<?php
namespace morris;

require 'vendor/autoload.php';
require 'config.php';

use PHPUnit\Framework\TestCase;
use morris\User;


class UserTest extends TestCase
{

  private $user = null;
  private $failuser = null;
  private $password = null;
  private $failpassword = null;
  private $oldpassword = null;
  private $newpassword = null;
  private $rank = null;
  private $regdate = null;
  private $chdate = null;
  private $target = null;
  
  public function setUp()
  {
    $this->user = 'testadmin';
    $this->failuser = 'aa';
    $this->password = 'testpass';
    $this->failpassword = 'ps';
    $this->oldpassword = 'testpass';
    $this->newpassword = 'testpass2';    
    $this->rank = 3;
    $this->regdate = getToDay();
    $this->chdate = getToDay();
    $this->target = new User;
  }

  /*
     test からはじまるメソッドがテストメソッド
     assert は基本、左側がexpected(期待値)、右側がactual(実際の値)です
  */
  
  
  public function testAddUser ( )
  {
    $this->assertTrue( $this->target->AddUser( $this->user, $this->password, $this->rank ));
  }

  public function testChkLogin ( )
  {
    $this->assertEquals( $this->user, $this->target->ChkLogin( $this->user, $this->password ) );
  }

  public function testGetUserRank()
  {
    $this->assertEquals($this->rank, $this->target->GetUserRank( $this->user, $this->oldpassword) );
  }
  
  public function testCngUserPassword ( )
  {
    //$this->markTestIncomplete();
    $this->assertTrue( $this->target->CngUserPassword( $this->user, $this->oldpassword, $this->newpassword ) );
  }

  public function testDelUser ( )
  {
    $this->assertTrue( $this->target->DelUser( $this->user, $this->password ) );
  }

  
}
